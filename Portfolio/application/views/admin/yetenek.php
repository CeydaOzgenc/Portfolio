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
                                    <div class="card-header bg-primary">
                                            <h2>Yetenek Paragraflar</h2>
                                        </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple1">
                                            <thead>
                                                <tr>
                                                    <th>Paragraf</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Paragraf</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($skills as $skillsparagraph){ ?>
                                                <tr>
                                                    <td><?php echo $skillsparagraph['Skills_Paragraph'];?></td>
                                                    <td>
                                                        <a href="<?php echo base_url().'index.php/admin/skillparagraph/duzenle/'. 
                                                        $skillsparagraph['Skills_Id'];?>">
                                                            <input class="btn btn-primary" type="submit" value="Düzenle">
                                                        </a>
                                                        <a href="<?php echo base_url().'index.php/admin/skillparagraph/sil/'. 
                                                        $skillsparagraph['Skills_Id'];?>">
                                                            <input class="btn btn-danger" type="submit" value="Sil">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url().'index.php/admin/skillparagraph/ekle';?>">Yeni Ekle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card text-white mb-4">
                                    <div class="card-header bg-primary">
                                            <h2>Yetenekler</h2>
                                        </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple2">
                                            <thead>
                                                <tr>
                                                    <th>Yetenek</th>
                                                    <th>Yetenek Yüzdesi</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Yetenek</th>
                                                    <th>Yetenek Yüzdesi</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php foreach ($skillslist as $skillsinfo){ ?>
                                                <tr>
                                                    <td><?php echo $skillsinfo['Skillslist_Title'];?></td>
                                                    <td><?php echo $skillsinfo['Skillslist_Percentile'];?></td>
                                                    <td>
                                                        <a href="<?php echo base_url().'index.php/admin/skillinfo/duzenle/'. 
                                                        $skillsinfo['Skillslist_Id'];?>">
                                                            <input class="btn btn-primary" type="submit" value="Düzenle">
                                                        </a>
                                                        <a href="<?php echo base_url().'index.php/admin/skillinfo/sil/'. 
                                                        $skillsinfo['Skillslist_Id'];?>">
                                                            <input class="btn btn-danger" type="submit" value="Sil">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url().'index.php/admin/skillinfo/ekle';?>">Yeni Ekle</a>
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