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
                                    <form method="post" action="<?php echo base_url().'index.php/admin/contact/duzenleme/'.$info['Contact_info_Id'];?>" enctype="multipart/form-data">
                                        <div class="card-header bg-primary">
                                            <h2>İletişim Bilgileri</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Adrse:</h3>
                                                <textarea class="form-control profil-form" name="Contact_info_Address" required><?php echo $info['Contact_info_Address']; ?></textarea>
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>EMail:</h3>
                                                <input class="form-control profil-form" type="text" name="Contact_info_Mail" value="<?php echo $info['Contact_info_Mail']; ?>" required/>
                                            </div>
                                            <div class="col-xl-6 col-md-6" style="color:#000;">
                                                <h3>Telefon:</h3>
                                                <input class="form-control profil-form" type="text" name="Contact_info_Phone" value="<?php echo $info['Contact_info_Phone']; ?>" required/>
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
                                            <h2>Mesajlar</h2>
                                        </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple1">
                                            <thead>
                                                <tr>
                                                    <th>İsim</th>
                                                    <th>Mail</th>
                                                    <th>Konu</th>
                                                    <th>Mesaj</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>İsim</th>
                                                    <th>Mail</th>
                                                    <th>Konu</th>
                                                    <th>Mesaj</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($message as $contact){ ?>
                                                <tr>
                                                    <td><?php echo $contact['Contact_User'];?></td>
                                                    <td><?php echo $contact['Contact_Mail'];?></td>
                                                    <td><?php echo $contact['Contact_Subject'];?></td>
                                                    <td><?php echo $contact['Contact_Message'];?></td>
                                                    <td>
                                                        <a href="<?php echo base_url().'index.php/admin/message/sil/'.$contact["Contact_Id"];?>">
                                                            <input class="btn btn-danger" type="submit" value="Sil">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                        <a class="small text-white" target="_blank" href="http://ezgiyesilbas.com:2096/">Webmail</a>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>