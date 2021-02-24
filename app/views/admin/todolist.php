        <div class="container mx-auto mt-32 mb-20">
            <!-- Table -->
            <div class="flex flex-col mt-4 ml-14 mr-14 border-2 rounded-xl border-gray-500 border-opacity-20 shadow-md">
                <div class="h-24 border-b-2 border-gray-500 border-opacity-10">
                    <h1 class="font-semibold mt-8 ml-16 text-lg">To Do List Diet
                        <button onclick="document.getElementById('myModal').showModal()" type="button" class="mr-4 bg-hijau text-lg hover:bg-green-600 text-white font-medium py-2 px-5 rounded-md float-right" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                        </button>
                    </h1>
                </div>
                <?php    
                    Flasher::Message();
                ?>
                <!-- table isi-->
                <div class="flex-1">
                    <table class="table-fixed w-full">
                        <thead class="border-b-2 border-gray-500 border-opacity-10">
                            <tr class="h-12">
                                <th>Metode</th>
                                <th>Kegiatan</th>
                                <th>Hari Ke</th>                            
                                <th>API</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php foreach ($data['todolist'] as $todolist) :?>
                            <tr class="h-12 text-center border-b-2 border-gray-500 border-opacity-10">
                                <td><?= $todolist['nama_metode']?></td>
                                <td style="text-align:justify"><?= $todolist['nama_kegiatan']?></td>
                                <td><?= $todolist['hari_ke']?></td>
                                <td><?= $todolist['api']?></td>
                                <td>
                                    <button onclick="document.getElementById('myModal<?=$todolist['id_todolist'] ?>').showModal()" type="button" class="bg-yellow-500 text-lg hover:bg-yellow-700 text-white font-medium py-2 px-4
                                    rounded-md" data-toggle="modal">
                                        Ubah
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Ubah-->
 <dialog id="myModal<?=$todolist['id_todolist'] ?>" class="mx-auto bg-white rounded-md w-96 ">
     <div class="flex flex-col w-full h-auto  ">
          <!-- Header -->
          <div class="flex w-full h-auto  justify-between ">
            <div class="flex w-10/12 h-auto py-3 px-4 text-2xl font-bold ">
                  Ubah To Do List
            </div>
            <div class="mr-4 mt-4" onclick="document.getElementById('myModal').close();" class="mt-2 cursor-pointer ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <!--Header End-->
          </div>
            <!-- Modal Content-->
            <!-- component -->
<div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <form action="<?= BASEURL; ?>/admin/ubahtodolist" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        ID To Do List
      </label>
             <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text"  placeholder="Masukkan Nama Kegiatan" required="true" name="id_todolist" value="<?= $todolist['id_todolist']?>" style="background: #ccc; pointer-events:none;">
    </div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        Nama Metode
      </label>
                      <select name="id_metode" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3">
                <?php foreach ($data['metode'] as $metode) :
                                                            if ($metode['id_metode'] == $todolist['id_metode']){
                                                        ?>
                                                                <option value="<?= $metode['id_metode']?>" selected><?= $metode['nama_metode']?> </option>
                                                        <?php
                                                            }else{
                                                        ?>
                                                                <option value="<?= $metode['id_metode']?>"><?= $metode['nama_metode']?> </option>
                                                        <?php
                                                            }
                                                        ?>
                                                        <?php endforeach ?>
        </select>
    </div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Jenis Kegiatan
      </label>
      <select name="id_kegiatan" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3">
                 <?php foreach ($data['kegiatan'] as $kegiatan) :
                                                         if ($kegiatan['id_kegiatan'] == $todolist['id_kegiatan']){
                                                        ?>
                                                                <option value="<?= $kegiatan['id_kegiatan']?>" selected><?= $kegiatan['kegiatan']?> </option>
                                                        <?php
                                                            }else{
                                                        ?>
                                                                <option value="<?= $kegiatan['id_kegiatan']?>"><?= $kegiatan['kegiatan']?> </option>
                                                        <?php
                                                            }
                                                        ?>
                                                        
                                                        
                                                        <?php endforeach ?>
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Nama Kegiatan
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text"  placeholder="Masukkan Nama Kegiatan" required="true" name="nama_kegiatan" value="<?= $todolist['nama_kegiatan']?>">
      </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Hari Ke
        </label>
                        <select name="hari_ke" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3">
                    <?php 
                                                            for($i=1; $i<=7;$i++){
                                                                $nilai = strval($i);
                                                                if ($nilai === $todolist['hari_ke']){
                                                        ?>
                                                                    <option value="<?= $i ?>" selected> <?=$i?> </option>
                                                        <?php
                                                                }else{
                                                        ?>
                                                                    <option value="<?= $i ?>" ><?=$i?> </option>
                                                        <?php
                                                                }
                                                                
                                                            }
                                                        ?>
                </select>
      </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
           API
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text"  placeholder="Masukkan ID API" required="true" name="api" value="<?= $todolist['api']?>">
      </div>
      <div class="flex  justify-end">
        <button type="submit" class="bg-primary px-4 py-1 text-white rounded">
            Simpan
        </button>
      </div>
    </form>
</div>
         
                            <?php endforeach; ?>
                        </tbody>
                    </table>            

                    <!-- Jarak spasi table isi ke bawah -->
                    <div class="h-40"> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<!-- Modal Tambah-->
 <dialog id="myModal" class="mx-auto bg-white rounded-md w-96 ">
     <div class="flex flex-col w-full h-auto  ">
          <!-- Header -->
          <div class="flex w-full h-auto  justify-between ">
            <div class="flex w-10/12 h-auto py-3 px-4 text-2xl font-bold ">
                  Tambah To Do List
            </div>
            <div class="mr-4 mt-4" onclick="document.getElementById('myModal').close();" class="mt-2 cursor-pointer ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <!--Header End-->
          </div>
            <!-- Modal Content-->
            <!-- component -->
<div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <form action="<?= BASEURL; ?>/admin/simpantodolist" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        Nama Metode
      </label>
                      <select name="id_metode" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3">
                <?php foreach ($data['metode'] as $metode) :?>
                    <option value="<?= $metode['id_metode']?>"><?= $metode['nama_metode']?> </option>
                <?php endforeach ?>
                </select>
    </div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Jenis Kegiatan
      </label>
      <select name="id_kegiatan" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3">
                <?php foreach ($data['kegiatan'] as $kegiatan) :?>
                    <option value="<?= $kegiatan['id_kegiatan']?>"><?= $kegiatan['kegiatan']?> </option>
                <?php endforeach ?>
                </select>
    </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Nama Kegiatan
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text"  placeholder="Masukkan Nama Kegiatan" required="true" name="nama_kegiatan">
      </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Hari Ke
        </label>
                        <select name="hari_ke" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3">
                    <?php 
                        for($i=1; $i<=7;$i++){
                    ?>
                        <option value="<?= $i ?>"><?=$i?></option>
                    <?php
                        }
                    ?>
                </select>
      </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
           API
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text"  placeholder="Masukkan ID API" required="true" name="api">
      </div>
      <div class="flex  justify-end">
        <button type="submit" class="bg-primary px-4 py-1 text-white rounded">
            Simpan
        </button>
      </div>
    </form>
</div>
         





