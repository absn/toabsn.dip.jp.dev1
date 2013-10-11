<html>
<head>
<script type="text/javascript" src="../../js/load.js"></script>
</head>
<body onload="alert('debug');loadEffect('e');">

<div id="e" style="position:absolute;background-color:red;width:1020px;height:920px"></div>
 <?php
if ($_SERVER['REQUEST_URI'] == '/') {
	header("HTTP/1.1 301 Moved Permanently");
        header("Location: http://toabsn.dip.jp/cakephp/todopp/");
        exit();
}
?>
</body>
</html>
