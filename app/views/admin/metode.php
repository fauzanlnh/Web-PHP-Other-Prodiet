<div class="container mx-auto mt-32 mb-20">
            <!-- Table -->
            <div class="flex flex-col mt-4 ml-14 mr-14 border-2 rounded-xl border-gray-500 border-opacity-20 shadow-md">
                <div class="h-24 border-b-2 border-gray-500 border-opacity-10">
                    <h1 class="font-semibold mt-8 ml-16 text-lg">Metode Diet
                        <button type="button"  onclick="document.getElementById('myModal').showModal()" class="mr-4 bg-hijau text-lg hover:bg-green-600 text-white font-medium py-2 px-5 rounded-md float-right" data-toggle="modal">
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
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php foreach ($data['metode'] as $metode) :?>
                            <tr class="h-12 text-center border-b-2 border-gray-500 border-opacity-10">
                                <td><?= $metode['nama_metode']?></td>
                                <td  style="text-align:justify"><?= $metode['deskripsi']?></td>
                                <td>
                                <button type="button"  onclick="document.getElementById('myModal<?=$metode['id_metode'] ?>').showModal()" class="bg-yellow-500 text-lg hover:bg-yellow-700 text-white font-medium py-2 px-4
                                    rounded-md" data-toggle="modal">
                                    Ubah
                                </button>
                                </td>
                            </tr>
                            <!--modal ubah-->
 <dialog id="myModal<?=$metode['id_metode'] ?>" class="mx-auto bg-white rounded-md w-96 ">
     <div class="flex flex-col w-full h-auto  ">
          <!-- Header -->
          <div class="flex w-full h-auto  justify-between ">
            <div class="flex w-10/12 h-auto py-3 px-4 text-2xl font-bold">
                  Ubah Metode
            </div>
            <div class="mr-4 mt-4" onclick="document.getElementById('myModal<?=$metode['id_metode'] ?>').close();" class="mt-2 cursor-pointer ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <!--Header End-->
          </div>
            <!-- Modal Content-->
            <!-- component -->
<div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form action="<?= BASEURL; ?>/admin/ubahmetode" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        ID Metode
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" style="background: #ccc; pointer-events:none;" id="username" type="text" placeholder="Masukan Nama metode" name="id_metode" required value="<?= $metode['id_metode']?>">
    </div>
        <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        Nama Metode
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="Masukan Nama metode" name="nama_metode" required value="<?= $metode['nama_metode']?>">
    </div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Deskripsi
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi" name="deskripsi" required value="<?= $metode['deskripsi']?>">
    </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Rekomendasi Bahan 1
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Rekomendasi 1" name="rec_1" required value="<?= $metode['rekomen1']?>">
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Deskripsi Rekomendasi 1
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi Keuntungan" name="desc_1" required value="<?= $metode['deskripsi_rekomen1']?>">
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Rekomendasi Bahan 2
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Rekomendasi 1" name="rec_2" required value="<?= $metode['rekomen2']?>">
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Deskripsi Rekomendasi 2
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi Keuntungan" name="desc_2" required value="<?= $metode['deskripsi_rekomen2']?>">
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Rekomendasi Bahan 3
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Rekomendasi 1" name="rec_3" required value="<?= $metode['rekomen3']?>">
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Deskripsi Rekomendasi 3
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi Keuntungan" name="desc_3" required value="<?= $metode['deskripsi_rekomen3']?>">
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
                </div>
                <!-- Jarak spasi table isi ke bawah -->
                <div class="h-40"> 
                </div>
            </div>
        </div>
    </body>
</html>
<!--modal tambah-->
 <dialog id="myModal" class="mx-auto bg-white rounded-md w-96 ">
     <div class="flex flex-col w-full h-auto  ">
          <!-- Header -->
          <div class="flex w-full h-auto  justify-between ">
            <div class="flex w-10/12 h-auto py-3 px-4 text-2xl font-bold">
                  Tambah Metode
            </div>
            <div class="mr-4 mt-4" onclick="document.getElementById('myModal').close();" class="mt-2 cursor-pointer ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <!--Header End-->
          </div>
            <!-- Modal Content-->
            <!-- component -->
<div class="rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form action="<?= BASEURL; ?>/admin/simpanmetode" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        Nama Metode
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="Masukan Nama metode" name="nama_metode" required>
    </div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Deskripsi
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi" name="deskripsi" required>
    </div>
    
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Rekomendasi Bahan 1
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Rekomendasi 1" name="rec_1" required>
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Deskripsi Rekomendasi 1
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi Keuntungan" name="desc_1" required>
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Rekomendasi Bahan 2
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Rekomendasi 1" name="rec_2" required>
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Deskripsi Rekomendasi 2
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi Keuntungan" name="desc_2" required>
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Rekomendasi Bahan 3
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Rekomendasi 1" name="rec_3" required>
      </div>
        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Deskripsi Rekomendasi 3
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="text" placeholder="Masukan Deskripsi Keuntungan" name="desc_3" required>
      </div>
      <div class="flex  justify-end">
        <button type="submit" class="bg-primary px-4 py-1 text-white rounded">
            Simpan
        </button>
      </div>
    </form>

</div>