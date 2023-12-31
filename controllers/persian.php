<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Persian extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        if (!is_admin()) {
            access_denied('Persian');
        }
    }

    public function index()
    {
        $data['title'] = 'توسعه پارسی';
        $this->load->view('persian', $data);
    }

    public function reset()
    {
        update_option('persian', '');
        redirect(admin_url('persian'));
    }

    public function save()
    {		
        foreach($this->input->post('data') as $key => $value)
		{
			update_option($key, $value);
		}
    }

    public function email()
    {		
        persian_translate_email();
    }

    public function email_theme()
    {		
        persian_email_theme();
    }

    public function sms()
    {		
        persian_translate_sms();
    }
}