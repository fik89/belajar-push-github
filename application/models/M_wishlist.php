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
class M_wishlist extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function data_count_wishlist() {
        $this->db->select('t_wishlist.idproduct, t_product.idproduct, productName, COUNT(t_wishlist.idproduct) AS count')
                ->from('t_wishlist')
                ->join('t_product', 't_product.idproduct=t_wishlist.idproduct')
                ->group_by('t_wishlist.idproduct')
                ->order_by('count', 'DESC');
        return $this->db->get();
    }

    function data_wishlist() {
        $this->db->select('t_wishlist.idproduct, t_product.idproduct, phone, productName, ipAddress, dateSubmit')
                ->from('t_wishlist')
                ->join('t_product', 't_product.idproduct=t_wishlist.idproduct');
        return $this->db->get();
    }

    function store_wishlist($data) {
        $this->db->insert('t_wishlist', $data);
        $this->db->insert_id();
    }

}
