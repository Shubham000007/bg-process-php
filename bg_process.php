<?php
include("conn.php");
include("generate_bills.php");

ignore_user_abort(true);
set_time_limit(0);

exec("php generate_bills.php");
