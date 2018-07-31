<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

<!-- $name and $colours variables are available because they've been passed into
    View->Render() by Home->indexAction(), then the extract() function converted
    the array keys into variable names and the array values into variable values. -->

  <p>Hello <?php echo htmlspecialchars($name); ?>!</p>

  <ul>
      <?php foreach ($colours as $colour): ?>
          <li><?php echo htmlspecialchars($colour); ?></li>
      <?php endforeach; ?>
  </ul>
</body>
</html>
