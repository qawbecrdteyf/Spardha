<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"><link type="text/css" rel="stylesheet" href="data/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet"> 
<style>
<?php

     $servername = "localhost";  
       $username = "root";  
       $password = "";  
       $conn = mysql_connect ($servername , $username , $password) or die("unable to connect to host");  
       $sql = mysql_select_db ('alma18int',$conn) or die("unable to connect to database");
$name  = $rank = $marks = $psw = $classq = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST["psw"])){
      $err = "Roll number is required";
     // echo  "<script type='text/javascript'>alert('Wrong userfuck1');</script>";
  }else{
    //$psw = trim(stripslashes(htmlspecialchars($_POST["psw"])));
    $psw = $_POST["psw"];
    echo $psw;
    $sql3 = "SELECT * FROM Sresults WHERE RN = $psw LIMIT 1";
    $result = mysql_query($sql3);
    //echo $result;
    while ($row_user = mysql_fetch_assoc($result)){
    if(mysql_num_rows($result)>0){
$rank = $row_user['Rank'];
$name = $row_user['Name'];
$classq = $row_user['Class'];
$marks = $row_user['Marks'];
    }else{
      echo  "<script type='text/javascript'>alert('Wrong user');</script>";

    }
}
  }


}

//mysqli_free_result($result);
//mysqli_close($conn);
?>


body {font-family: Arial, Helvetica, sans-serif; background-image: url("bg.jpg"); 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: repeat;
    background-size: cover;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

.whitebox {
    background-color:#ffded5;
    color: black;
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
    height: 420px;
    <!--other positioning attributes-->
}

</style>
</head>

<center><h1 style="font-family: 'Chicle', cursive; color:#ffdf00; "> Congratulations on your participation in Alma Fiesta's national school-level quiz competition, SPARDHA</h1></center>

<center><h3 style="font-family: 'Chicle', cursive; color:#0033ee; ">Fill in your  details below to get your result!</h3></center>

<!--<center><button onClick = "document.getElementById('id01').style.display = 'block'" style="width: auto; border-radius: 15px;">Click here for results!</button></center>-->

<div class="whitebox">
    <form class="" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >
    <div class="imgcontainer">
      <img src="img_avatar2.jpeg" alt="Avatar" class="avatar">
    </div>

    
    <div class="container">
      <label for="psw"><b>Roll number</b></label>
      <input type="text" placeholder="Enter your Roll number" name="psw" required><span class="error">* <?php echo $nameErr;?></span>
      <button  >Login</button>

      <div id ="id02" class = "resultpopup" style="display: block;">
      <center>
        <div class="w3-container">
  
  <table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Roll Number</th>
        <th>Name</th>
        <th>Class</th>
        <!--<th>Marks</th>-->
        <th>Rank</th>
      </tr>
    </thead>
    <tr>
      <td><?php echo $psw ?></td>
      <td><?php echo $name ?></td>
      <td><?php echo $classq ?></td>
      <!--<td></td>-->
      <td><?php echo $rank ?></td>
    </tr>
    
  </table>
</div>
      </center>
</div>
</div>

    </div>
  </form>


