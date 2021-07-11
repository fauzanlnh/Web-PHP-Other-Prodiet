<?php
    class api_model{
        public function getNutrisi($data){
            
        }
        public function getSteps($id,$apikey){
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/$id/analyzedInstructions?apiKey=$apiKey");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch);      
            return $output;
        }
    }
?>