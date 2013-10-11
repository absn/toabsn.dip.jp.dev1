<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo h($title_for_layout); ?></title>
<?php echo $html->css('cake.generic');?>
</head>
<body>
  <div id="container">
    <div id="header">
      <h3>ToDo App</h3>
    </div>
    <div id="content">
      <?php echo $content_for_layout; ?>
    </div>
  </div>
</body>
</html>

