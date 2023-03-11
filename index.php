<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level1</title>
</head>
<body>

<?php include "functions.php" ?> 

<?php 
    base_script(); //base php script
    echo "<hr>";

    $date = actual_date(); //actual date & time
    echo "Actual date and time is ".$date; 
    echo "<hr>";

    mkfile('log.txt'); // create new file for logging arrivals
    $subor = 'log.txt';
    
    //arrivals
    $delay = (date('H:i:s') > date('08:00:00') && date('H:i:s') < date('20:00:00'));
    $ontime = (date('H:i:s') >= date('00:00:00') && date('H:i:s') <= date('08:00:00'));

    write_data($subor, $date, $delay, $ontime); // put data to exist file
    
    echo nl2br(read_data( $subor )); // get data from log.txt to index.php
?>
</body>
</html>