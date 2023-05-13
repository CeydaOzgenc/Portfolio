<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'website';
$route['portfoliodetail/(:num)'] = 'website/portfolioDetail';
$route['home/(:any)'] = 'website/index';
$route['admin'] = 'admin/index';
$route['admin/fullnavbar/duzenleme/(:num)'] = 'admin/directionend/fullnavbar/navbar/file/$i';
$route['website/mail'] = 'website/mail/anasayfa/contact';
/* Anasayfa */
$route['admin/hometext/duzenleme/(:num)'] = 'admin/directionend/anasayfa/home/$i';
$route['admin/homeslider/ekle'] = 'admin/directionpage/anasayfa/home_slider';
$route['admin/homeslider/ekleme'] = 'admin/directionend/anasayfa/home_slider';
$route['admin/homeslider/duzenle/(:num)'] = 'admin/directionpage/anasayfa/home_slider/$i';
$route['admin/homeslider/duzenleme/(:num)'] = 'admin/directionend/anasayfa/home_slider/$i';
$route['admin/homeslider/sil/(:num)'] = 'admin/sil/anasayfa/home_slider/$i';
/* Hakkında */
$route['admin/abouttext/duzenleme/(:num)'] = 'admin/directionend/hakkinda/about/file/$i';
$route['admin/aboutinfo/ekle'] = 'admin/directionpage/hakkinda/about_info';
$route['admin/aboutinfo/ekleme'] = 'admin/directionend/hakkinda/about_info';
$route['admin/aboutinfo/duzenle/(:num)'] = 'admin/directionpage/hakkinda/about_info/$i';
$route['admin/aboutinfo/duzenleme/(:num)'] = 'admin/directionend/hakkinda/about_info/$i';
$route['admin/aboutinfo/sil/(:num)'] = 'admin/sil/hakkinda/about_info/$i';
$route['admin/aboutparagraph/ekle'] = 'admin/directionpage/hakkinda/about_paragraph';
$route['admin/aboutparagraph/ekleme'] = 'admin/directionend/hakkinda/about_paragraph';
$route['admin/aboutparagraph/duzenle/(:num)'] = 'admin/directionpage/hakkinda/about_paragraph/$i';
$route['admin/aboutparagraph/duzenleme/(:num)'] = 'admin/directionend/hakkinda/about_paragraph/$i';
$route['admin/aboutparagraph/sil/(:num)'] = 'admin/sil/hakkinda/about_paragraph/$i';
/* Yetenekler */
$route['admin/skillparagraph/ekle'] = 'admin/directionpage/yetenek/skills';
$route['admin/skillparagraph/ekleme'] = 'admin/directionend/yetenek/skills';
$route['admin/skillparagraph/duzenle/(:num)'] = 'admin/directionpage/yetenek/skills/$i';
$route['admin/skillparagraph/duzenleme/(:num)'] = 'admin/directionend/yetenek/skills/$i';
$route['admin/skillparagraph/sil/(:num)'] = 'admin/sil/yetenek/skills/$i';
$route['admin/skillinfo/ekle'] = 'admin/directionpage/yetenek/skillslist';
$route['admin/skillinfo/ekleme'] = 'admin/directionend/yetenek/skillslist';
$route['admin/skillinfo/duzenle/(:num)'] = 'admin/directionpage/yetenek/skillslist/$i';
$route['admin/skillinfo/duzenleme/(:num)'] = 'admin/directionend/yetenek/skillslist/$i';
$route['admin/skillinfo/sil/(:num)'] = 'admin/sil/yetenek/skillslist/$i';
/* Özgeçmiş */
$route['admin/resumeinfo/duzenleme/(:num)'] = 'admin/directionend/ozgecmis/resume_summary/$i';
$route['admin/resumesumary/ekle'] = 'admin/directionpage/ozgecmis/summary';
$route['admin/resumesumary/ekleme'] = 'admin/directionend/ozgecmis/summary';
$route['admin/resumesumary/duzenle/(:num)'] = 'admin/directionpage/ozgecmis/summary/$i';
$route['admin/resumesumary/duzenleme/(:num)'] = 'admin/directionend/ozgecmis/summary/$i';
$route['admin/resumesumary/sil/(:num)'] = 'admin/sil/ozgecmis/summary/$i';
$route['admin/education/ekle'] = 'admin/directionpage/ozgecmis/resume';
$route['admin/education/ekleme'] = 'admin/directionend/ozgecmis/resume';
$route['admin/education/duzenle/(:num)'] = 'admin/directionpage/ozgecmis/resume/$i';
$route['admin/education/duzenleme/(:num)'] = 'admin/directionend/ozgecmis/resume/$i';
$route['admin/education/sil/(:num)'] = 'admin/sil/ozgecmis/resume/$i';
$route['admin/experience/ekle'] = 'admin/directionpage/ozgecmis/resume';
$route['admin/experience/ekleme'] = 'admin/directionend/ozgecmis/resume';
$route['admin/experience/duzenle/(:num)'] = 'admin/directionpage/ozgecmis/resume/$i';
$route['admin/experience/duzenleme/(:num)'] = 'admin/directionend/ozgecmis/resume/$i';
$route['admin/experience/sil/(:num)'] = 'admin/sil/ozgecmis/resume/$i';
/* Portfolio */
$route['admin/portfolio/ekle'] = 'admin/directionpage/portfolio/portfolio';
$route['admin/portfolio/ekleme'] = 'admin/directionend/portfolio/portfolio/folder/$i';
$route['admin/portfolio/duzenle/(:num)'] = 'admin/directionpage/portfolio/portfolio/$i';
$route['admin/portfolio/duzenleme/(:num)'] = 'admin/directionend/portfolio/portfolio/file/$i';
$route['admin/portfolio/sil/(:num)'] = 'admin/sil/portfolio/portfolio/folder/$i';
$route['admin/portfolioinfo/(:num)'] = 'admin/portfolioinfo/$i';
$route['admin/portfolioslider/(:num)'] = 'admin/portfolioslider/$i';

$route['admin/portfolioinfo/duzenleme/(:num)/(:num)'] = 'admin/directionend/portfolioinfo/portfolio_info/$i/$i';

$route['admin/portfolioslider/ekle/(:num)'] = 'admin/directionpage/portfolioslider/portfolio_slider/$i';
$route['admin/portfolioslider/ekleme/(:num)'] = 'admin/directionend/portfolioslider/portfolio_slider/file/$i';
$route['admin/portfolioslider/duzenle/(:num)/(:num)'] = 'admin/directionpage/portfolioslider/portfolio_slider/$i/$i';
$route['admin/portfolioslider/duzenleme/(:num)/(:num)'] = 'admin/directionend/portfolioslider/portfolio_slider/file/$i/$i';
$route['admin/portfolioslider/sil/(:num)/(:num)'] = 'admin/sil/portfolioslider/portfolio_slider/file/$i/$i';
/* Youtube */
$route['admin/youtube/ekle'] = 'admin/directionpage/youtube/youtube';
$route['admin/youtube/ekleme'] = 'admin/directionend/youtube/youtube';
$route['admin/youtube/duzenle/(:num)'] = 'admin/directionpage/youtube/youtube/$i';
$route['admin/youtube/duzenleme/(:num)'] = 'admin/directionend/youtube/youtube/$i';
$route['admin/youtube/sil/(:num)'] = 'admin/sil/youtube/youtube/$i';
/* CV */
$route['admin/cv/ekle'] = 'admin/directionpage/cv/cv';
$route['admin/cv/ekleme'] = 'admin/directionend/cv/cv/file';
$route['admin/cv/duzenle/(:num)'] = 'admin/directionpage/cv/cv/$i';
$route['admin/cv/duzenleme/(:num)'] = 'admin/directionend/cv/cv/file/$i';
$route['admin/cv/sil/(:num)'] = 'admin/sil/cv/cv/file/$i';
/* Referanslar */
$route['admin/testimonial/ekle'] = 'admin/directionpage/referans/testimonials';
$route['admin/testimonial/ekleme'] = 'admin/directionend/referans/testimonials';
$route['admin/testimonial/duzenle/(:num)'] = 'admin/directionpage/referans/testimonials/$i';
$route['admin/testimonial/duzenleme/(:num)'] = 'admin/directionend/referans/testimonials/$i';
$route['admin/testimonial/sil/(:num)'] = 'admin/sil/referans/testimonials/$i';
/* İletişim */
$route['admin/contact/duzenleme/(:num)'] = 'admin/directionend/ilet/contact_info/$i';
$route['admin/message/sil/(:num)'] = 'admin/sil/ilet/contact/$i';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
