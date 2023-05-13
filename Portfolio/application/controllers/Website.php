<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataModel');
		$this->load->library('email');
	}
	public function index()
	{
		$selected = $this->uri->segment(2);
		$pages=$this->DataModel->getSelect('page',null,null,$orderby='Page_Arrange');
		$pagesarray = array(); 
      	foreach ($pages as $page){$pagesarray[] = $page;}

      	$data["pagesarray"]=$pagesarray;
		$data["header"]=$this->DataModel->getSelect('page',['Page_Menuposition'],['1']);
		$navbar=$this->DataModel->getSelect('navbar');
		foreach ($navbar as $nav){$data["navbar"] = $nav;}
		/* Anasayfa */
		$homes=$this->DataModel->getSelect('home');
		foreach ($homes as $home){ $data["home"]=$home;}
		$data["homeslider"]=$this->DataModel->getSelect('home_slider');
		/* Hakkında */
		$abouts=$this->DataModel->getSelect('about');
		foreach ($abouts as $about){ $data["about"]=$about;}
		$data["aboutonparagraph"]=$this->DataModel->getSelect('about_paragraph',['About_paragraph_Position'],['2']);
		$data["aboutparagraphs"]=$this->DataModel->getSelect('about_paragraph',['About_paragraph_Position'],['1']);
		$aboutcount=0;
		$aboutleng=$this->DataModel->getLeng('about_info');
		$infoarray= array();
		$infohalfarray= array();
		$aboutinfos=$this->DataModel->getSelect('about_info');
		foreach ($aboutinfos as $info){ 
			if($aboutcount<=round($aboutleng/2)-1){
				$infoarray[]=$info;
			}else{
				$infohalfarray[]=$info;
			}
			$aboutcount=$aboutcount+1;
		}
		$data["abouthalfinfo"]=$infoarray;
		$data["aboutinfo"]=$infohalfarray;
		/* Yetenekler */
		$data["skillsparagraph"]=$this->DataModel->getSelect('skills');
		$skillcount=0;
		$skillleng=$this->DataModel->getLeng('skillslist');
		$skillarray= array();
		$skillhalfarray= array();
		$skills=$this->DataModel->getSelect('skillslist');
		foreach ($skills as $skill){ 
			if($skillcount<=round($skillleng/2)-1){
				$skillarray[]=$skill;
			}else{
				$skillhalfarray[]=$skill;
			}
			$skillcount=$skillcount+1;
		}
		$data["skillsinfohalf"]=$skillarray;
		$data["skillsinfo"]=$skillhalfarray;
		/* Tecrübe */
		$resumesummary=$this->DataModel->getSelect('resume_summary');
		foreach ($resumesummary as $rsmesum){ $data["resumesummary"]=$rsmesum;}
		$data["resumeparagraph"]=$this->DataModel->getSelect('summary');
		$data["resumeeducation"]=$this->DataModel->getSelect('resume',['Resume_Type'],['education']);
		$data["resumeexperience"]=$this->DataModel->getSelect('resume',['Resume_TYpe'],['experience']);
		/* Portfolio */
		$data["portfolioinfo"]=$this->DataModel->getSelect('portfolio');
		/* Youtube */
		$data["youtube"]=$this->DataModel->getSelect('youtube');
		/* Cv */
		$data["cv"]=$this->DataModel->getSelect('cv');
		/* Referans */
		$data["testimonials"]=$this->DataModel->getSelect('testimonials');
		/* İletişim */
		$contactinfo=$this->DataModel->getSelect('contact_info');
		foreach ($contactinfo as $info){ $data["contact"]=$info;}
		if($selected){
			redirect(base_url().'index.php#'.$selected);
		}else{
			$this->load->view('index',$data);
		}
	}
	public function portfolioDetail()
	{
		$selected = $this->uri->segment(2);
		$data["header"]=$this->DataModel->getSelect('page',['Page_Menuposition'],['1']);
		$data["portfolios"]=$this->DataModel->getSelect('portfolio_slider',['Portfolio_Id'],[$selected]);
		$navbar=$this->DataModel->getSelect('navbar');
		foreach ($navbar as $nav){$data["navbar"] = $nav;}
		$infos=$this->DataModel->getSelect('portfolio_info',['Portfolio_Id'],[$selected]);
		foreach ($infos as $info){ $data["portfolioinfo"]=$info;}
		$data["id"]=$selected;
		$this->load->view('portfolio-details',$data);
	}
	public function mail($page = false,$table = false)
	{
		$colm=$this->DataModel->getColm($table);
		$postarray = array();
		$namearray = array();
		foreach ($colm as $col){
			array_push($postarray,$col->name);
			array_push($namearray,$this->input->Post($col->name));
		}
		$this->DataModel->getInsert($table,$postarray,$namearray);
		$this->index();
		$this->email->to('info@ceydaozgenc.com');
		$this->email->from('codexworld@gmail.com','CodexWorld');
		$this->email->subject('Test Email (TEXT)');
		$this->email->message('Text email testing by CodeIgniter Email library.');
		$this->email->send();
	}
}
