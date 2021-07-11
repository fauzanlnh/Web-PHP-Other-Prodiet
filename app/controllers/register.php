<?php
//Tampil form register    
class register extends Controller{

    public function index(){
        $data['title'] = 'Data Mahasiswa';		
        $this->view('register/register', $data);
    }
        
    //menyimpan
    public function simpanuser(){
        //tambah jika form kosong
        if(isset($_POST['nama'])){
            //jika username atau email
            $data = $this->model('user_model')->getUsername($_POST);
            var_dump($data);
            if($data == false){
                if( $this->model('user_model')->tambahuser($_POST) > 0 ) {
                    Flasher::setMessage('Berhasil','Mendaftar','success');
                    header('location: '. BASEURL . '/login');
                    exit;			
                }
            }else{
                Flasher::setMessage('Username atau Email Sama','Daftar Kembali','danger');
                header('location: '. BASEURL . '/register');
                exit;	
            }
        }
        
    }
		
}
?>