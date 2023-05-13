<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataModel');
		$this->load->library('image_lib');
	}
	public function index()
	{
		$this->load->view('admin/index');
	}
	/* Panale giriş */
	public function login(){
		$mail=$this->input->Post('mail');
		$password=$this->input->Post('password');
		$session = $this->DataModel->getSelect('login',['Login_mail','Login_password'],[$mail,$password]);
		if($session){
			$this->session->set_userdata('user', $session);
			$this->anasayfa();
		}
		else{
			$this->load->view('admin/index');
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}
	/* Panalden çıkış */
	public function logout(){
		$this->session->unset_userdata('user');
		$this->load->view('admin/index');
	}	

	/* Dosya yolunun alındığı fonksiyon */
	public function getpath($col,$id=null){
		switch ($col) {
			case 'About_Img':
				return 'assets/img/';
				break;
			case 'Cv_pdf':
				return 'assets/img/';
				break;
			case 'Navbar_Img':
				return 'assets/img/';
				break;
			case 'Portfolio_slider_img':
				return 'assets/img/portfolio/portfolio'.$id.'/';
				break;
			case 'Portfolio_Front_Img':
				return 'assets/img/portfolio/';
				break;
			case 'Portfolio_Magnification_Img':
				return 'assets/img/portfolio_detail/';
				break;
			case 'portfolio':
				return 'assets/img/portfolio/';
				break;
		}
	}
	/* Klasör silmenin yapıldığı fonksiyon */
	public function folderdelete($path){
		if (is_dir($path)) {
        $objects = scandir($path);
        foreach ($objects as $object)
        {
            if ($object != "." && $object != "..")
            {
                if (is_dir($path. "/" . $object)) {
                    folderdelete($path . "/" . $object);
                } else {
                    unlink($path . "/" . $object);
                }
            }
        }
        rmdir($path);
   }
	}

	/* Dosya silmenin yapıldığı fonksiyon */
	public function filedelete($table,$mainid,$id,$col,$new=null){
		$rows=$this->DataModel->getSelect($table,[ucwords($table).'_Id'],[$id]);
		foreach ($rows as $row) {
			$delete=$row[$col];
		}
		if($mainid){$path=$this->getpath($col,$mainid);}
		else{$path=$this->getpath($col);}
		if($path.$delete!=$new){
			unlink($path . $delete);
		}
	}
	/* Dosya düzenleme ve eklemenin yapıldığı fonksiyon */
	public function getimg($table,$mainid,$id,$col,$source,$new,$type){
		$config['source_image'] = $source;
		$config['new_image'] = $new;
		$this->image_lib->initialize($config);
		if($type=="duzenleme"){
			$this->filedelete($table,$mainid,$id,$col,$new);
		}
		if ( ! $this->image_lib->crop()){
        	echo $this->image_lib->display_errors();
		}
	}
	/* Silmenin yapıldığı fonksiyon */
	public function sil($page = false, $table = false, $segoption=false){
		if( $this->uri->segment(5)){$mainid = $this->uri->segment(4); $id = $this->uri->segment(5);}
		else{$mainid=null; $id = $this->uri->segment(4);}
		if($segoption=='file' or $segoption=='folder'){
			if($segoption=='folder'){
				$folderpath=$this->getpath($table);
				$path=$folderpath.$table.$id;
				$this->folderdelete($path);
			}
			$colm=$this->DataModel->getColm($table);
			foreach ($colm as $col){
				if($col->type=="char"){
					$this->filedelete($table,$mainid,$id,$col->name);
				}
			}	
		}
		$this->DataModel->getDelete($table,[ucwords($table).'_Id'],[$id]);
		$this->$page();
	}

	/* Düzenleme ve eklemenin yapıldığı fonksiyon */
	public function directionend($page = false, $table = false, $segoption=false){
		$type = $this->uri->segment(2);
		$option = $this->uri->segment(3);
		if($this->uri->segment(5)){
			$mainid = $this->uri->segment(4);
			$id = $this->uri->segment(5);
		}else{
			$mainid=null;
			$id = $this->uri->segment(4);
		}
		$colm=$this->DataModel->getColm($table);
		$postarray = array();
		$namearray = array();
		$position=true;
		foreach ($colm as $col){
				$column=true;
				$splitname=explode("_", $col->name);
                foreach ($splitname as $word) {
                    if ($word=='Id' or $word=='Type'){
                        $column=false;
                    }
                }
				if($column){
					array_push($postarray,$col->name);
					if($col->type=="char"){
						if($_FILES[$col->name]["size"]!=0){
							array_push($namearray,$_FILES[$col->name]["name"]);
							if($segoption=='file' or $segoption=='folder'){
								if($col->name=="Portfolio_slider_img"){
									if($option=="duzenleme")
									{	echo "";
										$path=$this->getpath($col->name,$mainid);}
									else{$path=$this->getpath($col->name,$id);}
								}else{
									$path=$this->getpath($col->name);
								}
								$filepath=$path.$_FILES[$col->name]["name"];
								$this->getimg($table,$mainid,$id,$col->name,$_FILES[$col->name]["tmp_name"],$filepath,$option);
							}
						}else{
							if($option=="duzenleme"){
								array_pop($postarray);
							}else{
								$position=false;
							}
						}
					}else{
						array_push($namearray,$this->input->Post($col->name));
					}	
				}else if($col->name==ucwords($table).'_Type'){
					array_push($postarray,$col->name);
					array_push($namearray,$type);
				}else if($col->name!=ucwords($table).'_Id'){
					array_push($postarray,$col->name);
					if($option=="ekleme"){
						array_push($namearray,$id);
					}else{
						array_push($namearray,$mainid);
					}
				}
			}
		if($position and count($namearray)>0){
			if($option=="duzenleme"){
				if($id!=00) {
					$this->DataModel->getUpdate($table,$postarray,$namearray,[ucwords($table).'_Id'],[$id]);
				}else{
					$this->DataModel->getInsert($table,$postarray,$namearray);
				}	
			}else{
				$this->DataModel->getInsert($table,$postarray,$namearray);
				if($segoption=='folder'){
					$insertid=$this->DataModel->getInsertId();
					$folderpath=$this->getpath($page);
					mkdir($folderpath.$table.$insertid,'0777');
				}
			}
		}else{
			echo '<script>alert("Boş alan bırakılamaz.");</script>';
		}		
		$this->$page();
	}

	/* Düzenleme ve eklemenin yapıldığı sayfaya giden fonksiyon */
	public function directionpage($page = false, $table = false){
		if($session=$this->session->userdata('user')){
			$link = $this->uri->segment(2);
			$option = $this->uri->segment(3);
			if($this->uri->segment(5)){
				$mainid = $this->uri->segment(4);
				$id = $this->uri->segment(5);
			}else{
				$id = $this->uri->segment(4);
			}
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data['colm']=$this->DataModel->getColm($table);
			if($option=="duzenle"){
				if($this->uri->segment(5)){
					$data['id']=$mainid;
				}
				$colmdata=$this->DataModel->getSelect($table,[ucwords($table).'_Id'],[$id]);
				foreach ($colmdata as $colm) { $data['colmdata']=$colm;}
			}else{
				if($id){
					$data['id']=$id;
				}
				$data['colmdata']=false;
			}
			$data['direction']=array('page' => $page,'table' => $table,'link' => $link);
			$this->load->view('admin/directionpage',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	/*Navbar*/
	public function fullnavbar(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$navbar=$this->DataModel->getSelect('navbar');
			foreach ($navbar as $nav){$data["navbar"]=$nav;}
			$this->load->view('admin/navbar',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	/*Profil  Başlangıç*/
	public function profil(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$this->load->view('admin/profil',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}
	public function userupdate(){
		if($session=$this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$name=$this->input->Post('login_name');
			$mail=$this->input->Post('login_mail');
			$password=$this->input->Post('login_password');
			if($name & $mail & $password){
				$this->DataModel->getUpdate('login',['Login_username','Login_mail','Login_password'],[$name,$mail,$password],['Login_Id '],[$id]);
				$this->logout();
			}else{
				echo '<script>alert("Boş alan bırakılamaz.");</script>';
				$this->profil();
			}	
		}
		else{
			$this->load->view('admin/index');		
		}
	}
	/*Profil  Bitiş*/

	/*Sayfalar Başlangıç*/
	public function sayfalar(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data["info"]=$this->DataModel->getSelect('page',null,null,'Page_Arrange');
			$this->load->view('admin/sayfalar',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}
	public function position(){
		if($session=$this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$home=$this->DataModel->getSelect('page',['Page_Id','Page_Position'],[$id,'0']);
			if($home){
				$this->DataModel->getUpdate('page',['Page_Position'],['1'],['Page_Id'],[$id]);
			}else{
				$this->DataModel->getUpdate('page',['Page_Position','Page_Menuposition'],['0','0'],['Page_Id'],[$id]);
			}
			$this->sayfalar();
		}
		else{
			$this->load->view('admin/index');		
		}
	}
	public function navbar(){
		if($session=$this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$home=$this->DataModel->getSelect('page',['Page_Id','Page_Menuposition'],[$id,'0']);
			if($home){
				$leng=$this->DataModel->getLeng('page',['Page_Menuposition'],['1']);
				if($leng<5){
					$this->DataModel->getUpdate('page',['Page_Menuposition'],['1'],['Page_Id'],[$id]);
				}else{
					echo '<script>alert("En fazla 5 sayfa menüde gözükebilir.");</script>';
				}
			}else{
				$this->DataModel->getUpdate('page',['Page_Menuposition'],['0'],['Page_Id'],[$id]);
			}
			$this->sayfalar();
		}
		else{
			$this->load->view('admin/index');		
		}
	}
	/*Sayfalar Bitiş*/

	public function anasayfa(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$home=$this->DataModel->getSelect('home');
			foreach ($home as $h){$data["home"]=$h;}
			$data["slider"]=$this->DataModel->getSelect('home_slider');
			$this->load->view('admin/anasayfa',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function hakkinda(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$about=$this->DataModel->getSelect('about');
			foreach ($about as $info){$data["about"]=$info;}
			$data["aboutinfos"]=$this->DataModel->getSelect('about_info');
			$data["aboutparagraphs"]=$this->DataModel->getSelect('about_paragraph');
			$this->load->view('admin/hakkinda',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function yetenek(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data["skills"]=$this->DataModel->getSelect('skills');
			$data["skillslist"]=$this->DataModel->getSelect('skillslist');
			$this->load->view('admin/yetenek',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function ozgecmis(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$resumesummary=$this->DataModel->getSelect('resume_summary');
			foreach ($resumesummary as $summary){$data["summary"]=$summary;}
			$data["summaryparagraph"]=$this->DataModel->getSelect('summary');
			$data["education"]=$this->DataModel->getSelect('resume ',['Resume_Type'],['education']);
			$data["experience"]=$this->DataModel->getSelect('resume',['Resume_Type'],['experience']);
			$this->load->view('admin/ozgecmis',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function portfolio(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data["portfolios"]=$this->DataModel->getSelect('portfolio');
			$this->load->view('admin/portfolio',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}
	public function portfolioinfo(){
		if($session=$this->session->userdata('user')){
			if($this->uri->segment(4)){$id = $this->uri->segment(4);}
			else{$id = $this->uri->segment(3);}
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$portfolios=$this->DataModel->getSelect('portfolio_info',['Portfolio_Id'],[$id]);
            if(isset($portfolios)){
            	foreach ($portfolios as $info){$data["sqlarray"]=$info;}
            }else{
            	$data["sqlarray"]=false;
            }
            $data["id"]=$id;
			$this->load->view('admin/info',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}
	public function portfolioslider(){
		if($session=$this->session->userdata('user')){
			if($this->uri->segment(4)){$id = $this->uri->segment(4);}
			else{$id = $this->uri->segment(3);}
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data["slider"]=$this->DataModel->getSelect('portfolio_slider',['Portfolio_Id'],[$id]);
			$data["id"]=$id;
			$this->load->view('admin/slider',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function cv(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data["cvpage"]=$this->DataModel->getSelect('cv');
			$this->load->view('admin/cv',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function ilet(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$iletisim=$this->DataModel->getSelect('contact_info');
			foreach ($iletisim as $ilet){$data["info"]=$ilet;}
			$data["message"]=$this->DataModel->getSelect('contact');
			$this->load->view('admin/ilet',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function referans(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data["testimonials"]=$this->DataModel->getSelect('testimonials');
			$this->load->view('admin/referans',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}

	public function youtube(){
		if($session=$this->session->userdata('user')){
			foreach ($session as $user){$data["user"]=$user;}
			$data["pages"]=$this->DataModel->getSelect('page',['Page_Position'],['1'],'Page_Arrange');
			$data["youtubes"]=$this->DataModel->getSelect('youtube');
			$this->load->view('admin/youtube',$data);
		}
		else{
			$this->load->view('admin/index');		
		}
	}
}
