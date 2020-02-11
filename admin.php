<h1>Admin login</h1>
<?php
$db = mysqli_connect("localhost:3306", "root", "root", "backend-demo");

// This query is vulnerable to MySQL injection!
// $_POST["usermame"] grabs the inputted strings and concatenates to the query (without escaping!
// What would happen if we set:
// $_POST["usermame"] = "' OR 1=1; -- "
$sql = "SELECT (username) FROM users WHERE username = '" . $_POST["username"] . "' and password = '" . $_POST["password"] . "';";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);
if ($db->error != NULL) {
  echo "<b>SQL Error: </b>" . $db->error . "<br><br>";
}
if ($count > 0) {
  echo "Welcome, admin! You have logged in!<br><br>MySQL Query: " . $sql;
} else {
?>
<form method="POST">
  <input name="username" placeholder="Username" />
  <input name="password" placeholder="Password" />
  <input type="submit" name="submit" value="Login" />
</form>
<?php } ?>