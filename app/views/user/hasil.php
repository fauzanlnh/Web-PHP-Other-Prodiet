<?php
        if ($data['user_ambil'][0]['status'] == "SELESAI"){
            header('location: '. BASEURL . '/user/');
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Result</title>
    <link rel="stylesheet" href="<?=BASEURL?>/src/css/Chart.css">
    <link rel="stylesheet" href="<?=BASEURL?>/src/css/tailwind.css">
    <link rel="stylesheet" href="<?=BASEURL?>/src/css/style.css">
    <link  rel="shortcut icon" href="<?=BASEURL;?>/src/img/shortcut-logo.png">
</head>
<style>
    .chart-container {
        height: 25vh;
        width: 30vw;
    }
</style>

<body>
    <div id="app" class="px-40 mt-10">
        <div class="flex justify-between ">
        <img src="<?= BASEURL?>/src/img/logo.png" width="100px" alt="" class="mb-6 object-contain">
        <div class="flex justify-between">
            
            <a href="<?= BASEURL;?>/login/proseslogout" class="px-9 py-1 bg-yellow-400 m-5 text-lg font-bold rounded-lg text-center text-white w-max">
                        Log Out
            </a>
        </div>
        </div>
        <div class="flex flex-row ">
            <div class="">
            <!-- status -->
            <div class=" ">
            <div class="text-3xl font-bold mb-2">
                status
            </div>
            <div class="flex mb-10">
                <?php
                    $bb_sebelum = $data['user_ambil'][0]['sebelum_diet'];
                    $bb_setelah = $data['user_ambil'][0]['setelah_diet'];
                    if($bb_setelah < $bb_sebelum){
                ?>      
                <div class="bg-primary text-white text-2xl  px-6 py-1 rounded-xl mr-4">
                    sukses
                </div>
                <?php
                    }else{
                ?>
                <div class="bg-red-500 text-white text-2xl  px-6 py-1 rounded-xl">
                    gagal
                </div>
                <?php
                        }
                ?>
            </div>
                </div>
            <!-- progress -->
            <div class="mb-10">
                <div class="text-3xl font-bold">
                    Progress
                </div>
                <div class="flex mt-2">
                    <?php
                        foreach ($data['getprogress'] as $progress) :
                    ?>
                    <div class="border-2 border-hijau h-9 w-9 rounded-full bulathari p-1 mr-4">
                        <p class="text-center text-1xl font-bold items-center"><?= $progress['hari_ke'] ?></p>
                    </div>
                    <?php
                        endforeach;
                    ?>
                </div>
            </div>
            <div class="chart-container ">
                <div class="text-3xl font-bold">
                    Kebutuhan Perhari
                </div>
                <canvas id="oilChart" width="600" height="400"></canvas>
            </div>
        </div>
            <div class="flex flex-col">
            <div class="flex">
                <div class="text-4xl font-bold">
                    Berat Badan
                    <div class="text-3xl ml-4 font-medium">
                        <?php
                             echo $bb_sebelum . ' to ' . $bb_setelah;
                        ?>
                    </div>
                </div>
                <img src="<?=BASEURL?>/src/img/Scenes01 1.png" alt="" class="object-contain">
            </div>
            <div class="text-4xl font-medium">
                Grafik Berat Badan
                <div style="width: 500px;height: 500px" class="pl-20">
                    <canvas id="myChart"></canvas>
                </div>
                <a href='<?=BASEURL;?>/user/submit/<?= $data['getidambil'][0]['id_ambil']?>' class='px-9 py-1 bg-blue-400 m-5 text-xl font-bold rounded-lg text-center text-white w-min'>Submit</a>
            </div>
        </div>
          
            <img src="<?= BASEURL?>/src/img/hero2.png"  alt="" class="mb-6 object-contain">
          
        </div>

    </div>
</body>
    
<?php
    $berat_badan = [];
    array_push($berat_badan, $bb_sebelum);
    foreach($data['getberatbadan'] as $bb):    
        array_push($berat_badan, $bb['status']);
    endforeach;
    function curl2($id,$apiKey){
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/$id/nutritionWidget.json?apiKey=$apiKey");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch);      
            return $output;
    }
    $nutrisi = [];
    $totalKalori = 0;
    $totalKarbo = 0;
    $totalLemak = 0;
    $totalProtein = 0;
    foreach ($data['getIdApi'] as $API) :
        $ID_API = $API['api'];
        $Menu = curl2("$ID_API", "31583d3e3f2f4a77869873961178f927");
        $Menu = json_decode($Menu, true);
        $totalProtein = $totalProtein + substr($Menu['protein'],0,-1);
        $totalKarbo = $totalKarbo + substr($Menu['carbs'],0,-1);
        $totalLemak = $totalLemak + substr($Menu['fat'],0,-1);
        $totalKalori = $totalKalori + $Menu['calories'];    
    endforeach;
    array_push($nutrisi, $totalProtein);
    array_push($nutrisi, $totalKarbo);
    array_push($nutrisi, $totalLemak);
    array_push($nutrisi, $totalKalori);
?>

<script src="<?=BASEURL?>/src/js/Chart.js"></script>
<script>
    var oilCanvas = document.getElementById("oilChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var oilData = {
        labels: [
            "Protein",
            "Karbo",
            "Lemak",
            "Kalori",
        ],
        datasets: [
            {
                data: <?php echo json_encode($nutrisi);?>,
                backgroundColor: [
                    "#35d326",
                    "#21b8cc",
                    "#e2432e",
                    "#e29a2e",
                ]
            }]
    };

    var pieChart = new Chart(oilCanvas, {
        type: 'doughnut',
        data: oilData
    }); 
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sebelum Diet","1", "2", "3", "4", "5", "6", "7", "8"],
            datasets: [{
                label: 'Berat Badan',
                //data: [90, 89, 86, 84, 80, 78, 77],
                data: <?php echo json_encode($berat_badan);?>,
                borderColor: [
                    'rgba(14, 110, 6, 0.897)',

                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</html>