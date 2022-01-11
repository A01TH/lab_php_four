<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
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




    $sql = 'SELECT * FROM emp ORDER BY emp_id DESC LIMIT 1;' ;
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

    <button><a href="./index.php">back</a></button>



</body>

</html>