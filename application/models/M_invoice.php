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
class M_invoice extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function generate_id_invoice_partner() {
        $this->db->select('RIGHT(t_invoice_partner.idinvoicepartner,4) as kode', FALSE);
        $this->db->order_by('idinvoicepartner', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('t_invoice_partner');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $date = date('Y-m-d');
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kode = "inv-$date-" . $kodemax;
        return $kode;
    }

    function store_invoice($data) {
        $this->db->insert('t_invoice', $data);
        $this->db->insert_id();
    }
    
    function update_invoice($id, $data){
        $this->db->where('idorder', $id);
        $this->db->update('t_invoice', $data);
    }

    function store_invoice_partner($data) {
        $this->db->insert('t_invoice_partner', $data);
        $this->db->insert_id();
    }

    function update_status_invoice($id, $data) {
        $this->db->where('idinvoicepartner', $id);
        $this->db->update('t_invoice_partner', $data);
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

    function update_data_invoice($id, $data) {
        $this->db->where('idorder', $id);
        $this->db->update('t_invoice', $data);
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

    function data_invoice_partner_all() {
        $this->db->select('*')
                ->from('t_invoice_partner')
                ->join('t_user', 't_user.iduser=t_invoice_partner.iduser');
        return $this->db->get();
    }

    function invoice_partner_by_id($id) {
        $this->db->select('*')
                ->where('idinvoicepartner', $id);
        return $this->db->get('t_invoice_partner');
    }

    function update_bank_invoice_partner($id, $data) {
        $this->db->where('idinvoicepartner', $id);
        $this->db->update('t_invoice_partner', $data);
        $this->session->set_flashdata('MSG', '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Silahkan Konfirmasi Pembayaran jika Anda Sudah Melakukan Transfer</strong>. ' . $id . '</div>');
    }

    function data_invoice_by_id_order($id) {
        $this->db->select('*')
                ->join('t_order_shiping','t_order_shiping.idorder=t_invoice.idorder')
                ->where('t_invoice.idorder', $id);
        return $this->db->get('t_invoice');
    }
    
    function data_invoice_by_status($status){
        $this->db->select('*')
                ->join('t_order_shiping','t_order_shiping.idorder=t_invoice.idorder')
                ->where('invoiceStatus', $status);
        return $this->db->get('t_invoice');
    }

    function count_new_order_unpaid() {
        $this->db->select('COUNT(idorder) as neworderunpaid')
                ->where('invoiceStatus', 'closing unpaid');
        return $this->db->get('t_invoice');
    }
}
