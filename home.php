<form method="POST">
<input name="domain" placeholder="google.com">
<input type="submit" name="submit" value="Ping!" />
</form>
<?php
// This code is vulnerable to Server-Side Request Forgery and Command Injection!
// SSRF: The server makes a request, so we can see if hosts beyond any firewalls are up.
// Command Injection: The $_POST["domain"] variable is concatenated with the command string.
// Consider what would happen if we set:
// $_POST["domain"] = "; cat /etc/passwd"
if (isset($_POST["domain"])) {
  $output = shell_exec('ping -c 1 ' . $_POST["domain"]);
  if (strcmp($output, "") != 0) {
    echo "<br><b>" .  $_POST["domain"] . " looks up!<br></b>";
    echo "Here's some detailed information:<br>";
    echo $output;
  }
}
?><br><br>
<a href="/?page=admin.php"><button>Admin login</button></a>
