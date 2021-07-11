 <?php
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/',$url);
    if(empty($url[1])){
        $url[1] = 'index';
    }
                //var_dump($url);
    //echo $url[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'];?></title>
    <link rel="stylesheet" href="<?=BASEURL;?>/src/css/style.css">
    <link rel="stylesheet" href="<?=BASEURL;?>/src/css/tailwind.css">
    <link  rel="shortcut icon" href="<?=BASEURL;?>/src/img/shortcut-logo.png">
    <style>
    dialog[open] {
    animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
  }
  
    dialog::backdrop {
      background: linear-gradient(45deg, rgba(190, 190, 190, 0.5), rgba(54, 54, 54, 0.5));
    }
    
   
  @keyframes appear {
    from {
      opacity: 0;
      transform: translateX(-4rem);
    }
  
    to {
      opacity: 1;
      transform: translateX(0);
    }
  } 
  </style>
</head>
<body>
    <nav class="flex justify-between items-center bg-white h-20 fixed w-full top-0 border-t border-b border-gray-400">
        <!-- logo -->
        <div class="w-24 mx-10 my-3 flex">
            <img src="<?=BASEURL;?>/src/img/logo.png" alt="logo">
        </div>
        <!-- tutup logo -->
        <ul class="flex mr-20 mt-15">
            <li>
                <?php
                    if($url[1] == 'metode'){
                ?>
                        <a href="#" class="px-4 py-2 text-hijau border-hijau border-b-4 mx-1">Metode</a>
                <?php
                    }else{
                ?>
                        <a href="<?= BASEURL;?>/admin/metode" class="px-4 py-2 hover:text-hijau mx-1">Metode</a>
                <?php
                    }
                ?>
                
            </li>
            <li>
                <?php
                    if($url[1] == 'todolist'){
                ?>
                        <a href="#" class="px-4 py-2 text-hijau border-hijau border-b-4 mx-1">To Do List</a>
                <?php
                    }else{
                ?>
                        <a href="<?= BASEURL;?>/admin/todolist" class="px-4 py-2  hover:text-hijau mx-1">To Do List</a>
                <?php
                    }
                ?>
            </li>
            <li>
                <a href="<?= BASEURL;?>/login/proseslogout"
                    class="border-hijau border-2 text-hijau hover:bg-hijau hover:text-white py-2 px-5 rounded-md px-4 py-2">Log
                    Out</a>
            </li>
        </ul>
    </nav>