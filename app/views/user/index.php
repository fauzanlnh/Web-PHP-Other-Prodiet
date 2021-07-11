<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="<?= BASEURL?>/src/css/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL?>/src/css/style.css">
    <link  rel="shortcut icon" href="<?=BASEURL;?>/src/img/shortcut-logo.png">
</head>

<body>

    <div id="app" class="px-40 mt-12">
        <div class="flex justify-between">
            <img src="<?= BASEURL?>/src/img/logo.png" width="100px" alt="" class="mb-6">
            <a href="<?= BASEURL;?>/login/proseslogout" class="text-xl p-2 h-12 mr-2  border-primary rounded-lg text-primary">
                        Log Out
            </a>
        </div>
        <div class="flex flex-row justify-around">
            <div id="content-1"><img src="<?= BASEURL?>/src/img/Group 2.jpg" alt="" class=""></div>
            
            <div id="content-2" class="text-6xl">Bingung Milih Metode <b>Diet </b>
                <div class="text-xl flex flex-row ">Apakah Kamu bingung untuk memilih metode diet? Prodiet dapat menentukan metode diet yang cocok dengan kamu lho
                    <br><br>
                </div>
                <div class="flex justify-end">
                    <div class="btn btn-primary bg-primary text-xl p-2 h-12 mr-2  border-primary rounded-lg text-white">
                        Metode Diet
                    </div>
                </div>
            </div>
        </div>
        <div class="text-xl flex ">
            <div class="text flex flex-row content-end mt-20 mb-6">
                <div class="">
                    <div class="text-4xl mt-20 font-semibold  ">
                        Metode Diet
                    </div>
                    <div class=""> Beberapa metode diet yang ada di list menu kami</div>
                </div>
                <img src="<?= BASEURL?>/src/img/hero.png" class="object-contain" alt="">
            </div>
            <img src="<?= BASEURL?>/src/img/standing 9.png" alt="">
        </div>
        
        <div class="flex flex-row flex-wrap justify-between">
            <?php foreach ($data['metode'] as $metode) :?>
            <!-- card -->
            <div class="card  w-px  flex flex-col shadow-xl rounded-lg mb-6 ">
                <div class="header p-4 flex">
                    <div class="w-20 h-3 bg-bulet rounded-xl mr-2"></div>
                    <div class="w-10 h-3 bg-bulet rounded-xl mr-2"></div>
                    <div class="w-6 h-3 bg-bulet rounded-xl"></div>
                </div>
                <div class="px-4 flex my-4">
                    <div class="bg-gray-600 h-24 w-32 rounded-xl mr-2">
                    </div>
                    <div class="text-3xl">
                        Metode <b><?= $metode['nama_metode'];?></b>
                    </div>
                </div>
                <div class="px-4 my-4">
                    <div class="text-xl font-semibold">
                        <b> Benefits</b>
                    </div>
                </div>
                <div class="px-4">
                    <?= $metode['deskripsi'];?>
                </div>
                <div class="flex px-4 mt-16 mb-4 justify-end">
                    <a href="detail.html">
                        <div class="bg-primary rounded text-white p-1  mr-2 btn btn-primary ">
                                    <a href="<?= BASEURL; ?>/user/detaildiet/<?=$metode['id_metode']?>" class="px-2">Detail</a>
                        </div>
                        <div class="bg-primary rounded text-white p-1 btn btn-primary">
                        <a href="<?= BASEURL; ?>/user/simpanmemilih/<?=$metode['id_metode']?>" class=" px-2">Coba</a>
                            </div>
                    </a>
                </div>
            </div>
                    <?php endforeach; ?>
        </div>
        <div class="footer py-10">

        </div>

</body>

</html>