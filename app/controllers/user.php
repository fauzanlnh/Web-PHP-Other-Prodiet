<?php

class user extends Controller {
    public function __construct(){
            if(empty(($_SESSION['email']))){
                Flasher::setMessage('haruslogin','gagal','danger');
                header('location: '. BASEURL . '/login/');
            }else if ($_SESSION['level'] == 'Admin'){
                Flasher::setMessage('haruslogin','gagal','danger');
                header('location: '. BASEURL . '/login/');
            }
    }
    //INDEX
    public function index(){
        $data['getstatus'] = $this->model('userambil_model')->getuserambil();
        //jika telah mengambli metode diet
        if($data['getstatus'] == true){
            $data['title'] = 'Data Mahasiswa';
            header('location: '. BASEURL . '/user/todolist');
        }else{
            $data['title'] = 'Data Mahasiswa';
            $data['metode'] = $this->model('metode_model')->getAllMetode();    
            $this->view('user/index', $data);
        }
    }
    
    //DETAIL DIET
    public function detaildiet($id){
        $data['title'] = 'Data Mahasiswa';   
        $data['metode'] = $this->model('metode_model')->getAllMetodeById($id);
        $this->view('user/detail_diet', $data);
    }
    
    
    public function simpanmemilih($id_metode){
        //mengambil berat badan
        $data['email'] = $_SESSION['email'];
        $data['username'] = $_SESSION['email'];
        $data['user_bb'] = $this->model('user_model')->getUsername($data);
        $data['id_metode'] = $id_metode;
        
        //insert data ke tabel user to dolist
        $data['userambil'] = $this->model('userambil_model')->tambahuserambil($data);    
        //insert data ke tabel user detail to do list
        //Mengambil data dari tabel todolsit
        $data['todolist'] = $this->model('todolist_model')->getAllTodolistByIdMetode($id_metode);
        //mengambil PK userambil untuk dijadikan FK di userdettambil
        $data['getidambil'] = $this->model('userambil_model')->getuserambil();
        //insert data ke tabel user detail to do list
        $data['userdetambil'] = $this->model('userdetambil_model')->tambahuserdetambil($data);
        header('location: '. BASEURL . '/user/todolist');
        
    }
    
    //TODOLIST
    public function todolist(){
        
        $data['title'] = 'Data Mahasiswa';
        //mengambil beda hari
        $data['userambil'] = $this->model('userambil_model')->getdatediff();
        $data['bedahari'] = $data["userambil"][0]['beda'] + 1;
        if($data['bedahari'] > 7){
            $data['bedahari'] = 7;
        }
        //mengambil id_ambil dari tabel userambi
        $data['getidambil'] = $this->model('userambil_model')->getuserambil();
        
        //mengambil data dari tabel userdetambil
        $data['usertodolist'] = $this->model('userdetambil_model')->getmetodebyhari($data);
        $this->view('user/kegiatan', $data);
    }
    
    
    public function lakukantodolist($id_detambil){
        if( $this->model('userdetambil_model')->updateusertodolist($id_detambil) > 0 ) {
			//Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. BASEURL . '/user/todolist');
			exit;			
		}else{
			//Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. BASEURL . '/user/todolist');
			exit;	
		}
    }
    
    public function todolistberatbadan(){
        if($this->model('userdetambil_model')->updateberatbadan($_POST) >= 0 ) {
			//Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. BASEURL . '/user/todolist');
			exit;
		}else{
			//Flasher::setMessage('Gagal','diupdate','danger');
			//header('location: '. BASEURL . '/user/todolist');
			//exit;	
            echo $this->model('userdetambil_model')->updateberatbadan($_POST);
		}
    }
    
    // TODOLIST -> BATAL
    public function batal($id_ambil){
        if( ($this->model('userdetambil_model')->bataldiet($id_ambil) > 0) && ($this->model('userambil_model')->bataldiet($id_ambil) > 0) ) {
			//Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. BASEURL . '/user/');
			exit;			
		}else{
			//Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. BASEURL . '/user/');
			exit;	
		}
    }
    
    // HASIL DIET
    public function hasil(){
        $data['title'] = 'Data Mahasiswa';
        $data['user_ambil'] = $this->model('userambil_model')->gethasilstatus();
        $data['getidambil'] = $this->model('userambil_model')->getuserambil();
        $data['getberatbadan'] = $this->model('userdetambil_model')->getberatbadan($data);
        $data['getprogress'] = $this->model('userdetambil_model')->getProgress($data);
        $data['getIdApi'] = $this->model('userdetambil_model')->getDilakukan($data);
        $this->view('user/hasil', $data);
        $data['getstatus'] = $this->model('userambil_model')->getuserambil();
    }
    
    public function submit($id_ambil){
        if( ($this->model('userambil_model')->submithasildiet($id_ambil) > 0) ) {
			//Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. BASEURL . '/user/');
			exit;			
		}else{
			//Flasher::setMessage('Gagal','diupdate','danger');
			//header('location: '. BASEURL . '/user/');
			//exit;	
		}
    }
	
}