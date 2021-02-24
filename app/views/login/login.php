<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL;?>/src/css/tailwind.min.css">
    <link rel="stylesheet" href="/style.css">
    <link  rel="shortcut icon" href="<?=BASEURL;?>/src/img/shortcut-logo.png">
    <title>Login</title>
</head>

<body>
    <div id="main" class="flex xl:flex-row sm:flex-col h-full bg-primary">
        
        <div class="p-24 w-3/4">
            <div class="text-6xl text-white">
                Login
            </div>
            <?php    
                Flasher::pesanlogin();
            ?>
            <form action="<?= BASEURL;?>/login/ceklogin" method="post">
                <div class="text-white text-xl">
                    e-mail
                </div>
                <input type="text" name="email" class="form_login" placeholder="Username atau email .." required>
                <br>
                <div class="text-white text-xl">
                    password
                </div>
                <input type="password" name="password" class="form_login" placeholder="Password .." required>
                <br>
                
                    <div class="btn-2 text-white text-2xl px-2 bg-white  rounded-lg text-primary w-24">
                        <input type="submit" style="background-color: #fff;" class="text-primary">
                </div>
            </form>
            <div class="text-xl text-white mt-10">
                Dont have account? <a href="<?= BASEURL;?>/register/">Sign up</a>
            </div>
        </div>
        <div class=" w-1/4 lg:rounded-tl-xl lg:rounded-bl-xl bg-white p-20">
                            <div class="text-4xl">Tips Diet</div>
                Atur juga pola tidur senormal mungkin jangan kebanyakan tidur di saat anda melakukan diet
        </div>
    </div>
</body>
<script src="<?=BASEURL?>/src/js/TweenMax.min.js"></script>
<script>
    TweenMax.from(".logo", 1, {
        opacity: 0,
        y: 30,
        ease: Expo.easeInOut
    })
    </script>


</html>