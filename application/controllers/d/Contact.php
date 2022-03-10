<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* e-commerce offline & online shop
    version : V1.12
    Dev : @ng_bayu
    email : ng.bayu@yahoo.com / ngbayu04@gmail.com
    PHP : v.7.0 */
/**
 *
 * PHP version 7.0
 *
 * @category   Controller
 * @author     Gilang Bayu
 * @author     Gilang Bayu <ngbayu04@gmail.com>
 * @copyright  2019 Gilang Bayu
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    ecommerce V.1.12
 */
class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();
         if ($this->session->userdata('iduser') == "" && $this->session->userdata('tipeuser') != "1") {
            $this->session->set_flashdata('MSG', 'Login Gagal <br> Anda tidak memiliki akses ke dashboard');
            redirect('d/User');
        }
        $this->load->model(array('M_contact'));
        $this->load->database();
    }

    function data_contact(){
        if (valid_admin()['status'] == 0) {
            echo valid_admin()['message'];
        } else {
            $data['data'] = $this->M_contact->data_contact()->result();
            $this->load->view('dashboard/contact/data_contact', $data);
        }
    }

    function data_email_sub(){
        if (valid_admin()['status'] == 0) {
            echo valid_admin()['message'];
        } else {
        	$data['data'] = $this->M_contact->data_email_sub()->result();
            $this->load->view('dashboard/contact/data_email_sub', $data);
        }
    }
}
