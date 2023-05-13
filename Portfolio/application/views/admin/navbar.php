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
                                    <form method="post" action="<?php echo base_url().'index.php/admin/fullnavbar/duzenleme/'.$navbar['Navbar_Id']?>" enctype="multipart/form-data">
                                        <div class="card-header bg-primary">
                                            <h2>Navbar </h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <img style="width: 30%; margin-bottom: 2%;" src="<?php echo base_url().'admin/../assets/img/'.$navbar['Navbar_Img'];?>"/>
                                                <input class="form-control profil-form" type="file" name="Navbar_Img" />
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>İsim Soyisim:</h3>
                                                 <input class="form-control profil-form" type="text" name="Navbar_Name" value="<?echo $navbar['Navbar_Name'];?>" />
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Facebook:</h3>
                                                 <input class="form-control profil-form" type="text" name="Navbar_Face" value="<?echo $navbar['Navbar_Face'];?>" />
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Twiter:</h3>
                                                <input class="form-control profil-form" type="text" name="Navbar_Twit" value="<?php echo $navbar['Navbar_Twit']; ?>" required/>
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Instagram:</h3>
                                                <input class="form-control profil-form" type="text" name="Navbar_Ins" value="<?php echo $navbar['Navbar_Ins']; ?>" required/>
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Google Plus:</h3>
                                                <input class="form-control profil-form" type="text" name="Navbar_Google" value="<?php echo $navbar['Navbar_Google']; ?>" required/>
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Linkedin:</h3>
                                                <input class="form-control profil-form" type="text" name="Navbar_Link" value="<?php echo $navbar['Navbar_Link']; ?>" required/>
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