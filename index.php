<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    #1
    //open & close connection
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'demo';
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
    echo '<br>';
    echo '<button type="button"><a href="./form_data.php">Add Data</a></button>';

    $sql = 'SELECT * FROM emp';
    mysqli_select_db($link, $dbname);
    $result = mysqli_query($link, $sql);

    if (!$result) {
        die('Could not get data: ' . mysqli_error($link));
    }


    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<br> ";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "# :{$row['emp_id']}  <br> " .
                "NAME : {$row['fname']} <br> " .
                "Email : {$row['email']} <br> " .
                "Gender : {$row['gender']} <br> " .
                "Mail Status : {$row['mail_status']} <br> " .
                "--------------------------------<br>";   
        }
    } else {
        echo "0 results";
    }

    mysqli_close($link);
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>