

<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>STOK BARANG</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">TOKO AMARA </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form method="get" action="stock.php"  class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input name="search" class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php require 'menu.php';?>
                           
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">PURCHASE ORDER</h1>
                        <ol class="breadcrumb mb-4">

                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                      <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Tambah PO
                            </button>
                            <a href="export po.php?tgl=<?=$_GET['tgl']?>" class="btn btn-info"> Export Laporan </a>
                            <form method="GET" class="form-inline">
                                <input class="form-control" type="date" name="tgl" value="<?=$_GET['tgl']?>" style="margin-right:15px"/>
                                <input type="submit" class="btn btn-sm btn-info" value="cek"/>
                            </form>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                <th>Aksi</th>
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
                                                                                                    
                                                
                                                <td>
                                                    <br>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approve<?=$idpo;?>">
                                                     Approve
                                                </button>
                                            </br>
                    
                                                <br>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idpo;?>">
                                                     Delete
                                                </button>
                                            </br>
                                                </td>

                                            </tr>
                                             <!-- approve modal modal -->
                                        <div class="modal fade" id="approve<?=$idpo;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Approve</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method= "post">
                                                <div class="modal-body">
                                                    <label>Penerima</label>
                                                <input type="text" name="penerima" value="<?=$penerima;?>" class = "form-control" required> 
                                                <br>
                                                <label>Jumlah</label>
                                                <input type="text" name="qty" value="<?=$qty;?>"  class = "form-control" required>
                                                <br>
                                                <input type="hidden" name="idbarang" value="<?=$idb;?>">
                                                <input type="hidden" name="idpo" value="<?=$idpo;?>">
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" class="btn btn-primary" name="approve">submit</button>
                                                </div>
                                        </form>                                                
                                            </div>
                                            </div>
                                        </div>
                                
                                              <!-- edit modal modal -->
                                      
                                        <!-- delete modal modal -->
                                        <div class="modal fade" id="delete<?=$idpo;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">HAPUS BARANG YANG DIPILIH?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method= "post">
                                                <div class="modal-body">
                                                    Apakah  anda yakin ingin menghapus <?=$namabarang;?> | <?=$keterangan;?>?
                                                    <br>
                                                <input type="hidden" name="idpo" value="<?=$idpo;?>">
                                                <input type="hidden" name="qty" value="<?=$qty;?>">
                                                <br>
                                                <button type="submit" class="btn btn-danger" name="hapuspo">Hapus</button>
                                                </div>
                                        </form>
                                                
                                                
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
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Proyek 2 Gita 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
      <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah purchase order </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method= "post">
        <div class="modal-body">
        <select name="idbarang"class="form-control"> 
            <?php
            $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
            while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                $namabarangnya = $fetcharray['namabarang'];
                $idbarangnya = $fetcharray['idbarang'];
                ?>
                <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>
                <?php
            }

            ?>
        </select>
<br>
        <input type="text" name="kode_transaksi" value="<?="PO-".date("Ymd").rand(100,999)?>" readonly class = "form-control"required/>
        <br>

          <input type="text" name="keterangan" placeholder="keterangan" class = "form-control"required>
          <br>
          <input type="text" name="qty" placeholder="qty" class = "form-control"required>
          <br>
          <input type="text" name="Supplier" placeholder="Supplier" class = "form-control"required>
          <br>
          <input type="hidden" name="status" value="0"  />
          <input type="hidden" name="penerima" value="-" />
          <button type="submit" class="btn btn-primary" name="addpo">submit</button>
        </div>
</form>
        
        
      </div>
    </div>
  </div>
</html>
