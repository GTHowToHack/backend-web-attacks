<html>
<body>
<h1>PingTest.com</h1>
<hr>
<?php

// This code is vulnerable to Directory Traversal!
// $_GET["page"] is passed directly into require(), which loads a file and pastes it into the response.
// What would happen if we set:
// $_GET["page"] = '../../../../../../etc/passwd'
if (!isset($_GET["page"])) {
  require('home.php');
} else {
  require($_GET["page"]);
}

?>
</body>
</html>