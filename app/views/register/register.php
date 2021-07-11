<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASEURL?>/src/css/tailwind.min.css">
    <link rel="stylesheet" href="<?=BASEURL?>/src/css/style.css">
    <link  rel="shortcut icon" href="<?=BASEURL;?>/src/img/shortcut-logo.png">
    <title>Register</title>
</head>

<body>
    <div id="main" class="flex xl:flex-row  h-full">

        <div class="px-10 py-5 w-3/4">
            <?php
                Flasher::pesanregister();
            ?>
            <div class="login text-6xl ">
                Register
            </div>
            <form action="<?= BASEURL; ?>/register/simpanuser" method="POST" enctype="multipart/form-data" class="px-10">
                <div class=" text-xl">
                    Nama
                </div>
                <input type="text" name="nama" class="form_regis" placeholder="Masukkan nama" required>
                <br>
                <div class="text-xl mt-1">
                    Email
                </div>
                <input type="text" name="email" class="form_regis" placeholder="Masukkan email" required>
                <br>
                <div class=" text-xl mt-1">
                    Username
                </div>
                <input type="text" name="username" class="form_regis" placeholder="Masukkan username" required>
                <br>
                <div class="text-xl mt-1">
                    Password
                </div>
                <input type="password" name="password" class="form_regis" placeholder="Masukkan password" required>
                <br>

                <div class=" text-xl mt-1">
                    Berat Badan (KG)
                </div>
                <input type="name" name="berat_badan" class="form_regis" placeholder="Masukkan berat badan" required>

                <div class="flex justify-end">
                    <input type="submit" class="btn-1 text-white text-2xl px-4  rounded-lg text-white bg-primary" value="Daftar">   
                    <a href="<?= BASEURL; ?>/login/">
                        <div class="btn-2 text-white text-2xl px-4  rounded-lg text-white bg-primary ml-4">Kembali</div>
                    </a>
                </div>
            </form>


        </div>
        <div class=" w-1/4 lg:rounded-tl-xl lg:rounded-bl-xl bg-primary p-20 text-white text-4xl font-bold">
            Tips Info
            <div class="font-medium text-lg text-white">Asupi Kebutuhan Makanan Dengan Makanan - Makanan Bergizi</div>
        </div>
    </div>

</body>
<script>

</script>

</html>