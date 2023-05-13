<header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="<?php echo base_url().'admin/../assets/img/'.$navbar['Navbar_Img'];?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.php"><?echo $navbar['Navbar_Name'];?></a></h1>
        <div class="social-links mt-3 text-center">
          <? if($navbar['Navbar_Face']!="-"){?>
            <a href="<?echo $navbar['Navbar_Face'];?>" class="facebook"><i class="bx bxl-facebook"></i></a>
          <?} ?>
          <? if($navbar['Navbar_Twit']!="-"){?>
            <a href="<?echo $navbar['Navbar_Twit'];?>" class="twitter"><i class="bx bxl-twitter"></i></a>
          <?} ?>
          <? if($navbar['Navbar_Ins']!="-"){?>
            <a href="<?echo $navbar['Navbar_Ins'];?>" class="instagram"><i class="bx bxl-instagram"></i></a>
          <?} ?>
          <? if($navbar['Navbar_Link']!="-"){?>
            <a href="<?echo $navbar['Navbar_Link'];?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          <?} ?>
          <? if($navbar['Navbar_Google']!="-"){?>
            <a href="<?echo $navbar['Navbar_Google'];?>" class="google-plus"><i class="bx bxl-google"></i></a>
          <?} ?>
        </div>
      </div>
      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <? foreach ($header as $nav) { ?>
            <li>
              <a href="<?php echo base_url(); ?>index.php/home/<?= $nav['Page_Url'];?>" class="nav-link scrollto">
                <i class="bx <? echo $nav['Page_Icon'];?>"></i> 
                <span><?echo $nav['Page_Name']; ?></span>
              </a>
            </li>
          <? } ?>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->