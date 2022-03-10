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
class M_pages extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    #Page Gallery

    function simpan_gallery($data) {
        $this->db->insert('t_page_gallery', $data);
        $this->db->insert_id();
    }

    function data_gallery() {
        return $this->db->get('t_page_gallery');
    }

    function data_gallery_id($id) {
        $this->db->where('idpagegallery', $id);
        return $this->db->get('t_page_gallery');
    }

    function update_gallery_save($id, $data) {
        $this->db->set($data)
                ->where('idpagegallery', $id);
        $this->db->update('t_page_gallery');
    }

    function hapus_gallery($id) {
        $this->db->where('idpagegallery', $id);
        $this->db->delete('t_page_gallery');
    }

    function jumlah_data_gallery() {
        return $this->db->get('t_page_gallery')->num_rows();
    }

    function data_gallery_pagination($number, $offset) {
        return $query = $this->db->get('t_page_gallery', $number, $offset)->result();
    }

    #Page Service

    function simpan_service($data) {
        $this->db->insert('t_page_service', $data);
        $this->db->insert_id();
    }

    function data_service() {
        return $this->db->get('t_page_service');
    }

    function data_service_id($id) {
        $this->db->where('idpageservice', $id);
        return $this->db->get('t_page_service');
    }

    function update_service_save($id, $data) {
        $this->db->set($data)
                ->where('idpageservice', $id);
        $this->db->update('t_page_service');
    }

    function hapus_service($id) {
        $this->db->where('idpageservice', $id);
        $this->db->delete('t_page_service');
    }

    #Page Term & Condition

    function data_term_condition() {
        return $this->db->get('t_page_term_condition');
    }

    function update_term_condition($data) {
        $id = 1;
        $this->db->set($data)
                ->where('id', $id);
        $this->db->update('t_page_term_condition');
    }

    #Page Term & Condition

    function data_privacy_policy() {
        return $this->db->get('t_page_privacy_policy');
    }

    function update_privacy_policy($data) {
        $id = 1;
        $this->db->set($data)
                ->where('id', $id);
        $this->db->update('t_page_privacy_policy');
    }

}
