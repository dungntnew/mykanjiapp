<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Word extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	function get_all_entries()
	{
		$query = $this->db->get("word");
		return $query->result();
	}
	
	function get_all($search_key)
	{		
			$this->db->select("*");
			$this->db->from("word");
			$this->db->like("kanji", $search_key);
			$this->db->or_like("mean", $search_key);
			$this->db->or_like("on", $search_key);
			$this->db->or_like("kun", $search_key);
			$this->db->or_like("detail", $search_key);
			
			
			$query = $this->db->get();
			return $query->result();
	}
	
	function get_word($id)
	{
		$query = $this->db->get_where("word", array("id"=> $id));
		return $query->row();
	}
}

/* End of file word.php */
/* Location: ./application/models/word.php */