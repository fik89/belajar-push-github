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
class M_shiping_gateway extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function data_shiping_gateway() {
        return $this->db->get('t_shiping_gateway');
    }

    function data_shiping_gateway_by_name($name){
        $this->db->select('*')
                ->from('t_shiping_gateway')
                ->where('shipingGatewayName', $name);
        return $this->db->get();
    }

    function update_shiping_gateway($id, $data) {
                $this->db->set($data)
                        ->where('id', $id);
                $this->db->update('t_shiping_gateway');
                echo "<script> $.notify({
                title: '<strong>Sukses</strong>',
                message: 'Update Sukses'
                    }, {type: 'success',
                    animate: { enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                    },placement: {from: 'top',align: 'right'
                    },offset: 20,delay: 4000,timer: 1000, spacing: 10,z_index: 1031,
                    });
                    </script>";
    }

}
