<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 12:49 AM
 */

include_once('includes/index.php');

if(empty($_GET['serie_id'])){ header("location: index.php"); }
$serie_id = $_GET['serie_id'];
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen,projection"  />
    <title>Administrator</title>
</head>

<body>
<table id="tv_series">
    <tr id="s_line">
        <td colspan="2">
            <a href="index.php">Back</a>
        </td>
    </tr>
    <?php
    $serie = DB::Select("*","series","id='{$serie_id}'");
    if(!count($serie)) { echo "404"; die(); }
    ?>
    <tr>
        <td><p>Title:</p></td>
        <td><?php echo $serie[0]->title; ?></td>
    </tr>
    <tr>
        <td><p>Description:</p></td>
        <td><?php echo $serie[0]->description; ?></td>
    </tr>
    <tr>
        <td><p>Date:</p></td>
        <td><?php echo $serie[0]->date; ?></td>
    </tr>
            <tr>
                <td colspan="2">
                    <ol>


                        <?php
                        $seasons = DB::Select("*","seasons","series_id='{$serie_id}'");
                        $i = 0;
                        while($value = $seasons[$i++]):
                            ?>
                            <li><?php echo $value->title." (".$value->date_start." -- ".$value->date_finish.")"; ?>
                                <ul>
                                    <?php
                                    $episodes = DB::Select("id,title","episodes","season_id='{$value->id}'");
                                    $j = 0;
                                    while($valueEp = $episodes[$j++]):
                                        ?>

                                        <li><?php echo $valueEp->title; ?></li>

                                    <?php endwhile; ?>
                                </ul>
                            </li>
                        <?php endwhile; ?>

                    </ol>
                </td>
            </tr>
    </table>


</body>
</html>