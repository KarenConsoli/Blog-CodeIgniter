<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_File extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','crud'); 
		$this->load->library('upload');
		$this->output->enable_profiler(TRUE);

	}

	public function index()
	{
		$this->load->view('form_upload');
	}

	public function do_upload()
	{
		$config['upload_path'] = "./files_galeri/";
		$config['allowed_types'] = 'gif|jpg|png|JPEG';
		// $config['max_size']      = '10240';
  //     	$config['max_width']     = '1200';
  //     	$config['max_height']    = '1200';
		$config['file_name'] = url_title($this->input->post('file_upload'));
		$config['encrypt_name']  = TRUE;

		$this->upload->initialize($config); //meng set config yang sudah di atur
		if( !$this->upload->do_upload('file_upload'))
		{
			echo $this->upload->display_errors();
		}else{
			$data = array(
				
				'name'		=>$this->upload->file_name,
				);
			$this->crud->insert($data,'images');
			redirect('upload_file/view');
		}
	}

	public function view()
	{
		$data['images'] = $this->crud->show('images');

		$this->load->view('layout/head');
		$this->load->view('layout/navigation');
		$this->load->view('view_upload',$data);
		$this->load->view('layout/footer');
	}

	public function delete_data()
	{
		$data = array('id' =>$_GET['id']);

		$delete_data = $this->crud->delete_data_images($data);

		if ($delete_data) {
			redirect(site_url());
		}else{
			echo "<div class='alert alert-danger'>Data gagal dihapus</div><br>";
			echo '<a href="'.site_url('crud/').'">Kembali</a>';
		}	
	}
}