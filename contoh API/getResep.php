<?php
function getResep($id,$apiKey){
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/$id/analyzedInstructions?apiKey=$apiKey");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}
$tes = getResep("661240", "7c5b726042944ed2b5443e23eee0f3a9");
$tes = json_decode($tes, true);
echo "<pre>";
print_r($tes);
echo "</pre>";
echo "<br>". $tes[0]['steps'][0]['number'];

echo "<br>Bahan - Bahan <br>";
foreach ($tes[0]['steps'] as $steps) :
    foreach ($steps['ingredients'] as $bahan) :
        echo $bahan['name'] . "<br>";
    endforeach;
endforeach;

echo "<br>Alat-Alat <br>";
foreach ($tes[0]['steps'] as $steps) :
    foreach ($steps['equipment'] as $equipment) :
        echo $equipment['name'] . "<br>";
    endforeach;
endforeach;

echo "<br>Langkah-Langkah <br>";
foreach ($tes[0]['steps'] as $steps) :
        echo $steps['step'] . "<br>";
endforeach;
?>

