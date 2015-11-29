<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Deconnection</title>
</head>

<body>
<?php
session_start();
session_destroy();
?>
<script>
location.href="../index.html";
</script>
</body>
</html>