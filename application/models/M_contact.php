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
 * @category   Model
 * @author     Gilang Bayu
 * @author     Gilang Bayu <ngbayu04@gmail.com>
 * @copyright  2019 Gilang Bayu
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    ecommerce V.1.12
 */
class M_contact extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function store_contact($data){
        $this->db->insert('t_contact', $data);
        $this->db->insert_id();
        $this->session->set_flashdata('MSG', '<script>swal("Suskes","Terimakasih, Telah mengirimkan pesan untuk kami", "success");</script>');
        redirect('pages/contact');
    }

    function delete_contact($id){
        $this->db->where('idcontact', $id);
        $this->db->delete('t_contact');
    }

    function data_contact(){
        return $this->db->get('t_contact');
    }

    function store_email_sub($data){
        $this->db->insert('t_email_subcribe', $data);
        $this->db->insert_id();
        $this->session->set_flashdata('MSG', '<script>swal("Suskes","Terimakasih, Telah bersedia mengikuti kami", "success");</script>');
        redirect(''.base_url().'');
    }

    function data_email_sub(){
        return $this->db->get('t_email_subcribe');
    }
}