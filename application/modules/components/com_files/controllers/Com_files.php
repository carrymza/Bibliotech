<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Com_files extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('com_files/com_files_model');
		$this->load->library('upload');
	}

	public function upload($data, $import = FALSE)
	{
		$image                          = FALSE;

		if(!empty($_FILES))
		{
			$upload_data = array(
				'allowed_types'         => (isset($data['allowed_types'])) ? $data['allowed_types'] : 'csv|xls|xlsx|txt|docx|doc|pdf|pptx|ppt|gif|jpg|png|jpeg',
				'file_type'             => $data['file_type'],
				'max_size'              => (isset($data['max_size'])) ? $data['max_size'] : 4000000,
				'folder'                => $data['folder'],
				'school_name'			=> $this->school_name
			);

			$image = $this->files->upload($upload_data, $import);
		}

		return $image;
	}

	public function unlink_image($image)
	{
		if(file_exists(APPPATH.'../'.$image))
		{
			unlink(APPPATH.'../'.$image);
		}
	}
}
