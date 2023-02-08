<?php
session_start();
//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stokbarang");
if ($conn){
   
    
}


//nambah barang
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $keterangan = $_POST['keterangan'];
    $stock = $_POST['stock'];

    //soal gambar
    $allowed_extension = array('png','jpg');
    $nama = $_FILES['file']['name']; //ngambil gambar
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    


    //penamaaan enkripsi
$image =md5(uniqid($nama,true). time()).'.'.$ekstensi;

if(in_array($ekstensi, $allowed_extension) === true){
    if($ukuran <15000000)
    move_uploaded_file($file_tmp, 'img/'.$image);

}
    $addtable = mysqli_query($conn, "insert into stock (namabarang, keterangan, stock, image) values('$namabarang', '$keterangan', '$stock', '$image')");
    if ($addtable){
        header('location: stock.php');

    } else {
        echo 'Masih Gagal';
        header('location: stock.php');
    }
    
}

//nambah barang masuk
if(isset($_POST['addbarangmasuk'])){
    $barangnya= $_POST['barangnya'];
    $keterangan= $_POST['keterangan'];
    $qty = $_POST['qty'];
    $penerima = $_POST['penerima'];

    // cek qty minus
    if($qty<=0){
        echo "<script>alert('qty tidak valid.');document.location='/stokbarang/masuk.php'</script>";
        //header('location: masuk.php');
        return false;
        
    }

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn, "insert into masuk (idbarang, keterangan, qty, penerima) values('$barangnya','$keterangan', '$qty','$penerima')");
    $updatestockmasuk = mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity'where idbarang='$barangnya'");
    if ($addtomasuk&&$updatestockmasuk){
        header('location: masuk.php');

    } else {
        echo 'Masih Gagal';
        header('location: masuk.php');
    }
    
}

//nambah barang keluar

if(isset($_POST['addbarangkeluar'])){
    $barangnya= $_POST['barangnya'];
    $keterangan= $_POST['keterangan'];
    $qty = $_POST['qty'];
    $penerima = $_POST['penerima'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    if($stocksekarang >= $qty){
            //kalo cukup
        $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;

        $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, keterangan, qty, penerima) values('$barangnya','$keterangan', '$qty','$penerima')");
        $updatestockmasuk = mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity'where idbarang='$barangnya'");

    } else {
        //kalau  barang cukup
        echo '
        <script>
            alert("Stock saat ini tidak mencukupi")
            window.location.href="keluar.php";
        </script>
        
        ';
    }
}

//update info barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idbarang'];
    $namabarang = $_POST['namabarang'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($conn,"update stock set namabarang='$namabarang', keterangan='$keterangan' where idbarang='$idb'");
if($update){
    header('location: stock.php');
    } else {
        echo 'Masih Gagal';
        header('location: stock.php');

}
}

//hapus info barang
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idbarang'];

    $hapus = mysqli_query($conn,"delete from stock where idbarang='$idb'");
if($hapus){
    header('location: stock.php');
    } else {
        echo 'Masih Gagal';
        header('location: stock.php');

}
}

//ubah (barang masuk) 

//ubah (barang masuk) 
//ubah (barang masuk) 
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idbarang'];
    $idm = $_POST['idmasuk'];
    $namabarang = $_POST['namabarang'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];
    
    $lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stocksekarang = $stocknya['stock'];

    $qtysekarang = mysqli_query($conn, "select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtysekarang);
    $qtysekarang = $qtynya['qty'];

    // if($qty>$qtysekarang){
        $tambahstock = $stocksekarang+ ($qty-$qtysekarang);
        $nambahinstock = mysqli_query($conn, "update stock set stock='$tambahstock' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set keterangan='$keterangan', qty='$qty' where idmasuk='$idm'");

        if($nambahinstock&&$updatenya){
            header('location:masuk.php');
        } else {
            echo 'Gagal';
            header('location:masuk.php');
        }
       
    // }else {
    //     echo 'qty lebih kecil dari qty sekarang';
    //     header('location:masuk.php');
    // }

    /*  ini gausah */
    // if($kurangistocknya&&$updatenya){

    //     // jika benar maka update table stock
    //     $selisih = $qtysekarang-$qty;
    //     $kurangin = $stocksekarang - $selisih;
    //     $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
    //     $updatenya = mysqli_query($conn,"update masuk set  namabarang='$namabarang', keterangan='$keterangan' qty='$kurangin' where idmasuk='$idm'");
    //     header('location:masuk.php');
        
    // } else {
    //     // jika salah
    //     echo 'Gagal';
    //     header('location:masuk.php');
    // }

        /*  ini gausah */
        // if($kurangistocknya&&$updatenya){
        //     header('location:masuk.php');
        // } else {
        //     echo 'Gagal';
        //     header('location:masuk.php');
        // }
        
}


//hapus barang masuk

if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idbarang'];
    $idm = $_POST['idmasuk'];
    $qty = $_POST['qty'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];
    $selisih = $stock - $qty;

    //$update = mysqli_query($conn,"update stock set stock ='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from masuk where idmasuk='$idm'");
if($hapusdata){
    header('location: masuk.php');
    } else {
        echo 'Masih Gagal';
        header('location: masuk.php');

}
}  

//keluar
//ubah (barang keluaar) 
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idbarang'];
    $idk = $_POST['idkeluar'];
    $namabarang = $_POST['namabarang'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];
    
    $lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stocksekarang = $stocknya['stock'];
    
    $qtysekarang = mysqli_query($conn, "select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtysekarang);
    $qtysekarang = $qtynya['qty'];
    
    // if($qty>$qtysekarang){
        $tambahstock = $stocksekarang+ ($qtysekarang-$qty);
        $nambahinstock = mysqli_query($conn, "update stock set stock='$tambahstock' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set  keterangan='$keterangan', qty='$qty' where idkeluar='$idk'");

        if($nambahinstock&&$updatenya){
            header('location:keluar.php');
        } else {
            echo 'Gagal';
            header('location:keluar.php');
        }
    // }else {
    //     echo 'qty lebih kecil dari qty sekarang';
    //     header('location:masuk.php');
    // }

    /*  ini gausah */
    // if($kurangistocknya&&$updatenya){

    //     // jika benar maka update table stock
    //     $selisih = $qtysekarang-$qty;
    //     $kurangin = $stocksekarang - $selisih;
    //     $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
    //     $updatenya = mysqli_query($conn,"update masuk set  namabarang='$namabarang', keterangan='$keterangan' qty='$kurangin' where idmasuk='$idm'");
    //     header('location:masuk.php');
        
    // } else {
    //     // jika salah
    //     echo 'Gagal';
    //     header('location:masuk.php');
    // }

        /*  ini gausah */
        // if($kurangistocknya&&$updatenya){
        //     header('location:masuk.php');
        // } else {
        //     echo 'Gagal';
        //     header('location:masuk.php');
        // }
        
}     

//hapus keluar     
//coba
if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idbarang'];
    $idk = $_POST['idkeluar'];
    $namabarang = $_POST['namabarang'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];
    $selisih = $stock - $qty;

    //$update = mysqli_query($conn,"update stock set stock ='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from keluar where idkeluar='$idk'");
if($hapusdata){
    header('location: keluar.php');
    } else {
        header('location: keluar.php');

}
}  

//nambah po
if(isset($_POST['addpo'])){
    $idbarang= $_POST['idbarang'];
    $kode_transaksi= $_POST['kode_transaksi'];
    $keterangan= $_POST['keterangan'];
    $qty = $_POST['qty'];
    $status = $_POST['status'];
    $penerima = $_POST['penerima'];
    $Supplier = $_POST['Supplier'];



    $addtopo = mysqli_query($conn, "insert into po (idbarang, kode_transaksi, keterangan, qty, status, penerima, Supplier) values('$idbarang','$kode_transaksi','$keterangan', '$qty','$status','$penerima','$Supplier')");
    if ($addtopo){
        header('location: PO.php');

    } else {
        echo 'Masih Gagal';
        header('location: PO.php');
    }
    
}


//tambah
if(isset($_POST['adduser'])){
    $em= $_POST['email'];
    $password= $_POST['password'];
    $level= $_POST['level'];


    $queryinsert = mysqli_query($conn,"insert into login (email, password, level) values ('$em','$password','$level')");
        if($queryinsert){
            //jika berhasil
            header('location: keluser.php');
        } else {
            //gagal
            header('location:keluser.php');
        }

}
//update
if(isset($_POST['updateuser'])){
    $emailbaru= $_POST['emailadmin'];
    $passwordbaru= $_POST['passwordbaru'];
    $level= $_POST['level'];
    $idnya = $_POST ['id'];

    $queryupdate = mysqli_query($conn,"update login set email='$emailbaru', password='$passwordbaru', level='$level' where iduser='$idnya'");
        if($queryupdate){
            //jika berhasil
            header('location: keluser.php');
        } else {
            //gagal
            header('location:keluser.php');
        }

}
//hapus
if(isset($_POST['hapususer'])){
    $id = $_POST ['id'];

    $querydelete = mysqli_query($conn," delete from login where iduser='$id' ");
        if($queryinsert){
            //jika berhasil
            header('location: keluser.php');
        } else {
            //gagal
            header('location:keluser.php');
        }

}

//approve
if(isset($_POST['approve'])){
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $status = $_POST['status'];
    $idpo = $_POST['idpo'];
    $idb = $_POST['idbarang'];

    $checkStock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $current_stock = mysqli_fetch_array($checkStock);

    $stocksekarang = $current_stock['stock'];
    $final_stock = $stocksekarang+$qty;

    $updatepo = mysqli_query($conn, "update po set penerima='$penerima',qty='$qty',Status='$status' where idpo='$idpo'");
    if ($updatepo&&$updatestockmasuk){
        header('location: PO.php');

    } else {
        echo 'Masih Gagal';
        header('location: PO.php');
    }
    
}


//edit

//hapus
if(isset($_POST['hapuspo'])){
    $idpo = $_POST ['idpo'];

    $querydelete = mysqli_query($conn," delete from po where idpo='$idpo' ");
        if($querydelete){
            //jika berhasil
            header('location: PO.php');
        } else {
            //gagal
            header('location: PO.php');
        }

}

?>
