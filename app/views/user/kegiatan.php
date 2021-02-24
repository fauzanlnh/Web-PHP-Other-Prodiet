<?php
    if($data['userambil'][0]['beda'] == null){
        header('location: '. BASEURL . '/user/');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/tailwind.css">
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
<?php
    /*<a href="<?= BASEURL;?>/login/proseslogout"*/
?>

    <div class="p-14">
        <div class="flex justify-between">
            <img src="<?= BASEURL?>/src/img/logo.png" width="100px" alt="" class="mb-6">
            <a href="<?= BASEURL;?>/login/proseslogout" class="text-xl p-2 h-12 mr-2  border-primary rounded-lg text-primary">
                        Log Out
            </a>
        </div>
<!--anu eta tombol na di kegiatan nu mana-->
        <div class="flex flex-row mt-6 ">
            <div class="h-full flex flex-col w-1/2">
                <?php
                    foreach ($data['usertodolist'] as $todolist) :
                        if($todolist['status'] == "DILAKUKAN"){
                ?>                        
                <a onclick="document.getElementById('modalMakanan<?= $todolist['id_detambil'] ?>').showModal()" class="cursor-pointer">
                <?php
                    }else{
                        if($todolist['nama_kegiatan'] == 'Berat Badan'){
                            $id_detambil = $todolist['id_detambil'];
                            $id_ambil = $todolist['id_ambil'];
                            $bb = $todolist['status'];
                ?>
                <button onclick="document.getElementById('myModal').showModal()">
                <?php
                        }else{
                ?>
                    <a onclick="document.getElementById('modalMakanan<?= $todolist['id_detambil'] ?>').showModal()" class="cursor-pointer">
                <?php
                        }
                    }
                ?>
                    <div class="rounded-lg mb-3 shadow-md border border-gray-100 flex justify-between">
                        <img src="<?=BASEURL;?>/src/img/4ab836fad95a717bc5d356d8961fdbbc-removebg-preview 2.png" alt="" class="object-contain">
                            <div class=" w-96 flex flex-row justify-start">
                            <div class="text-2xl p-8 font-bold ">
                                <?=$todolist['kegiatan'] ?>
                                <div class="text-sm text-gray-500 justify-start">
                                    <?php 
                                        if($todolist['nama_kegiatan'] == 'Berat Badan'){
                                            echo $todolist['nama_kegiatan']. " Sekarang";
                                        }else{
                                            echo $todolist['nama_kegiatan'];
                                        }
                                ?>
                                </div>

                        </div>
                                </div>
                        <?php
                            if($todolist['status'] != "BELUM DILAKUKAN"){
                        ?>
                                <div class="w-20 h-20 bg-primary rounded-full mt-3 mr-3 justify-start">

                                </div>
                        <?php
                            }else{
                        ?>
                            <div class="w-20 h-20 rounded-full mt-3 mr-3 justify-start">

                                </div>
                        <?php
                            }        
                        ?>
                    </div>
                    </button>
                </a>
                    
                    
                <?php
                    
                    endforeach;
                    
                ?>
            </div>
<!--                    sigana kudu di tambahan kata jadi berat badan sekarang meh pas.nggs fix eweh bug nu lain deui??-->
            <div class="flex flex-col ml-16 w-1/2">
                <div class="flex flex-row">
                    <div class="border-8 border-hijau h-44 w-44 rounded-full bulathari p-9">
                        <p class="text-center text-7xl font-bold items-center"><?= $data['bedahari']?></p>
                    </div>
                    <div class="p-10 text-lg font-bold">
                        
                    </div>
                </div>
                <?php
                    if($bb == 'BELUM DILAKUKAN'){
                        $bb = $data['getidambil'][0]['sebelum_diet'];
                    }
                ?>
                <div class="p-5 text-2xl">Berat Sekarang :</div>
                <div class="bg-hijau w-max px-7 py-1 ml-5 text-xl font-bold rounded-lg text-white"><?= $bb?> KG</div>
                <?php
                    $todolist = $data['usertodolist'];
                    if($data['bedahari'] >= 7){
                        if($todolist[3]['status'] != "BELUM DILAKUKAN"){
                            echo "<a href='". BASEURL ."/user/hasil/".$todolist[0]['id_ambil']."' class='px-9 py-1 bg-blue-400 m-5 text-xl font-bold rounded-lg text-center text-white w-min'>Hasil</a>";    
                        }else{
                            echo "<button onclick='pemberitahaun()' class='px-9 py-1 bg-blue-400 m-5 text-xl font-bold rounded-lg text-center text-white w-min'>Hasil</button onc>";    
                        }
                    }else{
                        echo "<a href='". BASEURL ."/user/batal/".$todolist[0]['id_ambil']."'
                    class='px-9 py-1 bg-red-400 m-5 text-xl font-bold rounded-lg text-center text-white w-min'>Batal</a>";
                    }
                ?>
                
            </div>
        </div>
    </div>

</body>

</html>

    <!--modal resep-->
 <dialog id="myModal" class="mx-auto bg-white rounded-md w-96 ">
     <div class="flex flex-col w-full h-auto  ">
          <!-- Header -->
          <div class="flex w-full h-auto  justify-between ">
            <div class="flex w-10/12 h-auto py-3 px-4 text-2xl font-bold">
                  Pengkuran Berat Badan
            </div>
            <div class="mr-4 mt-4" onclick="document.getElementById('myModal').close();" class="mt-2 cursor-pointer ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <!--Header End-->
          </div>
            <!-- Modal Content-->
            <!-- component -->
<div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form action="<?= BASEURL; ?>/user/todolistberatbadan" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        ID Kegiatan
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="id_detambil" type="text" placeholder="Masukan ID Kegiatan" name="id_detambil" required  value="<?=$id_detambil ?>">
    </div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        ID Ambil
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="id_ambil" placeholder="Masukan ID Ambil" name="id_ambil" required value="<?=$id_ambil ?>">
    </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Berat Badan
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Berat Badan Terbaru" name="berat_badan" required>
      </div>
      <div class="flex  justify-end">
        <button type="submit" class="bg-primary px-4 py-1 text-white rounded">
            Simpan
        </button>
      </div>
    </form>

</div>
     </div>
    </dialog>
    
    <?php
        function getSteps($id,$apiKey){
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/$id/analyzedInstructions?apiKey=$apiKey");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch);      
            return $output;
        }
         foreach ($data['usertodolist'] as $todolist) :
             $ID_API = $todolist['api'];
             $tes = getSteps("$ID_API", "31583d3e3f2f4a77869873961178f927");
             $tes = json_decode($tes, true);
    ?>
<!--modal makanan-->
<dialog id="modalMakanan<?= $todolist['id_detambil']?>" class="mx-auto bg-white rounded-md w-1/2">
    <div class="flex flex-col w-full h-auto  ">
        <!-- Header -->
        <div class="flex w-full h-auto  justify-between ">
            <div class="flex w-10/12 h-auto py-3 px-4 text-1xl font-bold">
                Resep <?= $todolist['nama_kegiatan'];?>
            </div>
            <div class="mr-4 mt-4" onclick="document.getElementById('myModal').close();" class="mt-2 cursor-pointer ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <!--Header End-->
        </div>
        <!-- Modal Content-->
        <!-- component -->
        <div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <?php
                echo "<p class='font-bold'>Bahan - Bahan</p> <br>";
                $i = 1;
                foreach ($tes[0]['steps'] as $steps) :
                    foreach ($steps['ingredients'] as $bahan) :
                        echo $i . ". ".$bahan['name'] . "<br>";
                        $i += 1;
                    endforeach;
                endforeach;
                echo "<br><p class='font-bold'>Alat-Alat </p><br>";
                $i = 1;
                    foreach ($tes[0]['steps'] as $steps) :        
                        foreach ($steps['equipment'] as $equipment) :
                            echo $i . ". ".$equipment['name'] . "<br>";
                            $i += 1;
                        endforeach;
                    endforeach;
                echo "<br><p class='font-bold'>Langkah-Langkah</p> <br>";
                    $i = 1;
                    echo "<table>";
                    foreach ($tes[0]['steps'] as $steps) :    
                        echo "<tr>";
                            echo"<td style='vertical-align:top'>";
                                echo $i . ". ";
                            echo"</td>";
                            echo"<td>";
                                echo $steps['step'];
                            echo"</td>";
                        echo "</tr>";
                        $i += 1;
                    endforeach;
                    echo "</table>";
            ?>
            <br>
            <?php
                if($todolist['status'] == "DILAKUKAN"){
            ?>
            <a href="#" class="py-3 px-10 bg-gray-800 text-white rounded text shadow-xl text-center" id="btn">
               Sudah Dilakukan
            </a>
            <?php
                }else{
            ?>
            <a href="<?= BASEURL; ?>/user/lakukantodolist/<?=$todolist['id_detambil']?>" class="py-3 px-10 bg-gray-800 text-white rounded text shadow-xl text-center" id="btn">
                Lakukan
            </a>
            <?php
                }
            ?>
            
        </div>
    </div>
</dialog>
    <?php
        endforeach;
    ?>
    <script>
        function pemberitahaun() {
            alert("Isi Bagian Pengukuran");
        }
    </script>
    