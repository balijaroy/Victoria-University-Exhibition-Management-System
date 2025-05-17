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
        <h1><a href="./">Menu</a> |Manage Sessions</h1>
	<hr/>

 <div style="padding-left:35%;">
 
 
		<form method="post" style="text-align: left;">
		<?php
$mysqli = new mysqli("localhost", "root", "", "event_system");
if (isset($_POST['exhibition_id'], $_POST['session_type'], $_POST['session_date'], $_POST['time_slot'], $_POST['period'])) {
    $exhibition_id = $_POST['exhibition_id'];
    $session_type = $_POST['session_type'];
    $session_date = $_POST['session_date'];
    $time_slot = $_POST['time_slot'];
    $period = $_POST['period'];

    $query = "INSERT INTO sessions (exhibition_id, session_type, session_date, time_slot, period) VALUES ('$exhibition_id', '$session_type', '$session_date', '$time_slot', '$period')";
    if ($mysqli->query($query)) {
        echo "<script>alert('Session scheduled successfully');</script>";
    } else {
        echo "<script>alert('Failed to schedule Session');</script>";
    }
}
?>

<form method="POST" action="">
<?php $exhibitions = $mysqli->query("SELECT exhibition_id, title FROM exhibitions"); ?>

<select name="exhibition_id" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;" name="type"><br>
    <option value="">Select Exhibition</option>
    <?php while ($ex = $exhibitions->fetch_assoc()): ?>
      <option value="<?= $ex['exhibition_id'] ?>"><?= $ex['title'] ?></option>
    <?php endwhile; ?>
  </select>  
  <select name="session_type" style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;" name="type"><br>
     <option value="" disabled selected >Select option</option>   
   <option value="workshop">Workshop</option>
    <option value="presentation">Presentation</option>
  </select>
  <input type="date" name="session_date" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;" name="type"><br>
  <input type="time" name="time_slot" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;" name="type"><br>
  <select name="period" style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;" name="type"><br>
     <option value="" disabled selected >Select a session</option>
	<option value="morning">Morning</option>
    <option value="afternoon">Afternoon</option>
  </select>
  <button type="submit" style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;" name="type">Add Session</button>
</form>



 </div>

</body>
</html>

<div>
</html>
