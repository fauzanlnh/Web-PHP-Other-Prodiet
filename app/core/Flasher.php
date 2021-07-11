<?php

class Flasher{
    public static function setMessage($pesan, $aksi, $type)
    {
        $_SESSION['msg'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'type'  => $type
        ];   
    }

    public static function Message(){
        if( isset($_SESSION['msg']) )
        {
            echo '<div class="mt-6 mb-2  mr-4 alert alert-'. $_SESSION['msg']['type'] .' alert-dismissible fade show" role="alert" style="text-align:right">
                    Data <strong>'. $_SESSION['msg']['pesan'] .'</strong> '. $_SESSION['msg']['aksi'] .'
                    </button>
                  </div>';

            unset($_SESSION['msg']);
        }
    }
    public static function pesanlogin(){
        if( isset($_SESSION['msg']) ){
            if($_SESSION['msg']['pesan'] == 'haruslogin'){
                echo '<div class="alert alert-dismissible fade show" role="alert">
                    <strong class="text-white">Harus Login Terlebih Dahulu</strong>
                  </div>';
            }else if($_SESSION['msg']['pesan'] == 'Salah'){
                    echo '<div class="alert alert-dismissible fade show" role="alert">
                    <strong class="text-white">Password atau Username Salah  </strong>
                  </div>';
            }else if($_SESSION['msg']['pesan'] == 'Berhasil'){
            echo '<div class="alert alert-dismissible fade show" role="alert">
                    <strong class="text-white">Berhasil Mendaftar  </strong>
                    </div>';
            }
            unset($_SESSION['msg']);
        }
    }
    public static function pesanregister(){
        if( isset($_SESSION['msg']) )
        {
            echo '<div class="alert alert-'. $_SESSION['msg']['type'] .' alert-dismissible fade show" role="alert">
                    <strong>'. $_SESSION['msg']['pesan'] .'</strong> '. $_SESSION['msg']['aksi'] .'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';

            unset($_SESSION['msg']);
        }
    }
}