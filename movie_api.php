<?php
header("Content-Type: application/json");

// Your OMDb API key
$apiKey = "4d01ae27";

if (!isset($_GET['search']) || empty($_GET['search'])) {
    echo json_encode(["Error" => "Search parameter missing"]);
    exit;
}

$search = urlencode($_GET['search']);
$url = "https://www.omdbapi.com/?apikey=$apiKey&s=$search";

// Use cURL for reliable fetching
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(["Error" => curl_error($ch)]);
    exit;
}

curl_close($ch);

echo $response;
?>
