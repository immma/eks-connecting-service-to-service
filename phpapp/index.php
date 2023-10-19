<?php
    echo "ENV" . "<br>";

    $host = getenv("NODE_SERVICE"); // call from env variables
    // $host = 'http://nodeapp-master:8080'; // if using EKS or 
    // $host = 'http://nodeapp-master.default.svc.cluster.local:8080'; // uncomment this if you're using managed Kubernetes or local Kubernetes (Minikube).
    //$host = 'http://backend.local:8080'; // if using ECS with service discovery
    if (getenv('GET_HOSTS_FROM') == 'env') {
    $host = getenv('NODE_SERVICE');
    }
    
    
    $json = file_get_contents($host);
    // var_dump(json_decode($json));
    
    $jsondata = json_decode($json);
    
    foreach ($jsondata as $data) {
        echo "UserID: " . $data->guid . "<br>";
        echo "fullname: " . $data->fullname . "<br>";
        echo "City: " . $data->city . "<br>";
        echo "Email: " . $data->email . "<br>";
        echo "Phone: " . $data->phone . "<br>";
        echo "---------------------------------" . "<br>";
    }
    
?>
