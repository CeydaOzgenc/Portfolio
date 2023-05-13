<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ezgi Yeşilbaş Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/img/profile-img.png" rel="icon">
  <link href="assets/img/profile-img.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?php echo $home['Home_Title']; ?></h1>
      <p><?php echo $home['Home_Text']; ?> <span class="typed" data-typed-items="<?php
      foreach ($homeslider as $slider){
        echo $slider['Home_slider_Title'].",";
      }
      ?>"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= About Section ======= -->
  <?if($pagesarray[1]['Page_Position']==1){?>
    <section id="<?echo $pagesarray[1]['Page_Url'];?>" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Beni Tanı</h2>
          <?php foreach ($aboutonparagraph as $aboutcoverletter){ ?>
            <p><?php echo  $aboutcoverletter['About_paragraph_Text'];?></p>
          <?php }?>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="<?php echo base_url().'assets/img/'.$about['About_Img'];?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?php echo $about['About_Title']; ?></h3>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <?php foreach ($abouthalfinfo as $halfinfo){ ?>
                    <li>
                      <i class="bi bi-chevron-right"></i> 
                      <strong><?php echo $halfinfo['About_info_Title'];?></strong> 
                      <span><?php echo $halfinfo['About_info_Text']; ?></span>
                    </li>
                  <?php }?>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <?php foreach ($aboutinfo as $info){ ?>
                    <li>
                      <i class="bi bi-chevron-right"></i> 
                      <strong><?php echo $info['About_info_Title'];?></strong> 
                      <span><?php echo $info['About_info_Text']; ?></span>
                    </li>
                  <?php }?>
                </ul>
              </div>
            </div>
            <?php foreach ($aboutparagraphs as $aboutparagraph){ ?>
            <p><?php echo  $aboutparagraph['About_paragraph_Text'];?></p>
            <?php }?>
          </div>
        </div>

      </div>
    </section>
  <? }?>
  <!-- End About Section -->

  <!-- ======= Skills Section ======= -->
  <?if($pagesarray[2]['Page_Position']==1){?>
    <section id="<?echo $pagesarray[2]['Page_Url'];?>" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Yetenekler</h2>
          <?php foreach($skillsparagraph as $skill){?>
            <p><?php echo $skill['Skills_Paragraph'];?></p>
          <?php } ?>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">
            <?php foreach($skillsinfohalf as $info){ ?>
              <div class="progress">
                <span class="skill"><?php echo $info['Skillslist_Title'];?>
                  <i class="val"><?php echo $info['Skillslist_Percentile'];?>%</i>
                </span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $info['Skillslist_Percentile'];?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            <?php }?>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <?php foreach($skillsinfo as $info){ ?>
              <div class="progress">
                <span class="skill"><?php echo $info['Skillslist_Title'];?>
                  <i class="val"><?php echo $info['Skillslist_Percentile'];?>%</i>
                </span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $info['Skillslist_Percentile'];?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            <?php }?>
          </div>

        </div>

      </div>
    </section>
  <? }?>
  <!-- End Skills Section -->

  <!-- ======= Resume Section ======= -->
  <?if($pagesarray[3]['Page_Position']==1){?>
    <section id="<?echo $pagesarray[3]['Page_Url'];?>" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Özgeçmiş</h2>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Özet</h3>
            <div class="resume-item pb-0">
              <h4><?php echo $resumesummary['Resume_summary_Title']; ?></h4>
              <?php foreach ($resumeparagraph as $summary){ ?>
                <p><em><?php echo $summary['Summary_Paragraph'];?></em></p>
              <?php }?>              
              <ul>
                <li><?php echo $resumesummary['Resume_summary_Address']; ?></li>
                <li><?php echo $resumesummary['Resume_summary_Phone']; ?></li>
                <li><?php echo $resumesummary['Resume_summary_Mail']; ?></li>
              </ul>
            </div>

            <h3 class="resume-title">Eğitim</h3>
            <?php foreach ($resumeeducation as $education){ ?>
              <div class="resume-item">
                <h4><?php echo $education['Resume_Title'];?></h4>
                <h5><?php echo $education['Resume_Date'];?></h5>
                <p><em><?php echo $education['Resume_City'];?></em></p>
                <p><?php echo $education['Resume_Text'];?></p>
              </div>
            <?php }?>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Tecrübeler</h3>
            <?php foreach ($resumeexperience as $experience){ ?>
              <div class="resume-item">
                <h4><?php echo $experience['Resume_Title'];?></h4>
                <h5><?php echo $experience['Resume_Date'];?></h5>
                <p><em><?php echo $experience['Resume_City'];?></em></p>
                <p><?php echo $experience['Resume_Text'];?></p>
              </div>
            <?php }?>
          </div>
        </div>

      </div>
    </section>
  <? }?>
  <!-- End Resume Section -->

  <!-- ======= Portfolio Section ======= -->
  <?if($pagesarray[4]['Page_Position']==1){?>
    <section id="<?echo $pagesarray[4]['Page_Url'];?>" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php foreach ($portfolioinfo as $portfolio){ ?>
            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-wrap">
                <img src="<?php echo base_url().'assets/img/portfolio/'.$portfolio['Portfolio_Front_Img'];?>" class="img-fluid" alt="">
                <div class="portfolio-links"> 
                  <a href="<?php echo base_url().'assets/img/portfolio_detail/'.$portfolio['Portfolio_Magnification_Img'];?>" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bx bx-plus"></i></a> 
                  <a href="<?php echo base_url(); ?>index.php/portfoliodetail/<?= $portfolio['Portfolio_Id']?>" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </section>
  <? }?>
  <!-- End Portfolio Section -->

  <!-- ======= Youtube Section ======= -->
  <?if($pagesarray[5]['Page_Position']==1){ ?>
     <?
      foreach ($youtube as $youtubeinfo){?>
    <section id="<?echo $pagesarray[5]['Page_Url'];?>" class="portfolio">
      <div class="container">
        <div class="section-title">
          <h2><?echo $youtubeinfo["Youtube_Chanel_Name"];?></h2>
        </div>
        <? $yt_api = "AIzaSyDXQutAYZq3_xwXy02UiZwiMou_APKLohY";
        $channelId = $youtubeinfo["Youtube_Chanel_Key"]; 
        $yt_json = file_get_contents("https://www.googleapis.com/youtube/v3/search?key=".$yt_api."&channelId=".$channelId."&part=snippet,id&order=date&maxResults=20");
        $yt_arr = json_decode($yt_json);?>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
            <?php foreach ($yt_arr->items as $item) {
              if(!empty($item->id->videoId)){
                $videoId = $item->id->videoId;
                $thumb_url = $item->snippet->thumbnails->medium->url;?>
                <div class="col-lg-4 col-md-6 portfolio-item">
                  <a href="https://www.youtube.com/watch?v=<?php echo $videoId;?>" target="_blank">
                    <div class="portfolio-wrap">
                        <img style="margin: 1px;border:solid 1px #000" src="<?php echo $thumb_url; ?>">
                    </div>
                  </a>
                </div>
            <?php } } ?>
        </div>
      </div>
    </section>
    <?php } ?>
  <? }?>
  <!-- End Youtube -->

  <!-- ======= Cv Section ======= -->
  <?if($pagesarray[6]['Page_Position']==1){?>
    <section id="<?echo $pagesarray[6]['Page_Url'];?>" class="cv section-bg">
      <div class="container">

        <div class="section-title">
          <h2>CV</h2>
        </div>

        <div class="row">
          <?php foreach ($cv as $cvdetail){ ?>
            <div class="col-lg-6">
              <iframe src="<?php echo base_url();?>assets/img/<?php echo $cvdetail['Cv_pdf'];?>" title="CV" height="300px" width="100%"></iframe>
            </div>
          <?php }?>
        </div>

      </div>
    </section>
  <? }?>
  <!-- End Cv Section -->

  <!-- ======= Testimonials Section ======= -->
  <?if($pagesarray[7]['Page_Position']==1){?>
    <section id="<?echo $pagesarray[7]['Page_Url'];?>" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Referanslar</h2>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php foreach ($testimonials as $testimonial){ ?>
              <div class="swiper-slide">
                <div class="testimonial-item" data-aos="fade-up">
                  <div class="yazi">
                  <h3><?php echo $testimonial['Testimonials_Company'];?></h3>
                    <ul>
                      <li><?php echo $testimonial['Testimonials_Position'];?></li>
                      <li><?php echo $testimonial['Testimonials_Email'];?></li>
                      <li><?php echo $testimonial['Testimonials_Phone'];?></li>
                    </ul>
                  </div>
                  <h3><?php echo $testimonial['Testimonials_User'];?></h3>
                </div>
              </div><!-- End testimonial item -->
            <?php }?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> 
  <? }?>
  <!-- End Testimonials Section -->

  <!-- ======= Contact Section ======= -->
  <?if($pagesarray[8]['Page_Position']==1){?>
    <section id="<?echo $pagesarray[8]['Page_Url'];?>" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>İletişim</h2>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Adres :</h4>
                <p><?php echo $contact['Contact_info_Address']; ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $contact['Contact_info_Mail']; ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefon :</h4>
                <p><?php echo $contact['Contact_info_Phone']; ?></p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3129.7776043646613!2d27.130245715191403!3d38.33098057966195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbdfc9623d372b%3A0x66c60fff101c2e53!2sGazi%2C%2028%2F25.%20Sk.%20No%3A13%2C%2035410%20Gaziemir%2F%C4%B0zmir!5e0!3m2!1sen!2str!4v1649790996235!5m2!1sen!2str"   frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form class="email-form" method="post" action="<?php echo base_url().'index.php/website/mail/'?>" enctype="multipart/form-data" >
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">İsminiz</label>
                  <input type="text" name="Contact_User" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Emailiniz</label>
                  <input type="email" class="form-control" name="Contact_Mail" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Konu</label>
                <input type="text" class="form-control" name="Contact_Subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Mesajınız</label>
                <textarea class="form-control" name="Contact_Message" rows="10" required></textarea>
              </div>
              <div class="text-center">
                <input class="text-white" type="submit" value="Gönder" name="btngnc"/>
              </div>
              <div class="col-lg-12" id="call">
                <div id="number"><h2><?php echo $contact['Contact_info_Phone']; ?></h2></div>
                <div id="ara">
                  <div id="containerara">
                    <a onClick="git(<?php echo $contact['Contact_info_Phone']; ?>);"><div id="callme"><img src="<?php echo base_url(); ?>assets/img/tel.png"></div></a>
                    <a onClick="git(<?php echo $contact['Contact_info_Phone']; ?>);"><h2 id="yaz">Hemen Arayın</h2></a>
                  </div>
                  <p>Bana Ulaşmak için..</p>
                </div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>
  <? }?>
  <!-- End Contact Section -->

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="credits">
        <a href="http://ceydaozgenc.com">Ceyda ÖZGENÇ</a> tarafından tasarlanmıştır. 
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/typed.js/typed.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/lazy_loding.js"></script>

</body>

</html>