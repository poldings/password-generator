<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
    
/*
 * -------------------------------
 * PASSWORD GENERATOR
 * -------------------------------
 * by Vincent Polding
 * contact: http://www.poldings.com
 * demo site: http://password-generator.poldings.com
 * 20th Dec 2014
 */

class Generator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        // load generator model
        $this->load->model('generator_model');
    }

    public function index()
    {
        $this->generator();
    }
    
    /*
     * GENERATOR PAGE
     * displays page to create new password
     * displays newly created password
     */
    public function generator()
    {
        
        // set adjective
        $adjective_result = $this->generator_model->get_adjective();
        $data['adjective'] = $adjective_result['adjective'];
        $data['adjective_new'] = $adjective_result['adjective_new'];
        
        // set noun
        $noun_result = $this->generator_model->get_noun();
        $data['noun'] = $noun_result['noun'];
        $data['noun_new'] = $noun_result['noun_new'];
        
        // load page
        $data['main_content'] = 'generator';
        $this->load->view('includes/template_site', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */