<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files
{
    protected $CI;
    protected $path;
    protected $url;

	public function __construct()
	{
		$this->CI 	= & get_instance();
        $this->CI->load->library('upload');
        $this->url  = "assets/storage/";
	}

    public function upload($data, $import = FALSE)
    {
        $this->path = realpath(APPPATH . '../assets/storage');

        if(!empty($_FILES['image']['name']))
        {
            $config = array(
                'allowed_types'         => $data['allowed_types'],
                'upload_path'           => $this->path,
                'file_name'             => generate_code(5).timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "YmdHis").'.'.$data['file_type'],
                'max_size'              => (isset($data['max_size']))? $data['max_size'] : 3000000,
                'overwrite'             => TRUE
            );

            $this->CI->upload->initialize($config);

            if($this->CI->upload->do_upload('image'))
            {
            	if($import == FALSE)
				{
					\Cloudinary::config(array(
						"cloud_name" 	=> "edelacruz9713",
						"api_key" 		=> "353465522639972",
						"api_secret" 	=> "yarigr_LAS_YCw_jVjTAZWjU_Iw"
					));

					$public_name = str_replace(".".$data['file_type'], '', $_FILES['image']['name']);

					$file = \Cloudinary\Uploader::upload($_FILES['image']['tmp_name'], array('folder' => $data['folder'].'/'.$data['school_name'].'/', 'public_id' => $public_name));
					unlink('assets/storage/'.$config['file_name']);
					return array("result" => 1, "file" => $file['secure_url']);
				}
            	else
				{
					return array("result" => 1, "file" => 'assets/storage/'.$config['file_name']);
				}
            }
            else
            {
                return array("result" => 0, "error" => $this->CI->upload->display_errors());
            }
        }
    }
}
