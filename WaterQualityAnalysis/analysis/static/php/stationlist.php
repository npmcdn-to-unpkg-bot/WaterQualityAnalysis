<?php
    $username = "root";
    $password = "root";
    $host = "localhost";
    $database="waterquality";

    $connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

    $myquery = "
SELECT `id`, `stationname`, `latitude`, `longitude`, `sensorslist` FROM `stationlist`
";
    $query = mysqli_query($connect, $myquery);

if (!$query) {
    printf("Errormessage: %s\n", mysqli_error($connect));
}

    $data = array();

    for ($x = 0; $x < mysqli_num_rows($query); $x++) {
        $data[] = mysqli_fetch_assoc($query);
    }

    echo json_encode($data);

    mysqli_close($connect);
?>