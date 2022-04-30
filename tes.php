<?php
// PHP program to add days to $Date
 
// Declare a date
$startdate = "2019-05-10";

$enddate = "2019-04-10";
$periode = 2;
// Add days to date and display it
$enddate = date('Y-m-d', strtotime($startdate. ' + ' . $periode . " months"));
 

$timeInterval = new DatePeriod(
    new DateTime($startdate),
    new DateInterval('P1D'),
    new DateTime($enddate)
);

foreach ($timeInterval as $key => $value) {
    $value->format('Y-m-d');      
}
?>