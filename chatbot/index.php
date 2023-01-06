<?php
$insert=false;
if(isset($_POST['talkRes'])){

    $server= "localhost";
    $username= "root";
    $password= "";
    $database= "mybot";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    /*Relational tables banana hai further sub options ke liye*/
    $name= $_POST['name'];
    $talkRes = $_POST['talkRes'];

    $sql = "INSERT INTO 'carrerpath' ( 'name', `talkRes`) VALUES ('$name','$talkRes')" ;
    echo $sql;
    $result=mysqli_query($con,$sql);

    if($result){
        echo "executed";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Brains ChatBot</title>
    <link rel="stylesheet" href="style.css";>

    <link rel="stylesheet" type="text/css" href="jquery.convform.css">
    <script type="text/javascript" src="jquery-3.6.3.js"></script>
    <script type="text/javascript" src="custom.js"></script>
    <script type="text/javascript" src="jquery.convform.js"></script>
</head>
<body>
    <img class="chat_icon" src="icon.png">

    <div class="chat_box">
        <div class="conv-form-wrapper">
            
        <form action="index.php" method="post" class="hidden">

            <input type="text" name="Hello" data-conv-question="Hello, I am your career assistant.">

            <input type="text" name="name" data-conv-question="May, I know your name?">

            <select name="intro" data-conv-question="Are you confused in choosing your career field? (Yes/No)">
                <option value="yes">Yes</option>
                <option value="No">No</option>
            </select>

            <select name="talkRes" data-conv-question="Don't worry I am here help you out. <br/>Please answer the following questions <br/>What do you like to do the most?">
                <option value="Problems">Help others to resolve their problems</option>
                <option value="Arts">To do something interesting, unique </option>
                <option value="Techie">Excited in kowing about new technologies</option>
                <option value="History">Interested in knowing about the mystries of things arround you</option>
                <option value="Other">Other</option>
            </select>
            <div data-conv-fork="talkRes">
                <div data-conv-case="Problems">
                    <select name="talkRes" data-conv-question="Which description sits your personality the most? ">
                        <option value="Teacher">Develops, plans, and implements curriculum, lesson plans, and educational programs for student audiences within areas of expertise.</option>
                        <option value="Councellor">Interested in helping people to manage and overcome mental and emotional issues.</option>
                    </select>
                </div>
                <div data-conv-case="Arts">
                    <select name="artChoice" data-conv-question="Which description sits your personality the most? ">
                        <option value="Painting">Engaging in an activity related to creating art, practicing the arts, or demonstrating an art</option>
                        <option value="Designing">Prefer to work alone, solving problems and creating solutions</option>
                        <option value="Music">Music takes your soul to the universe, wings to the mind, flight to the imagination, and life to everything</option>
                        <option value="Dancing">To use movement, gesture and body language to portray a character, story, situation or abstract concept to an audience</option>
                        <option value="Drama">Entertain an audience by acting, singing or dancing</option>
                    </select>
                </div>
                <div data-conv-case="Techie">
                    <select name="techChoice" data-conv-question="Which description sits your personality the most?">
                        <option value="Web">To create creative pages for easy access</option>
                        <option value="App">Creating small icon which functions in wide range</option>
                        <option value="Game">Help in developing out of the box ideas to casual user</option>
                        <option value="Machine">Changing the human world to machine world</option>
                        <option value="Visual">Show ideas theough visuals</option>
                    </select>
                </div>
                <div data-conv-case="History">
                    <select name="hisChoice" data-conv-question="Which description sits your personality the most? ">
                        <option value="Plants">Gets easily attached with plant and want to know their history</option>
                        <option value="Places">Visits place to explore the history</option>
                        <option value="Fabric">Touches and questions about every new fabric</option>
                        <option value="Machine">Click photos and searches about machines</option>
                        <option value="Animal">Interested to know human and animal history</option>
                    </select>
                </div>
            </div>

            <select name="lead" data-conv-question="Do you like to lead other? ">
                <option value="yes">Yes</option>
                <option value="No">No</option>
            </select>

            <select name="error" data-conv-question="Do you like to find errors or mistakes and resolve? ">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            
            <!--database se connect krna hai choice ke according message display hona chahiye-->
            <select name="error" data-conv-question="From the above survey I think you are fit to choose Web Development as your career option.<br>Do you want to know the roadmap for the same? ">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            
            <!--sirf display krna hai input nhi lena-->
            <input type="text" name="thanks" data-conv-question="Thank you.">

        </form>
    </div>
    </div>

</body>
</html>