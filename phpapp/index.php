<?php

    // $jsonurl = "https://05f73690990b461fb918310c655b6feb.vfs.cloud9.ap-southeast-2.amazonaws.com";
    $host = 'http://nodeapp-master:8080';
    if (getenv('GET_HOSTS_FROM') == 'env') {
    $host = getenv('NODEAPP_MASTER_SERVICE_HOST');
    }
    
    
    $json = file_get_contents($host);
    var_dump(json_decode($json));
    
?>