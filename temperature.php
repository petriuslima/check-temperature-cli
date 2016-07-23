<?php

$config = [
    'baseUrl' => 'http://api.openweathermap.org/data/2.5/weather',
    'appid' => '23a9744017bf02ed2d7ae1de269d5e93',
    'units' => 'metric' // metric : celsius | imperial : fahrenheit | kelvin : is the default
];

if (empty($argv[1])) {
    exit('The city name is required.');
}

$city = $argv[1];

$country = 'br';
if (! empty($argv[2])) {
    $country = $argv[2];
}

$methodData = http_build_query(
    array(
        'q' => $city . ',' . $country,
        'appid' => $config['appid'],
        'units' => $config['units']
    )
);

$requestData = array('http' =>
    array(
        'method'  => 'GET'
    )
);

$context  = stream_context_create($requestData);

$result = file_get_contents($config['baseUrl'] . '?' . $methodData, false, $context);

$responseVO = json_decode($result);

echo 'The current temperature in ' . ucwords($city) . ' is ' . $responseVO->main->temp . 'º.' . PHP_EOL;
