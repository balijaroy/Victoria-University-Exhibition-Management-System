<html>
<head>
    <title>Victoria University Exhibition System</title>
</head>
<div style="border-style:solid;border-color:red;padding-bottom:50px;">
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #FBF4E2;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        ul {
            text-align: center;
            list-style: none;
            padding: 0;
        }
        ul li {
            display: inline-block;
            margin: 20px;
        }
        ul li a {
            text-decoration: none;
            color: #333;
            font-size: 15 px;
            display: inline-flex;
            align-items: center;

        }
        ul li a img {
            height: 24px;
            width: 24px;
        }
		.UniversityLogo{
			padding-left:37%;
			padding-top:100px;
			
		}
    </style>
</head>
<body>
	<img class="UniversityLogo" src = "icons/vuu.png">
        <h1><a href="./">Menu</a> |Manage Exhibitions</h1>
	<hr/>

 <div style="padding-left:35%;">
 
 
		<form method="post" style="text-align: left;">
		<?php
		$mysqli = new mysqli("localhost", "root", "", "event_system");
if (isset($_POST['title'], $_POST['type'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];

    $query = "INSERT INTO exhibitions (title, type) VALUES ('$title', '$type')";
    if ($mysqli->query($query)) {
        echo "<script>alert('Exhibition captured');</script>";
    } else {
        echo "<script>alert('Failed to capture data');</script>";
    }
}
?>

<form method="POST" action="">
  <input type="text" name="title" placeholder="Exhibition Title" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
  <select name="type" style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
     <option value="" disabled selected >Select option</option>
	<option value="project showcase">Project Showcase</option>
    <option value="research poster">Research Poster</option>
    <option value="keynote session">Keynote Session</option>
  </select>
  <button type="submit" style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">Add Exhibition</button>
</form>


 </div>

</body>
</html>

<div>
</html>
