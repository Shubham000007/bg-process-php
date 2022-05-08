<?php
include_once("conn.php");
try {
    $select = "SELECT * FROM `bill_master`";
    $run = mysqli_query($conn, $select);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Process || PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">BackGround Process</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar  Ends -->

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-end">
                <button type="button" class="btn btn-success" id="generate_bill">Generate Bills</button>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3 mb-3 container mx-auto">
        <table class="table w-100 table-striped table-bodered">
            <thead>
                <tr class="bg-primary text-white">
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Bill No.</th>
                    <th>Month</th>
                    <th>Status</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $j = 0;
                while ($billData = mysqli_fetch_array($run)) {
                    $j++
                ?>
                    <tr>
                        <td><?php echo $j; ?></td>
                        <td><?php echo $billData['name']; ?></td>
                        <td><?php echo $billData['bill_no']; ?></td>
                        <td><?php echo $billData['month']; ?></td>
                        <td>
                            <?php
                            if (($billData['status'] == "In Process")) {
                                echo '<p class="text-primary fw-bold">' . $billData['status'] . '</p>';
                            } else if (($billData['status'] == "Generated")) {
                                echo '<p class="text-success fw-bold">' . $billData['status'] . '</p>';
                            } else {
                                echo '<p class="text-danger fw-bold">' . $billData['status'] . '</p>';
                            }
                            ?></p>
                        </td>
                        <td><?php echo $billData['generated_at']; ?></td>
                        <td><?php echo $billData['end_time']; ?></td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script defer src="index.js"></script>
</body>

</html>