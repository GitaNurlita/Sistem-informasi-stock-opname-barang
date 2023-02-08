<?php
require 'function.php';
?>

<?php
//import koneksi ke database
?>
<html>
<head>
  <title>Laporan Purchase Order</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Laporan Purchase Order</h2>
			<h4>(Laporan)</h4>
				<div class="data-tables datatable-dark">
					
                <div class="table-responsive">
                                    <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Keterangan</th>
                                                <th>Jumlah</th>
                                                <th>Penerima</th>
                                                <th>Supplier</th>
                                                <th>Kode Transaksi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        
                                        $tgl=isset($_GET['tgl'])?"AND DATE(tanggal) = '".$_GET['tgl']."'":'';
                                            $ambilsemuadatastock = mysqli_query($conn,"select * from po a, stock s where s.idbarang = a.idbarang $tgl");
                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $tanggal= $data['tanggal'];
                                                    $namabarang = $data['namabarang'];
                                                    $keterangan = $data['keterangan'];
                                                    $qty = $data['qty'];
                                                    $penerima = $data['penerima'];
                                                    $Supplier = $data['Supplier'];
                                                    $kode_transaksi = $data['kode_transaksi'];
                                                    $status = $data['Status'];
                                                    $idb = $data['idbarang'];
                                                    $idpo= $data['idpo'];
                
                                            ?>
                                            <tr>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$keterangan?></td>
                                                <td><?=$qty;?></td>
                                                <td><?=$penerima;?></td>
                                                <td><?=$Supplier;?></td>
                                                <td><?=$kode_transaksi;?></td>
                                                <td><?php if($status==0):?>
                                                    <span class="badge bg-secondary text-light" >Belum diterima</span>
                                                    <?php else: ?>
                                                    <span class="badge bg-success text-light">diterima</span>
                                                    <?php endif ?></td>
                                                                                                    
                                                

                                            </tr> 
                                                
                                                
                                            </div>
                                            </div>
                                        </div>
                          
                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                        
                                    </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>