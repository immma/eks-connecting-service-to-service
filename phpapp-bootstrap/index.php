<?php
    $host = getenv("NODE_SERVICE"); // call from env variables
    // $host = 'http://nodeapp-master:8080'; // if using EKS or 
    // $host = 'http://nodeapp-master.default.svc.cluster.local:8080'; // uncomment this if you're using managed Kubernetes or local Kubernetes (Minikube).
    //$host = 'http://backend.local:8080'; // if using ECS with service discovery
    if (getenv('GET_HOSTS_FROM') == 'dns') {
    $host = getenv('NODE_SERVICE');
    }
    
    
    $json = file_get_contents($host);
    // var_dump(json_decode($json));
    
    $jsondata = json_decode($json);
    
    // foreach ($jsondata as $data) {
    //     echo "UserID: " . $data->guid . "<br>";
    //     echo "fullname: " . $data->fullname . "<br>";
    //     echo "City: " . $data->city . "<br>";
    //     echo "Email: " . $data->email . "<br>";
    //     echo "Phone: " . $data->phone . "<br>";
    //     echo "---------------------------------" . "<br>";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" type="text/javascript"></script>
    <title>EKS Demo</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Hello world</h1>
            <h3>EKS application demo app</h3>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>UserID</th>
                        <th>Full name</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($jsondata as $data) { ?>
                    <tr>
                        <td><?php echo $data->guid; ?></td>
                        <td><?php echo $data->fullname; ?></td>
                        <td><?php echo $data->city; ?></td>
                        <td><?php echo $data->email; ?></td>
                        <td><?php echo $data->phone; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <hr>
        <p>Copyright https://ardihanitya.id</p>
    </div>
</body>
</html>
