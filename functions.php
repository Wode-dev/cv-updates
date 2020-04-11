<?php

function cvupdates_scripts() {
    // wp_enqueue_style( 'style', get_stylesheet_uri() );
    // wp_enqueue_script( 'app' , get_theme_file_uri( 'assets/js/' ));
    wp_enqueue_style( 'cvupdates-stylesheet', get_template_directory_uri() . '/assets/css/app.css' );
}

add_action( 'wp_enqueue_scripts', 'cvupdates_scripts' );



function cvupdates_http($type = 'get', $url = ''){
    // Initializating cUrl for http operations
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $url
    ]);
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

function cvupdates_data_brazil() {
    $api = 'https://corona.lmao.ninja/countries/Brazil';
    return json_decode(cvupdates_http('get', $api), true);
}

function cvupdates_progression_brazil() {
    $api = 'https://corona.lmao.ninja/v2/historical/Brazil';
    return json_decode(cvupdates_http('get', $api), true);
}

function cvupdates_progression_chart() {
    $api_response = cvupdates_progression_brazil();
    
    $chart = [];

    $chart["labels"] = array_keys($api_response['timeline']['cases']);
    
    $chart['data'] = [];
    $chart['data']['cases'] = array_values(
        $api_response['timeline']['cases']
    );
    $chart['data']['deaths'] = array_values(
        $api_response['timeline']['deaths']
    );
    $chart['data']['recovered'] = array_values(
        $api_response['timeline']['recovered']
    );

    return $chart;
}
?>