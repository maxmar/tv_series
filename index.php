<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/14/14
 * Time: 1:54 PM
 */
include_once("includes/index.php");

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen,projection"  />
    <title>TV series</title>
</head>

<body>

<div id="content">
    <?php
    $series = DB::Select("id,title","series");
    $i = 0;
    while($value = $series[$i++]): ?>
        <div>
            <a href="details.php?serie_id=<?php echo $value->id; ?>" > <?php echo $value->title; ?></a>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>