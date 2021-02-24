
<?php 
        $metode = $data['metode'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Information</title>
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/tailwind.css">
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/style.css">
<link  rel="shortcut icon" href="<?=BASEURL;?>/src/img/shortcut-logo.png">
</head>

<body>

    <div id="app" class="px-40 mt-12">
        
        <!-- Logo -->
        <div class="flex justify-between">
            <img src="<?= BASEURL?>/src/img/logo.png" width="100px" alt="" class="mb-6">
            <a href="<?= BASEURL;?>/login/proseslogout" class="text-xl p-2 h-12 mr-2  border-primary rounded-lg text-primary">
                        Log Out
            </a>
        </div>
        <!-- Penutup Logo -->
        <div class="grid md:grid-cols-5 grid-cols-1">
            <div class="ml-32 my-4 col-span-2">
                <h1 class="font-bold text-7xl">
                    Diet <?= $metode['nama_metode']?>
                </h1>
                <svg class="w-56 ml-12" width="289" height="283" viewBox="0 0 289 283" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M270.52 147.194C270.52 173.962 262.596 200.129 247.75 222.385C232.904 244.642 211.803 261.989 187.114 272.232C162.426 282.476 135.26 285.156 109.051 279.934C82.8419 274.712 58.7675 261.822 39.8719 242.894C20.9763 223.966 8.10823 199.851 2.89494 173.598C-2.31834 147.344 0.357309 120.132 10.5835 95.4018C20.8097 70.6716 38.1272 49.5343 60.3461 34.663C82.565 19.7916 108.687 11.854 135.41 11.854V147.194H270.52Z"
                        fill="#3DC231" />
                    <path
                        d="M152.895 0.504597C170.638 0.504597 188.207 4.00527 204.599 10.8068C220.992 17.6082 235.886 27.5773 248.432 40.1448C260.979 52.7123 270.931 67.6321 277.721 84.0523C284.511 100.473 288.005 118.072 288.005 135.845L152.895 135.845V0.504597Z"
                        fill="#289C1D" />
                </svg>
            </div>

            <div class="py-7 col-span-2">
                <div>
                    <p><?= $metode['deskripsi']?>
                    </p>
                </div>
                <h6 class="font-bold pt-4 pb-5">
                    Makanan Rekomendasi
                </h6>
                <div class="mb-5">
                    <div class="bg-gray-300 h-10 w-10 rounded-full mr-10">
                        <h6 class="font-bold text-xl pl-14"><?= $metode['rekomen1']?></h6>
                        <p class="pl-14 text-sm absolute"><?= $metode['deskripsi_rekomen1']?></p>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="bg-gray-300 h-10 w-10 rounded-full">
                        <h6 class="font-bold text-xl pl-14"><?= $metode['rekomen2']?></h6>
                        <p class="pl-14 text-sm absolute"><?= $metode['deskripsi_rekomen2']?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="bg-gray-300 h-10 w-10 rounded-full">
                        <h6 class="font-bold text-xl pl-14"><?= $metode['rekomen3']?></h6>
                        <p class="pl-14 text-sm absolute"><?= $metode['deskripsi_rekomen3']?></p>
                    </div>
                </div>

                <div class="mt-14 ml-72">
                    <a href="<?= BASEURL; ?>/user/"
                        class="bg-white-500 border-2 text-lg shadow-outline text-hijau hover:bg-gray-100 font-medium py-2 px-6 rounded-md">Kembali</a>

                    <a href=<?= BASEURL; ?>/user/simpanmemilih/<?=$metode['id_metode']?>"
                        class="bg-hijau text-lg hover:bg-green-600 text-white font-medium py-2 px-6 rounded-md">Coba</a>
                </div>
            </div>
        </div>

    </div>
    </div>

    </div>


</body>

</html>