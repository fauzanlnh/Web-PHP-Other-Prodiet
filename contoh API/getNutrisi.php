<?php
function curl($apiKey,$diet,$type,$query){
	$ch = curl_init(); 
	//$apiKey = "7c5b726042944ed2b5443e23eee0f3a9";
	//curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/complexSearch?query=$query&diet=$diet&type=$type&apiKey=$apiKey");
	curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/complexSearch?query=$query&diet=$diet&type=$type&apiKey=$apiKey");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}
/*$tes = curl("7c5b726042944ed2b5443e23eee0f3a9",  "pescetarian", "maincourse", "shrimp");
$tes = json_decode($tes, true);
echo "<pre>";
print_r($tes);
echo "</pre>";
echo $tes['results'][0]['id'];
*/
function curl2($id,$apiKey){
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/$id/nutritionWidget.json?apiKey=$apiKey");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}
$tes = curl2("654959", "7c5b726042944ed2b5443e23eee0f3a9");
$tes = json_decode($tes, true);
//echo "<pre>";
//print_r($tes);
//echo "</pre>";





$tes2 = curl2("634003", "7c5b726042944ed2b5443e23eee0f3a9");
$tes2 = json_decode($tes2, true);

echo $tes['calories'] . "<br>";
echo $tes2['calories'] . "<br>";

echo $tes['fat'] . "<br>";
echo $tes2['fat'] . "<br>";

echo $tes['carbs'] . "<br>";
echo $tes2['carbs'] . "<br>";

echo $tes['protein'] . "<br>";
echo $tes2['protein'] . "<br>";


$tottes = $tes2['calories'] + $tes['calories'];

$fat1 = substr($tes['calories'],0,-1);
$fat2 = substr($tes2['calories'],0,-1);
$totfat = $fat1 + $fat2;

$carbs1 = substr($tes['carbs'],0,-1);
$carbs2 = substr($tes2['carbs'],0,-1);
$totcarbs = $carbs1 + $carbs2;

$prot1= substr($tes['protein'],0,-1);
$prot2 = substr($tes2['protein'],0,-1);
$totprot = $prot1 + $prot2;
echo "<br> Total Kalori      : ".$tottes ;
echo "<br> Total Lemak       : ".$totfat ;
echo "<br> Total Karbohidrat : ".$totcarbs ;
echo "<br> Total Protein     : ".$totprot ;
