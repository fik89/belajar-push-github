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
class M_cs extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function data_cs() {
        return $this->db->get('t_cs');
    }

    function data_cs_by_id($id) {
        $this->db->select('*')
                ->from('t_cs')
                ->where('id', $id);
        return $this->db->get();
    }

    function data_cs_by_phone($phone) {
        $this->db->select('*')
                ->from('t_cs')
                ->where('csPhone', $phone);
        return $this->db->get();
    }

    function data_cs_count_asc() {
        $this->db->select('*')
                ->from('t_cs')
                ->where('status', 'Active')
                ->order_by('count', 'asc');
        return $this->db->get();
    }

    function update_data_cs($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('t_cs', $data);
        echo "<script> $.notify({
            title: '<strong>Sukses</strong>',
            message: 'Item Terupdate'
                }, {
                type: 'success',
                animate: {enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                },placement: {from: 'top',align: 'right'
                },offset: 20,delay: 3000,timer: 500,spacing: 10,z_index: 1031,
                });
                </script>";
    }

    function store_cs($data) {
        $this->db->insert('t_cs', $data);
        $this->db->insert_id();
        echo "<script> $.notify({
                title: '<strong>Sukses</strong>',
                message: 'Sukses Script " . $data['csName'] . "  Tersimpan'
                    }, {type: 'success',
                    animate: { enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                    },placement: {from: 'top',align: 'right'
                    },offset: 20,delay: 4000,timer: 1000, spacing: 10,z_index: 1031,
                    });
                    </script>";
    }

}
