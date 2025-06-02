<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Spacestation</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Dashboard Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Halaman</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Histori Booking
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Revenue Stream
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Histori Booking Tiket</h1>                           
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Histori
                                </button>
                                <a href="export.php" class="btn btn-success">Export Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Tiket</th>
                                            <th>Destinasi</th>
                                            <th>Tanggal Pemberangkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $query = "SELECT 
                                                    u.id_user,
                                                    u.email, 
                                                    t.id_tiket,
                                                    t.kelas, 
                                                    p2.id_planet AS tujuan_id,
                                                    p2.nama AS tujuan_nama,
                                                    h.id_histori,
                                                    h.tanggal, 
                                                    h.pukul  
                                                FROM histori_booking h
                                                JOIN user u ON h.id_user = u.id_user
                                                JOIN tiket t ON h.id_tiket = t.id_tiket
                                                JOIN planet p2 ON h.tujuan = p2.id_planet
                                                ORDER BY h.tanggal ASC, h.pukul ASC
                                                    ";

                                        $getdatastock = mysqli_query($conn, $query);
                                        while($data=mysqli_fetch_array($getdatastock)){
                                            $id_histori = $data['id_histori'];
                                            $user = $data['email'];
                                            $tiket = $data['kelas'];
                                            $tujuan = $data['tujuan'];
                                            $tanggal = $data['tanggal'];
                                            $pukul = $data['pukul'];

                                            $destinasi = htmlspecialchars($tujuan);
                                            $pemberangkatan = htmlspecialchars($tanggal).' - '.htmlspecialchars($pukul).' WIB';
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=htmlspecialchars($user);?></td>
                                            <td><?=htmlspecialchars($tiket);?></td>
                                            <td><?=htmlspecialchars($destinasi);?></td>
                                            <td><?=htmlspecialchars($pemberangkatan);?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$id_histori;?>">
                                            Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$id_histori;?>">
                                            Delete
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?=$id_histori;?>" >
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Histori?</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        <?=$user;?><br>
                                                        <?=$tiket;?><br>
                                                        <?=$destinasi;?><br>
                                                        <?=$pemberangkatan;?><br>
                                                        <strong>Anda yakin ingin menghapus histori ini?<strong><br><br>
                                                        <input type="hidden" name="id_histori" value="<?=$id_histori;?>">
                                                        <button class="btn btn-danger" type="submit" name="deletehistori">Hapus</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>

                                                </td>     
                                             </tr>    

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$id_histori;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Histori</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                    <strong> Ada delay pada jadwal : </strong><br>
                                                    <?=$user;?><br>
                                                    <?=$tiket;?><br>
                                                    <?=$destinasi;?><br>
                                                    <?=$pemberangkatan;?><br><br>

                                                    <strong>Edit jadwal disini :</strong>
                                                    <input class="form-control" type="date" name="tanggal" value="<?=$tanggal?>" required><br>
                                                    <input class="form-control" type="time" name="pukul" value="<?=$pukul?>" required><br>
                                                    <input type="hidden" name="id_histori" value="<?=$id_histori;?>">
                                                    <button class="btn btn-primary" type="submit"  name="updatehistori">Submit</button>
                                                </div>
                                                </form>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 231712035 - Habibullah Aqil Dika Putra</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Tambah Histori</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
         <form method="post">
        <div class="modal-body">
        <label>User :</label>
        <select class="form-control" name="user" required>
                <?php
                    $getdata = mysqli_query($conn, "SELECT * FROM user");
                    while($row = mysqli_fetch_assoc($getdata)){ // Ganti menjadi fetch_assoc
                        echo "<option value='{$row['id_user']}'>{$row['email']}</option>";
                    }
                ?>
                </select><br>

            <label>Kelas Tiket :</label>
            <select class="form-control" name="tiket" required>
                <?php
                    $getdata = mysqli_query($conn, "SELECT * FROM tiket");
                    while($row = mysqli_fetch_assoc($getdata)){ // Ganti menjadi fetch_assoc
                        echo "<option value='{$row['id_tiket']}'>{$row['kelas']}</option>";
                    }
                ?>
                </select><br>

            <label>Asal Pemberangkatan :</label>
            <select class="form-control" name="asal" required>
                <?php
                    $getdata = mysqli_query($conn, "SELECT * FROM planet");
                    while($row = mysqli_fetch_assoc($getdata)){ // Ganti menjadi fetch_assoc
                        echo "<option value='{$row['id_planet']}'>{$row['nama']}</option>";
                    }
                ?>
                </select><br>

            <label>Tujuan Pemberangkatan :</label>
            <select class="form-control" name="tujuan" required>
                <?php
                    $getdata = mysqli_query($conn, "SELECT * FROM planet");
                    while($row = mysqli_fetch_assoc($getdata)){ // Ganti menjadi fetch_assoc
                        echo "<option value='{$row['id_planet']}'>{$row['nama']}</option>";
                    }
                ?>
                </select><br>

            <label>Jadwal Pemberangkatan :</label>
            <input class="form-control" type="date" name="tanggal" required><br>
            <input class="form-control" type="time" name="pukul" required><br>
            <button class="btn btn-primary" type="submit"  name="addnewhistori">Submit</button><br><br>
        </div>
        </form>

        </div>
    </div>
    </div>
</html>
