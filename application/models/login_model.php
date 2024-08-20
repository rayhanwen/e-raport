<?php
class Login_model extends CI_Model{

    public function cek_login($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('user')->row_array();
    }
                 
    public function get_login_data($user, $pass)
    {
        $u = $user; 
        $p = md5($pass); // Menggunakan md5 untuk mengenkripsi password

        $query_ceklogin = $this->db->get_where('pengguna', array('username' => $u, 'password' => $p));
        if($query_ceklogin->num_rows() > 0){
            foreach ($query_ceklogin->result() as $ck){
                $sess_data['logged_in'] = TRUE;
                $sess_data['idu']      = $ck->id;
                $sess_data['password'] = $ck->password; 
                $sess_data['username'] = $ck->username;
                $sess_data['password'] = $ck->password;
                $sess_data['hak_akses'] = $ck->hak_akses;
                $this->session->set_userdata($sess_data);
            }
            redirect('administrator/dashboard');
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau password salah
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('administrator/auth');
        }
    }
}
?>
