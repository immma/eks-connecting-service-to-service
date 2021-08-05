<?php
    echo "ENV: php: " . "<br>";

    $host = getenv("NODE_SERVICE");

    
    $json = file_get_contents($host);
    // var_dump(json_decode($json));
    
    $jsondata = json_decode($json);
    
    foreach ($jsondata as $data) {
        echo "userID: " . $data->userId . "<br>";
        echo "title: " . $data->title . "<br>";
        echo "comments: " . $data->body . "<br>";
        echo "---------------------------------" . "<br>";
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <title>Frontend</title>
</head>

<body ng-app="serviceApp">
    <div class="container" ng-controller="serviceCtrl">
        <div>
            <p>ENV: html load Javascript</p>
            <?php echo $host; ?>

            <table class="table" ng-repeat="res in response">
                <tr><td>ID</td><td>{{ res.id }}</td></tr>
                <tr><td>Title</td><td>{{ res.title }}</td></tr>
                <tr><td>Body</td><td>{{ res.body }}</td></tr>
            </table>

        </div>
    </div>

    <script type="text/javascript">
        var app = angular.module('serviceApp', []);

        app.controller('serviceCtrl', function($scope, $http) {
            // $scope.response = [{"id": "21212"}]
            $http.get("<?php echo $host; ?>").then(function (params) {
                $scope.response = params.data;
            }, function error(params) {
                
            })

        });
    </script>
</body>

</html>
