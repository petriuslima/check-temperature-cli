<?php

$cities = [
    'leme' => '476',
    'rioClaro' => '531'
];

$postdata = http_build_query(
    array(
        'id' => $cities[$argv[1]]
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => "Referer: http://www.climatempo.com.br/\r\nContent-type: application/x-www-form-urlencoded\r\n",
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('http://www.climatempo.com.br/json/tempo-no-momento', false, $context);

echo json_decode($result)->temperature . ' graus';
