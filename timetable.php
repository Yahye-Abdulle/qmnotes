<?php
error_reporting(0);
$current_page = $_GET['p'];
if (empty($current_page)) {
	$current_page = 0;
} else {
	$current_page = $_GET['p'];
}


$timetable_page = 'https://ical.timetables.qmul.ac.uk/default.aspx?StudentTz&p1='.$current_page.'&timezone=GMT%20Standard%20Time&default=false';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Archivo:700&display=swap" rel="stylesheet">
    <title>Responsive Animated Navbar</title>
</head>
<body>
   <div class="nav">
	  <input type="checkbox">
	    <span></span>
	    <span></span>
	    <div class="menu">
	      <li><a href="index.html">home</a></li>
	      <li><a href="courses/courses.html">courses</a></li>
	      <li><a href="#">timetable</a></li>
	      <li><a href="#">contact</a></li>
	      <li><a href="#">about</a></li>
	    </div>
	</div>
	<div > <!-- style="position: absolute;margin: 0;left: 44vw;top: 13vh;text-align:center" -->
		<!-- style="display: flex;align-items: center;justify-content: center;flex-wrap: wrap;" -->
		<input class="menu" type="text" name="studentID"  placeholder="Student ID - Press Enter" id="studentID" style="display: block;margin-right: auto;margin-left: auto; width: 100%;margin-bottom: 600px; text-align: center;">  
  
		<button class="center" id="returnClick" onclick="window.location.replace('http://localhost/timetable.php?p='+document.getElementById('studentID').value)" style="display: none;"></button>
		<script>
			var input = document.getElementById("studentID");
			input.addEventListener("keyup", function(event) {
			  if (event.keyCode === 13) {
			   event.preventDefault();
			   document.getElementById("returnClick").click();
			  }
			});
		</script>
		<style>
		.responsive-iframe {
			display:block;
		  	position: absolute;
		  	margin:0 auto;
		  	margin-top: -200px;
		  	width: 70%;
		  	height: 70%;
		  	border: none;
		}
		</style>	
		<div style="display: flex;align-items: center;justify-content: center;">    
			<iframe class="responsive-iframe" src="<?= $timetable_page ?>"></iframe>
		</div>
	</div>
    <script src="assets/js/main.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
