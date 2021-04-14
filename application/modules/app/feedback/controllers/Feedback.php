<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends APP_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title       	= 'Feedback';
        $this->load->model('feedback/feedback_model');
    }

    public function add()
    {
        $data = array(
            'name'  => $this->full_name,
            'email' => $this->email
        );

        echo json_encode(array('result' => 1, 'view' => $this->load->view('feedback/feedback_view', $data, TRUE)));
    }

    public function send_message()
    {
        $this->form_validation->set_rules('name','<strong>Nombre</strong>','trim|required');
        $this->form_validation->set_rules('email','<strong>Email</strong>','trim|required|valid_email');
        $this->form_validation->set_rules('message','<strong>Comentario / Sugerencia</strong>','trim|required');

        if($this->form_validation->run($this) == FALSE)
        {
            echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
        }
        else
        {
            $data = array(
            	'schoolId'	=> $this->schoolId,
                'userId'    => $this->userId,
                'name'      => $this->input->post('name'),
                'email'     => $this->input->post('email'),
                'message'   => $this->input->post('message'),
            );

            if($this->feedback_model->save($data))
            {
                echo json_encode(array('result' => 1));
            }
            else
            {
                echo json_encode(array('result' => 0, 'error' => display_error("<li>Problemas en el servidor. Intentelo mas tarde</li>")));
            }
        }
    }
}
