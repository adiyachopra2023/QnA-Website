<?php
    $submit=false;
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "questionitout";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }

    //echo "Success connecting to database!";
    $name = $_POST['name'];
    $regno = $_POST['regno'];
    $emailid = $_POST['eid'];
    $question = $_POST['ques'];
    $sql = "INSERT INTO `questionitout`.`studentquestions` (`Name`, `Registration No.`, `Email`, `Question`, `Time Stamp`) VALUES ('$name', '$regno', '$emailid', '$question', current_timestamp());";
    if($con->query($sql)==true){
        $submit = true;
        //echo "Successfully Inserted";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuestionITOut</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1><b>Question It Out</b></h1>
        <p><b>Ask it out</b></p>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <br><input type="text" name="regno" id="regno" placeholder="Enter your registration no.">
            <br><input type="email" name="eid" id="eid" placeholder="Enter your email">
            <br></bt><textarea name="ques" id="ques" cols="30" rows="10" placeholder="Enter your question here.."></textarea>
            <br><button class="btn" value="submit">Ask</button>
            <button class="btn" value="reset">Reset</button>

            <?php
                if($submit==true){
                    echo '<p class="submitMessage"><b> Thanks for submitting your query!</b><br><b> Look up for your answer by the speaker..</b></p>';
                }
            ?>
        </form>
    </div>
    <script src="index.js">
        /*INSERT INTO `studentquestions` (`S. No.`, `Name`, 
        `Registration No.`, `Email`, `Question`, `Time Stamp`) VALUES ('1', 'Admin', '@0BPS1163', 'adiya.chopra2020@vitstudent.ac.in', 'Ask a question', 'current_timestamp(6).000000');*/
    </script>
</body>
</html>