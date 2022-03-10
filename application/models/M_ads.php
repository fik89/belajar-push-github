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
class M_ads extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function data_ads_by_name($name) {
        $this->db->select('*')
                ->from('t_ads')
                ->where('adsName', $name);
        return $this->db->get();
    }

    function data_ads_by_name_active($name) {
        $this->db->select('*')
                ->from('t_ads')
                ->where('adsName', $name)
                ->where('adsStatus', 'Active');
        return $this->db->get();
    }

    function data_ads_by_id($id) {
        $this->db->select('*')
                ->from('t_ads')
                ->where('idads', $id);
        return $this->db->get();
    }

    function store_ads($data) {
        $datacek = $this->data_ads_by_name($data['adsName'])->row();
        if (!empty($data['adsName']) || !empty($data['adsScript'])) {
            if ($datacek->idads > 1) {
                echo "<script> $.notify({
                title: '<strong>Gagal</strong>',
                message: 'Anda Sudah mendaftarkan 1 ID Pixel'
                    }, {type: 'danger',animate: {enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                    },placement: {from: 'top',align: 'right'
                    },offset: 20,delay: 4000,timer: 1000,spacing: 10, z_index: 1031,
                    });
                    </script>";
            } else {
                $this->db->insert('t_ads', $data);
                $this->db->insert_id();
                echo "<script> $.notify({
                title: '<strong>Sukses</strong>',
                message: 'Sukses Script " . $data['adsName'] . "  Tersimpan'
                    }, {type: 'success',
                    animate: { enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                    },placement: {from: 'top',align: 'right'
                    },offset: 20,delay: 4000,timer: 1000, spacing: 10,z_index: 1031,
                    });
                    </script>";
            }
        } else {
            echo "<script> $.notify({
                title: '<strong>Gagal</strong>',
                message: 'Cek input data Anda'
                    }, {type: 'danger',animate: {enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                    },placement: {from: 'top',align: 'right'
                    },offset: 20,delay: 4000,timer: 1000,spacing: 10, z_index: 1031,
                    });
                    </script>";
        }
    }

    function update_data_ads($id, $data) {
        $this->db->where('idads', $id);
        $this->db->update('t_ads', $data);
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

    function delete_ads($id) {
        $this->db->where('idads', $id);
        $this->db->delete('t_ads');
    }

}
