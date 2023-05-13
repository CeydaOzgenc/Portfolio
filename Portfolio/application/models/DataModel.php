<?php
class DataModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function login($email, $password){
		$query = $this->db->get_where('login', array('Login_mail'=>$email, 'Login_password'=>$password));
		return $query->row_array();
	}
	public function getWhere($db,$col,$option){ /* Veritabanı where ayarı */
		for ($i=0; $i < count($col); $i++) { 
			$db->where($col[$i], $option[$i]);
		}
	}
	public function getSet($col,$option){ /* Veritabanı set ayarı */
		for ($i=0; $i < count($col); $i++) { 
			$this->db->set($col[$i], $option[$i]);
		}
	}
	public function getColm($page){ /* Tabloya göre sütun adları */
		return $this->db->field_data($page);
	}
	/* Verilere göre görüntüleme */
	public function getSelect($page, $wherecol=null, $whereoption=null,$orderby=null,$orderbyoption='ASC'){ 
		$db=$this->db->select('*')->from($page);
		if($wherecol and $whereoption){ $this->getWhere($db,$wherecol,$whereoption); }
		if($orderby){ $this->db->order_by($orderby,$orderbyoption); }
		$query = $db->get();
		return $query->result_array();
	}
	/* Yeni veri ekleme */
	public function getInsert($page,$set=null,$setoption=null, $wherecol=null, $whereoption=null){
		if($set and $setoption){ $this->getSet($set,$setoption); }
		if($wherecol and $whereoption){ $this->getWhere($this->db,$wherecol,$whereoption); }
		$this->db->insert($page);
	}
	/* Verilere göre güncelleme */
	public function getUpdate($page,$set=null,$setoption=null, $wherecol=null, $whereoption=null){
		if($set and $setoption){ $this->getSet($set,$setoption); }
		if($wherecol and $whereoption){ $this->getWhere($this->db,$wherecol,$whereoption); }
		$this->db->update($page);
	}
	/* Verilere göre silme */
	public function getDelete($page,$wherecol=null, $whereoption=null){
		if($wherecol and $whereoption){ $this->getWhere($this->db,$wherecol,$whereoption); }
		$this->db->delete($page);
	}
	/* Seçilen tablonun verisini sayar */
	public function getLeng($page, $wherecol=null, $whereoption=null){ 
		$this->db->select('*')->from($page);
		if($wherecol and $whereoption){ $this->getWhere($this->db,$wherecol,$whereoption); }
		return $this->db->count_all_results();
	}
	public function getInsertId(){ 
		return $this->db->insert_id();
	}
	
}
?>