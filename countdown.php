<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
$date = strtotime("June 28, 2015 11:00 AM");
$time = date();
$secondsRemaining = $date - time();

define('SECONDS_PER_MINUTE', 60);
define('SECONDS_PER_HOUR', 3600);
define('SECONDS_PER_DAY', 86400);

$daysRemaining = floor($secondsRemaining / SECONDS_PER_DAY); 
$secondsRemaining -= ($daysRemaining * SECONDS_PER_DAY);

$hoursRemaining = floor($secondsRemaining / SECONDS_PER_HOUR);
$secondsRemaining -= ($hoursRemaining * SECONDS_PER_HOUR);

$minutesRemaining = floor($secondsRemaining / SECONDS_PER_MINUTE);
$secondsRemaining -= ($minutesRemaining * SECONDS_PER_MINUTE); 


echo "data: Valimiste lõpuni on: {$daysRemaining} päeva, {$hoursRemaining} tundi, {$minutesRemaining} minutit, {$secondsRemaining   } sekundit \n\n";
flush();
?>