<!DOCTYPE html>
<html>

<body>

  <h1>This is a Heading</h1>

  <p>This is a paragraph.</p>

<?php
	$colors = array('red','blue', 'yellow');
	$numColors = count($colors);
	echo "There are $numColors colors.<br>";
	sort($colors);
	for ($i=0; $i<$numColors; $i++)
		echo "Color[$i]= $colors[$i].<br>";
  function writeMsg() {
    echo "Hello world!";
  }

  writeMsg(); 
  
  function getProfile($name) {
      return array("fullName"=>"Huzaifa Al Nahas", "email"=> "halnahas@gmail.com");
    }
  print_r(getProfile("Huzaifa"));echo"<br>";
    
?>

<?php
$servername = "localhost";
$username = "dbuser";
$password = "newpass";
$dbname = "tutorial";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.<br>";

$sql= "INSERT INTO user (id,username,password) VALUES (NULL, 'Huzaifa', 'Fateh')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/*
$sql= "INSERT INTO potluck (id,name,food,confirmed,signup_date) VALUES (NULL, 'Huzaifa', 'Fateh','Y', '2012-04-11')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DELETE FROM potluck WHERE name='Huzaifa'";

if ($conn->query($sql) === TRUE) {
    echo "Record(s) deleted successfully<br>";
} else {
    echo "Error deleting record(s): " . $conn->error."<br>";
}
*/
$conn->close();

?>

</body>
</html> 
