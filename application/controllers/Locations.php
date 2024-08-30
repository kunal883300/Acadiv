<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Locations extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("location_model");

    }

    public function index()
    {
        if (!$this->rbac->hasPrivilege('location', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Student Information');
        $this->session->set_userdata('sub_menu', 'locations/index');
        $data['title'] = 'Location List';

        $location_result      = $this->location_model->get(); 
        $data['locationlist'] = $location_result;
        $this->form_validation->set_rules('location', $this->lang->line('location'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('location/locationList', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'locations' => $this->input->post('location'),
            );
            $this->location_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left alert-icon alert-dismissible"><em class="icon ni ni-check-circle"></em>' . $this->lang->line('success_message') . '<button class="close" data-bs-dismiss="alert"></button></div>');
            redirect('locations/index');
        }
    }


    public function delete($id)
    {
        if (!$this->rbac->hasPrivilege('location', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'location List';
        $this->location_model->remove($id);

        $student_delete=$this->student_model->getUndefinedStudent();
        if(!empty($student_delete)){
            $delte_student_array=array();
            foreach ($student_delete as $student_key => $student_value) {

                $delte_student_array[]=$student_value->id;
            }
            $this->student_model->bulkdelete($delte_student_array);
        }        
        redirect('locations/index');
    }



    public function edit($id)
    {
        if (!$this->rbac->hasPrivilege('location', 'can_edit')) {
            access_denied();
        }
        $data['title']       = 'Location List';
        $location_result      = $this->location_model->get();
        $data['locationlist'] = $location_result;
        $data['title']       = 'Edit location';
        $data['id']          = $id;
        $location             = $this->location_model->get($id);
        $data['locations']     = $location;
        $this->form_validation->set_rules('location', $this->lang->line('location'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('location/locationEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'id'      => $id,
                'locations' => $this->input->post('location'),
            );
            $this->location_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left alert-icon alert-dismissible"><em class="icon ni ni-check-circle"></em>' . $this->lang->line('update_message') . '</div>');
            redirect('locations/index');
        }
    }

}
