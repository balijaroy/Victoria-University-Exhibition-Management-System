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
        <h1><a href="./">Menu</a> |Capture Guest Information</h1>
	<hr/>
    <?php
	
	$mysqli = new mysqli("localhost", "root", "", "event_system");
if (isset($_POST['name'], $_POST['affiliation'], $_POST['email'], $_POST['phone'], $_POST['title'])) {
    $name = $_POST['name'];
    $affiliation = $_POST['affiliation'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];

    $query = "INSERT INTO guests (name, affiliation, email, phone, title) VALUES ('$name', '$affiliation', '$email', '$phone', '$title')";
    if ($mysqli->query($query)) {
echo "<script>alert('Guest data captured!');</script>";
    } else {
        echo "Failed to captured data";
    }
}

?>
 <div style="padding-left:35%;">
		<form method="post" style="text-align: left;">
  <input type="text" name="name" placeholder="Name" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
  <input type="text" name="affiliation" placeholder="Affiliation" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
  <input type="email" name="email" placeholder="Email" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
  <input type="text" name="phone" placeholder="Phone" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
  <input type="text" name="title" placeholder="Title" required style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">
  <button type="submit" style="width: 50%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 0px;">Register Guest</button>
</form>
               
 </div>

</body>
</html>

<div>
</html>
