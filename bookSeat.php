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
        <h1><a href="./">Menu</a> |Book Guest Seat</h1>
	<hr/>

 <div style="padding-left:35%;">
 
 
		<form method="post" style="text-align: left;">
		<?php
		$mysqli = new mysqli("localhost", "root", "", "event_system");
			$guests = $mysqli->query("SELECT guest_id, name FROM guests");
$sessions = $mysqli->query("SELECT session_id, session_type FROM sessions");
?>
<form method="POST" action="">
  <select name="guest_id" required  style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
    <option value="">Select Guest</option>
    <?php while ($g = $guests->fetch_assoc()): ?>
      <option value="<?= $g['guest_id'] ?>"><?= $g['name'] ?></option>
    <?php endwhile; ?>
  </select>
  <select name="session_id" required  style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
    <option value="">Select Session</option>
    <?php while ($s = $sessions->fetch_assoc()): ?>
      <option value="<?= $s['session_id'] ?>"><?= $s['session_type'] ?> - ID: <?= $s['session_id'] ?></option>
    <?php endwhile; ?>
  </select>
  <select name="seat_number" required  style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
    <option value="">Select Seat</option>
    <optgroup label="UGX 150,000">
      <?php
      foreach (['A','B','C','D','E','F'] as $row) {
        for ($i = 1; $i <= 30; $i++) {
          echo "<option value='{$row}{$i}'>{$row}{$i}</option>";
        }
      }
      ?>
    </optgroup>
    <optgroup label="UGX 75,000">
      <?php
      foreach (['G','H','I','J','K','L'] as $row) {
        for ($i = 1; $i <= 30; $i++) {
          echo "<option value='{$row}{$i}'>{$row}{$i}</option>";
        }
      }
      ?>
    </optgroup>
    <optgroup label="UGX 35,000">
      <?php
      foreach (['AA','BB','CC'] as $row) {
        for ($i = 1; $i <= 30; $i++) {
          echo "<option value='{$row}{$i}'>{$row}{$i}</option>";
        }
      }
      foreach (['DD' => 28, 'EE' => 24, 'FF' => 24] as $row => $limit) {
        for ($i = 1; $i <= $limit; $i++) {
          echo "<option value='{$row}{$i}'>{$row}{$i}</option>";
        }
      }
      ?>
    </optgroup>
    <optgroup label="UGX 350,000">
      <?php
      for ($i = 1; $i <= 16; $i++) {
        echo "<option value='X{$i}'>X{$i}</option>";
      }
      ?>
    </optgroup>
  </select>
  
  <?php
  if (isset($_POST['guest_id'], $_POST['session_id'], $_POST['seat_number'])) {
    $guest_id = $_POST['guest_id'];
    $session_id = $_POST['session_id'];
    $seat_number = $_POST['seat_number'];

    $check = "SELECT * FROM tickets WHERE session_id = '$session_id' AND seat_number = '$seat_number'";
    $res = $mysqli->query($check);
    if ($res && $res->num_rows > 0) {
        echo  "<script>alert('Seat already booked for this session');</script>";
    } else {
      
        $price = 0;
        if (preg_match('/^[ABCDEF][1-9][0-9]?$/', $seat_number)) {
            $price = 150000;
        } elseif (preg_match('/^[GHIJKL][1-9][0-9]?$/', $seat_number)) {
            $price = 75000;
        } elseif (preg_match('/^(AA|BB|CC)[1-9][0-9]?$/', $seat_number) ||
                  preg_match('/^(DD)[1-9]|1[0-9]|2[0-8]$/', $seat_number) ||
                  preg_match('/^(EE)[1-9]|1[0-9]|2[0-4]$/', $seat_number) ||
                  preg_match('/^(FF)[1-9]|1[0-9]|2[0-4]$/', $seat_number)) {
            $price = 35000;
        } elseif (preg_match('/^X[1-9]|1[0-6]$/', $seat_number)) {
            $price = 350000;
        }

        $query = "INSERT INTO tickets (guest_id, session_id, seat_number, amount) VALUES ('$guest_id', '$session_id', '$seat_number', '$price')";
        if ($mysqli->query($query)) {
            echo "<script>alert('Seat reserved successfully. Amount: UGX $price');</script>";
        } else {
            echo "<script>alert('Failed to book Seat')</script>";
        }
    }
}
  ?>
  <button type="submit"  style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">Reserve Seat</button>
</form>
		</form>
 </div>

</body>
</html>

<div>
</html>
