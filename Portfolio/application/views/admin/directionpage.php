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
                                    <form method="post" action="<? 
                                        if($colmdata){
                                            echo base_url().'index.php/admin/'.$direction["link"].'/duzenleme/'; if(isset($id)){echo $id.'/';} echo $colmdata[ucwords($direction["table"])."_Id"];
                                        }else{
                                            echo base_url().'index.php/admin/'.$direction["link"].'/ekleme'; if(isset($id)){echo '/'.$id;}} ?>" enctype="multipart/form-data">
                                        <div class="card-header bg-primary">
                                            <h2>
                                                <? if($colmdata){ echo ucwords($direction["page"])." Düzenle"; }
                                                else{ echo ucwords($direction["page"])." Ekle"; } ?>
                                            <h2>
                                        </div>
                                        <div class="card-body">
                                            <? foreach ($colm as $col) {?> 
                                            <? switch ($col->type) {
                                                case "int":
                                                    $type = "number";
                                                    break;
                                                case "varchar":
                                                    $type = "text";
                                                    break;
                                                case "char":
                                                    $type = "file";
                                                    break;
                                                case "text":
                                                    $type = "textarea";
                                                    break;
                                                case "tinytext":
                                                    $type = "mail";
                                                    break;
                                                case "date":
                                                    $type = "date";
                                                    break; 
                                                case "tinyint":
                                                    $type = "tinyint";
                                                    break; 
                                            }  
                                            $position=true; $name="";
                                            $splitname=explode("_", $col->name);
                                            foreach ($splitname as $word) {
                                                if ($word=='Id' or $word=='Type'){
                                                    $position=false;
                                                    break;
                                                }
                                                $name= $name." ". ucwords($word);
                                            } 
                                            if($position){?>
                                            <div class="col-xl-6 col-md-6" style="color:#000; margin: 2%;">
                                                <h3><? echo $name?></h3><br>
                                                <? if($type=="textarea"){?>
                                                    <textarea class="form-control profil-form" name="<? echo $col->name?>" required><? if ($colmdata){ echo $colmdata[$col->name];} ?></textarea>
                                                <? }else if($type=="tinyint"){?>
                                                    <select id="Paragraf" name="<?echo $col->name;?>" required>
                                                        <option value="1" <? if ($colmdata and $colmdata[$col->name]=='1'){echo 'selected'; } ?>>Yazı</option>
                                                        <option value="2"<? if ($colmdata and $colmdata[$col->name]=='2'){echo 'selected'; } ?>>Ön Yazı</option>
                                                    </select>
                                                <? }else{?>
                                                    <input class="form-control profil-form" type="<? echo $type; ?>" name="<? echo $col->name?>" value="<? if ($colmdata){echo $colmdata[$col->name]; } ?>" <? if($type!="file"){echo "required";} ?>>
                                                <? }?>
                                            </div>     
                                           <? } } ?>                                        
                                        </div>
                                        <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                            <input class="text-white" style="background: none; border:none;" type="submit" value="<? if($colmdata){ echo "Düzenle"; } else{ echo "Ekle"; } ?>" name="dzn" />
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