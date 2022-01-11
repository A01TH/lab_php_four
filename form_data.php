<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <?php
    #5
    //insert data to TABLE
    $name = $email = $gender = $mail_status = "";
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'demo';
    $link = mysqli_connect($dbhost, $dbuser, $dbpass);

    echo 'Connected successfully<br>';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        mysqli_select_db($link, $dbname);

        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        if (empty($_POST["mail_status"])) {
            $mail_status = "no";
        } else {
            $mail_status = $_POST["mail_status"];
        }
        echo $mail_status;

        // $sql = "INSERT INTO emp (fname, email, gender, mail_status) 
        // VALUES (fdsd, ds,fds, fddd )";


        $sql = "INSERT INTO emp(fname,email, gender, mail_status) 
        VALUES ( '$name', '$email', '$gender', '$mail_status' )";

        $retval = mysqli_query($link, $sql);

        if (!$retval) {
            die('Could not insert to table: ' . mysqli_error($link));
        }

        echo "<br>Data inserted to table successfully\n";
        mysqli_close($link);
        header("Location: ./conf_form.php");
    }

    ?>


    <div class="container w-50 m-auto mt-5" id="qqq">
        <h1>User Registration Form</h1>
        <p>Please full this form and submit
            to add user record to the database</p>
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="F" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="M">
                            <label class="form-check-label" for="gridRadios2">
                                Male
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>


            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="mail_status" value="yes">
                <label class="form-check-label" for="exampleCheck1">Receive E-Mail from us</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>