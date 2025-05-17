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
    <h1><a href="./">Menu</a> | All Reserved Seats</h1>
	<hr/>

 <div style="padding-left:20%;">
 
 
		
		<?php
$mysqli = new mysqli("localhost", "root", "", "event_system");
$query = "SELECT t.ticket_id, g.name, s.session_type, s.session_date, s.time_slot, t.seat_number, t.amount 
          FROM tickets t
          JOIN guests g ON t.guest_id = g.guest_id
          JOIN sessions s ON t.session_id = s.session_id
          ORDER BY t.ticket_id ASC";

$result = $mysqli->query($query);


if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <thead>
              <tr>
                <th>Ticket ID</th>
                <th>Guest Name</th>
                <th>Session Type</th>
                <th>Session Date</th>
                <th>Time Slot</th>
                <th>Seat Number</th>
                <th>Amount (UGX)</th>
              </tr>
            </thead>
            <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ticket_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['session_type']}</td>
                <td>{$row['session_date']}</td>
                <td>{$row['time_slot']}</td>
                <td>{$row['seat_number']}</td>
                <td>" . number_format($row['amount']) . "</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No reserved seats found.</p>";
}
?>


 </div>

</body>
</html>

<div>
</html>
