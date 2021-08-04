<?php

    // $jsonurl = "https://05f73690990b461fb918310c655b6feb.vfs.cloud9.ap-southeast-2.amazonaws.com";
    $host = 'http://nodeapp-master:8080'; // if using EKS or 
    // $host = 'http://nodeapp-master.default.svc.cluster.local:8080'; // uncomment this if you're using managed Kubernetes or local Kubernetes (Minikube).
    //$host = 'http://backend.local:8080'; // if using ECS with service discovery
    if (getenv('GET_HOSTS_FROM') == 'env') {
    $host = getenv('NODEAPP_MASTER_SERVICE_HOST');
    }
    
    
    $json = file_get_contents($host);
    // var_dump(json_decode($json));
    
    $jsondata = json_decode($json);
    
    foreach ($jsondata as $data) {
        echo "userID: " . $data->userId . "\n";
        echo "title: " . $data->title . "\n";
        echo "comments: " . $data->body . "\n";
        echo "---------------------------------\n";
    }
    
?>
