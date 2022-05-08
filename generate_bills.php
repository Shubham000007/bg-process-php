<?php

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
        $update = "UPDATE `bill_master` SET `status`='Generated' WHERE `bill_no`=$bill_number";
        $run = mysqli_query($conn, $update);
        exit;
    }
}
