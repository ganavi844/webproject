 <?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>View Requests</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Help Requests</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Category</th>
    <th>Description</th>
    <th>Date</th>
  </tr>

<?php
$sql = "SELECT * FROM requests ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['category']."</td>
            <td>".$row['description']."</td>
            <td>".$row['created_at']."</td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='5'>No requests yet.</td></tr>";
}
$conn->close();
?>
</table>
<!-- 🧴 Secret Chatbot in a Bottle -->
<div id="mystery-bottle" title="Psst... Click the bottle!"></div>

<div id="chat-popup" class="hidden">
  <div id="chat-header">💬 Whispering Bottle
    <span id="close-chat">&times;</span>
  </div>
  <div id="chat-body"></div>
  <div id="chat-input-area">
    <input type="text" id="user-input" placeholder="Ask the bottle..." />
    <button id="send-btn">Send</button>
  </div>
</div>

<script src="chatbot.js"></script>
</body>
</html>
