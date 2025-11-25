<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Request Help</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Request Help</h2>

<form method="POST" action="">
  <input type="text" name="name" placeholder="Your Name" required>
  <input type="email" name="email" placeholder="Your Email" required>
  
  <select name="category" required>
    <option value="">Select Category</option>
    <option value="Food">Food</option>
    <option value="Medical">Medical</option>
    <option value="Education">Education</option>
    <option value="Other">Other</option>
  </select>

  <textarea name="description" placeholder="Describe your need..." required></textarea>
  <button type="submit" name="submit">Submit Request</button>
</form>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $category = $_POST['category'];
  $description = $_POST['description'];

  $sql = "INSERT INTO requests (name, email, category, description) 
          VALUES ('$name', '$email', '$category', '$description')";

  if ($conn->query($sql) === TRUE) {
    echo "<p class='success'>✅ Request submitted successfully!</p>";
  } else {
    echo "<p class='error'>❌ Error: " . $conn->error . "</p>";
  }
}
$conn->close();
?>


</body>
</html>

