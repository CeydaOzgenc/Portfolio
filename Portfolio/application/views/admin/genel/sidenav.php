<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="<?php echo base_url().'index.php/admin/fullnavbar';?>">
                                Navbar
                            </a>
                            <a class="nav-link" href="<?php echo base_url().'index.php/admin/sayfalar';?>">
                                Sayfalar
                            </a>
                            <?
                            foreach ($pages as $page){?>
                                <a class="nav-link" href="<?php echo base_url().'index.php/admin/'.$page['Page_Url'];?>">
                                    <?echo $page['Page_Name']; ?>
                                </a>
                            <? }?>
                        </div>
                    </div>
                </nav>