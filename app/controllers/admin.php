<?php
    class admin extends Controller{
        public function __construct(){
            if(empty(($_SESSION['email']))){
                Flasher::setMessage('haruslogin','gagal','danger');
                header('location: '. BASEURL . '/login/');
            }else if ($_SESSION['level'] == 'Anggota'){
                Flasher::setMessage('haruslogin','gagal','danger');
                header('location: '. BASEURL . '/login/');
            }
        }
        //INDEX
        public function index(){
            $data['title'] =    'Admin | Index';
            $this->view('admin/header', $data);
            $this->view('admin/index', $data);
        }
        
        //TODOLIST
        public function todolist(){
            $data['title'] = 'Admin | To Do List';
            $data['todolist'] = $this->model('todolist_model')->getAllTodolist();
            $data['metode'] = $this->model('metode_model')->getAllMetode();
            $data['kegiatan'] = $this->model('kegiatan_model')->getAllKegiatan();
            $this->view('admin/header', $data);
            $this->view('admin/todolist', $data);
        }
        
        public function simpantodolist(){
            if( $this->model('todolist_model')->tambahTodolist($_POST) > 0 ) {
                Flasher::setMessage('Berhasil','ditambahkan','success');
                header('location: '. BASEURL . '/admin/todolist');
                exit;			
            }else{
                Flasher::setMessage('Gagal','ditambahkan','danger');
                header('location: '. BASEURL . '/admin/todolist');
                exit;	
            }
        }
        
        public function ubahtodolist(){
            if( $this->model('todolist_model')->updateDataTodolist($_POST) > 0 ) {
                Flasher::setMessage('Berhasil','Diubah','success');
                header('location: '. BASEURL . '/admin/todolist');
                exit;			
            }else{
                //Flasher::setMessage('Gagal','ditambahkan','danger');
                //header('location: '. BASEURL . '/admin/todolist');
                //exit;	
                var_dump($_POST);
            }
        }
        
        public function hapustodolist($id){
		  if( $this->model('todolist_model')->deleteTodolist($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. BASEURL . '/admin/todolist');
			exit;			
		  }else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. BASEURL . '/admin/todolist');
			exit;	
		  }		
	   }
        
        //METODE
        function metode () {
            $data['title'] = 'Admin | Metode';
            $data['metode'] = $this->model('metode_model')->getAllMetode();
            $this->view('admin/header', $data);
            $this->view('admin/metode', $data);
            $this->view('admin/footer', $data);
        }

        function simpanmetode () {
            if( $this->model('metode_model')->tambahMetode($_POST) > 0 ) {
                Flasher::setMessage('Berhasil','ditambahkan','success');
                header('location: '. BASEURL . '/admin/metode');
                exit;
            }else{
                //Flasher::setMessage('Gagal','ditambahkan','danger');
                header('location: '. BASEURL . '/admin/metode');
                exit;
            }
	   }
        
        public function ubahmetode(){
            if( $this->model('metode_model')->updateDatametode($_POST) > 0 ) {
                Flasher::setMessage('Berhasil','diubah','success');
                header('location: '. BASEURL . '/admin/metode');
                exit;			
            }else{
                Flasher::setMessage('Gagal','diubah','danger');
                header('location: '. BASEURL . '/admin/metode');
                exit;	
            }
        }
        
        public function hapusmetode($id){
            if( $this->model('metode_model')->deleteMetode($id) > 0 ) {
                Flasher::setMessage('Berhasil','dihapus','success');
                header('location: '. BASEURL . '/admin/metode');
                exit;
            }else{
                Flasher::setMessage('Gagal','dihapus','danger');
                header('location: '. BASEURL . '/admin/metode');
                exit;
            }
	   }

    }//Penutup Class
?>