<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dict extends CI_Controller {

	/**
	 * Word Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/dict
	 *	- or -  
	 * 		http://example.com/index.php/dict/index
	 */
	 
	 
   public function __construct()
   {
		parent::__construct();
		
		$this->load->model('Word', 'words');
   }

	public function index()
	{
		if ($this->input->post('keyword'))
		{
			//only show results if two or more characters have been typed - max of 50 characters 
			$keyword = $this->input->post('keyword');
			$len = strlen(str_replace(" ","", $keyword)); //don't count blank spaces 
			if ($len < 3 || $len > 50) { 
				echo 'hide'; die; 
			} 
			// 

			//get results if search string is longer than 3 characters 
			if ($len > 3) { 
			
				$words = $this->words->get_all($keyword);
				$data = array("keyword"=> $keyword, "words"=> $words);
				$response = $this->load->view("instant", array("data"=> $data), true);
				echo $response;
			} 
		}
	}
	
	public function search()
	{
	}
	
	public function word($id)
	{
		if (isset($id))
		{
			$data['word'] = $this->words->get_word($id);
			
			if ($data['word'] != null)
			{
				echo $data['word']->id . ' '. $data['word']->kanji;
				
			}
			else
			{
				echo "Not found word with id $id";
			}
		}
	}
}

/* End of file word.php */
/* Location: ./application/controllers/dict.php */