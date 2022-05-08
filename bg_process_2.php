<?php
date_default_timezone_set("Asia/Kolkata");
include("conn.php");
ignore_user_abort(true);
set_time_limit(0);
// Buffer all upcoming output...
ob_start();

// Send your response.
echo "Here be response";

// Get the size of the output.
$size = ob_get_length();

// Disable compression (in case content length is compressed).
header("Content-Encoding: none");

// Set the content length of the response.
header("Content-Length: {$size}");

// Close the connection.
header("Connection: close");

// Flush all output.
ob_end_flush();
@ob_flush();
flush();

$i = 0;
$bill_number = mt_rand(100, 100000);
$month = mt_rand(1, 12);
while (true) {
    $i++;
    if ($i == 3) {
        $insert = "INSERT INTO `bill_master`(`name`,`bill_no`,`month`) values('Shubham Rawat',$bill_number,$month)";
        $run = mysqli_query($conn, $insert);
        continue;
    }

    if (($i == 10000000000)) {
        $time = date('Y-m-d h:i:s');
        $update = "UPDATE `bill_master` SET `status`='Generated', `end_time`='$time' WHERE `bill_no`=$bill_number";
        $run = mysqli_query($conn, $update);
        exit;
    }
}
die;
