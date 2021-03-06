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
class Rating extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_rating', 'M_order'));
        $this->load->database();
    }

    function rating_product_id() {
        if (empty($_SESSION['iduser'])) {
            $return['status'] = 0;
            $return['message'] = "Sessi Login telah berakhir, Silahkan Login kembali";
            header('Content-type: text/javascript');
            echo json_encode($return);
        } else {
            $id = $this->input->post('id');
            $user = $_SESSION['iduser'];
            $data_rating = $this->M_rating->rating_product_id($id, $user)->row();
            if (empty($datarating->idrating)) {
                $return['status'] = 1;
                $return['message'] = "Success";
                $return['data'] = 0;
                header('Content-type: text/javascript');
                echo json_encode($return);
            } else {
                $return['status'] = 1;
                $return['message'] = "Success";
                $return['data'] = $data_rating;
                header('Content-type: text/javascript');
                echo json_encode($return);
            }
        }
    }

    function submit_rating() {
        if (empty($_SESSION['iduser'])) {
            $return['status'] = 0;
            $return['message'] = "Sessi Login telah berakhir, Silahkan Login kembali";
            header('Content-type: text/javascript');
            echo json_encode($return);
        } else {
            $comment = $this->input->post('comment');
            $rating = $this->input->post('rating');
            $idproduct = $this->input->post('idproduct');
            $idorder = $this->input->post('idorderval');

            $data_rating = array(
                'idorder' => $idorder,
                'idproduct' => $idproduct,
                'comment' => $comment,
                'ratingProduct' => $rating,
                'volunteerProduct' => $_SESSION['iduser']
            );
            $save = $this->M_rating->submit_rating($data_rating);


            $data_detail = array('submitRating' => 'OK');
            $update_data = $this->M_order->update_data_order_detail_by_id($idorder,$idproduct, $data_detail);
            header('Content-type: text/javascript');
            echo json_encode($save);
        }
    }

}
