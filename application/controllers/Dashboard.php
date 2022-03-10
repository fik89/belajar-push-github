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
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array());
        $this->load->database();
    }
    
    function index(){
    	redirect('d/Home');
    }
}