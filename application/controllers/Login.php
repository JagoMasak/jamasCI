<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_user');
        if ($this->session->userdata('username')) {
            redirect('admin/admin');
        }
    }

    public function index() {
        $data = array('error' => '');
        $this->load->view('login', $data);
    }

    public function login_process(){
        $username 		= $this->input->post('username');
        $password 	    = md5($this->input->post('password'));
        $result         = $this->Model_user->check_user($username, $password); 

        if($result->num_rows() > 0){
            foreach ($result->result() as $row) {
                $id_user 			= $row->id_user;
                $username 			= $row->username;
                $nama_lengkap		= $row->nama_lengkap;
                $level_user			= $row->level_user;
            }

            $newdata = array(
                'id_user'  		=> $id_user,
                'username' 		=> $username,
                'nama_lengkap'	=> $nama_lengkap,
                'level_user'	=> $level_user,
                'logged_in' 	=> TRUE
            );

            $this->session->set_userdata($newdata);
            if($this->session->userdata('level_user') == '1'){
                redirect('admin/admin');
            }
        } else {
            ?> <script type="text/javascript">alert("Maaf email atau password anda salah."); window.location.href="<?php echo base_url(); ?>login"</script> <?php
        }
    }
}