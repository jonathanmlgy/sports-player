<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Sports extends CI_Controller {

	public function index()
	{ 
		$this->load->model("Sport");
		if($this->input->post() == NULL) 
		{
			$athletes = $this->Sport->get_all_athletes();
			$view_data['athletes'] = $athletes;
		} 

		else if($this->input->post() !== NULL) 
		{
			if($this->input->post('search') == NULL) {
				$this->load->model("Sport");
				$gender = $this->input->post('gender');
				$sport = $this->input->post('sport');
				$athletes = $this->Sport->get_filtered_athletes($gender, $sport);
				var_dump($this->input->post('search'));
			} else if ($this->input->post('search') !== NULL) {
				$athlete = $this->input->post('search');
				$athletes = $this->Sport->get_athlete($athlete);
				$view_data['athlete'] = $athletes;
				$this->load->view('sports', $view_data);
				return;
			}
		} 
		$view_data['athletes'] = $athletes;
		$this->load->view('sports', $view_data);
	}
}
?>