<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Offer Help</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Offer Help</h2>

<form method="POST" action="">
  <input type="text" name="name" placeholder="Your Name" required>
  <input type="email" name="email" placeholder="Your Email" required>
  <input type="text" name="help_type" placeholder="Type of Help (e.g. Tutoring, Food)" required>
  <input type="text" name="availability" placeholder="Availability (e.g. Weekends, Anytime)" required>
  <button type="submit" name="submit">Register as Volunteer</button>
</form>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $help_type = $_POST['help_type'];
  $availability = $_POST['availability'];

 $sql = "INSERT INTO volunteers (name, email, help_type, availability)
          VALUES ('$name', '$email', '$help_type', '$availability')";

  if ($conn->query($sql) === TRUE) {
    echo "<p class='success'>✅ Thank you! You’ve registered as a volunteer.</p>";
  } else {
    echo "<p class='error'>❌ Error: " . $conn->error . "</p>";
  }
}
$conn->close();
?>

</body>
</html>