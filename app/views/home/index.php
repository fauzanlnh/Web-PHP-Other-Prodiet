<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/tailwind.min.css">
    <link  rel="shortcut icon" href="<?=BASEURL;?>/src/img/shortcut-logo.png">
    <title>Index</title>
</head>

<body>
    <div id="main" class="flex xl:flex-row sm:flex-col h-full">
        <div class="p-24 w-3/4">
            <img class="logo" src="/src/img/logo.png" alt="">
            <div id="content1" class="p-36"><img src="<?= BASEURL;?>/src/img/Screenshot_20201211_153447-removebg-preview (1).png" alt="">
                
            </div>
            <div class="text-6xl">
                solusi untuk diet <b>kamu</b>
            </div>
            <a href="login.html">
                <div class="btn text-white text-4xl px-4 py-1 w-32 rounded-lg absolute right-80">
                    <a href="<?= BASEURL; ?>/login/">
                    Lanjut
                    </a>
                </div>
            </a>
        </div>
        <div class=" w-1/4 lg:rounded-tl-xl lg:rounded-bl-xl bg-primary p-20 font-bold text-white">
            <div class="text-4xl text-white">Tips Diet</div>
            Jangan hanya makan tetapi pola minum juga di perhatikan
        </div>
    </div>
</body>
</html>
<script src="<?=BASEURL?>/src/js/TweenMax.min.js"></script>
<script>
    TweenMax.from(".logo", 1, {
        opacity: 0,
        y: 30,
        ease: Expo.easeInOut
    })
    </script>
