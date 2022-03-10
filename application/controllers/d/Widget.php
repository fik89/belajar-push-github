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
class Widget extends CI_Controller {

    public function __construct() {
        parent::__construct();
         if ($this->session->userdata('iduser') == "" && $this->session->userdata('tipeuser') != "1") {
            $this->session->set_flashdata('MSG', 'Login Gagal <br> Anda tidak memiliki akses ke dashboard');
            redirect('d/User');
        }
        $this->load->model(array('M_widget'));
        $this->load->library(array('session'));
        $this->load->database();
    }

    function data_widget_by_name() {
        if (valid_admin()['status'] == 0) {
            echo valid_admin()['message'];
        } else {
            $name = $this->input->post('name');
            $data['data'] = $this->M_widget->data_widget_by_name($name)->result();
            if ($name == "Chat Button") {
                $this->load->view('dashboard/widget/data_chat_button', $data);
            } elseif ($name == "Share Button") {
                $this->load->view('dashboard/widget/data_share_button', $data);
            } elseif ($name == "Facebook Comment") {
                $this->load->view('dashboard/widget/data_facebook_comment', $data);
            }elseif ($name == "Order Via WhatsApp") {
                $this->load->view('dashboard/widget/data_order_via_wa', $data);
            }
        }
    }

    function update_widget() {
        $id = $this->input->post('id');
        $data = array(
            'widgetStatus' => $this->input->post('status'),
            'widgetCta' => $this->input->post('cta'),
            'widgetPosition' => $this->input->post('position'),
            'widgetScriptId' => $this->input->post('scriptid')
        );
        $this->M_widget->update_data_widget($id, $data);
    }

}
