<?php

    // Returns NFT metadata from serialized json from URI
    
    set_time_limit(2);

    $json_serialized = $_GET['json'];

    header('Content-Type: application/json'); 
    echo ($json_serialized);

?>