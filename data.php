<?php
function getSSLPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSLVERSION,3); 
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
  /* This wuold try to solve the IE problem, by first accessing a website from the outsite and then printing it out here..

Rapi Castillo
*/
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

  $url = $_ENV['SPREADSHEET_LOCATION'];
  $content = file_get_contents($url, false, stream_context_create($arrContextOptions));
//  $data = json_decode($content);
//  https://docs.google.com/spreadsheets/d/1IMyfmm8_cC9Y54RvEfCkRYrNtWBNMeaBHbM7VVUjwcc/pub?output=csv
  echo $content;
  
?>
