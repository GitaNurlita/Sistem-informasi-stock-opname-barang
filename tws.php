
//update info barang masuk
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

     = $qty-$qtysekarang;
        $selisih = 
        uery($conn,"update masuk set  namabarang='$namabarang', keterangan='$keterangan' qty='$qty' where idmasuk='$idm'");
        if($kurangistocknya&&$updatenya){$kurangin = $stocksekarang - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_qif($qty>$qtysekarang){

            header('location:maasuk.php');
        } else {
            echo 'Gagal';
            header('location:masuk.php')
        } 
} else {
    if($qty>$qtysekarang){
        $selisih = $qtysekarang-$qty;
        $kurangin = $stocksekarang + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set  namabarang='$namabarang', keterangan='$keterangan' qty='$qty' where idbarang='$idb'");
        if($kurangistocknya&&$updatenya){
            header('location:maasuk.php');
        } else {
            echo 'Gagal';
            header('location:masuk.php')
        }   
}