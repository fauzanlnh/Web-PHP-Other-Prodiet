<?php
//Tampil form login
class login extends Controller{

    public function index(){
        $data['title'] = 'Data Mahasiswa';		
		$this->view('login/login', $data);
    }
    
    //Login ke index
    public function ceklogin(){
        //Validasi jika form kosong
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data['user'] = $this->model('user_model')->getUserById($email, $password);
            //Username atau password salah
            if($data['user']== false){
                Flasher::setMessage('Salah','gagal','danger');
                header('location: '. BASEURL . '/login/');
            }else{
                //Username dan password benar    
                session_start();
                $_SESSION['email'] = $data['user']['email'];
                $_SESSION['username'] = $data['user']['username'];
                $_SESSION['level'] = $data['user']['level'];
                if($data['user']['level'] == "Anggota"){
                    header('location: '. BASEURL . '/user');
                }else if($data['user']['level'] == "Admin"){
                    header('location: '. BASEURL . '/admin');
                }    
            }    
        }else{
            //$this->view('user/coba2', $data);            
            //masih kosong
            echo "tes";
        }
    }
    public function proseslogout(){
        // remove all session variables
        session_unset();

        // destroy the session
        header('location: '. BASEURL . '/login');
        session_destroy();
    }
}
?>