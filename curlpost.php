<?php

$url = "https://reqres.in/api/users";

$ch = curl_init();

$data_array = array(
    'name' => 'sars',
    'job' => 'helpdesk'
);

$data = http_build_query($data_array);



curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
} else {
    $decoded = json_decode($resp, true);
    // var_dump(get_object_vars($decoded));
    // print_r($decoded);
    foreach ($decoded as $key => $value) {
        # code...
        echo $key . ':' . $value . '<br>';
    }
}

curl_close($ch);
