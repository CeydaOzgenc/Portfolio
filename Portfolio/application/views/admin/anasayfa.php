<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $user['Login_username'];?> | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>admin/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>admin/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url(); ?>admin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>admin/js/datatables-simple-demo.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <?include "genel/topnav.php";?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?include "genel/sidenav.php";?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card text-white mb-4">
                                    <form method="post" action="<?php echo base_url().'index.php/admin/hometext/duzenleme/'.$home["Home_Id"]?>" enctype="multipart/form-data">
                                        <div class="card-header bg-primary">
                                            <h2>Anasayfa Yazısı</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Anasayfa Başlığı:</h3>
                                                <input class="form-control profil-form" type="text" name="Home_Title" value="<?php echo $home['Home_Title']; ?>" required/>
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Slider Sabit Yazı:</h3>
                                                <input class="form-control profil-form" type="text" name="Home_Text" value="<?php echo $home['Home_Text']; ?>" required/>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                            <input class="text-white" style="background: none; border:none;" type="submit" value="Güncelle" name="btngnc"/>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card text-white mb-4">
                                    <div class="card-header bg-primary">
                                            <h2>Anasayfa Slider</h2>
                                        </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple1">
                                            <thead>
                                                <tr>
                                                    <th>Slider Yazı</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Anasayfa Slider Yazı</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($slider as $homeslider){ ?>
                                                <tr>
                                                    <td><?php echo $homeslider['Home_slider_Title'];?></td>
                                                    <td>
                                                        <a href="<?php echo base_url().'index.php/admin/homeslider/duzenle/'.$homeslider['Home_slider_Id']?>">
                                                            <input class="btn btn-primary" type="submit" value="Düzenle">
                                                        </a>
                                                        <a href="<?php echo base_url().'index.php/admin/homeslider/sil/'.$homeslider['Home_slider_Id']?>">
                                                            <input class="btn btn-danger" type="submit" value="Sil">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url().'index.php/admin/homeslider/ekle'?>">Yeni Ekle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Website 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>