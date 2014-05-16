<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 12:49 AM
 */

include_once('../includes/index.php');

if(!User::GetUserState()) { header("location: index.php"); }
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../style.css" type="text/css" media="screen,projection"  />
        <title>Administrator</title>
    </head>

    <body>
    <?php if(isset($_GET['series_id'])): $series_id = (int)$_GET['series_id']; ?>
        <form action="AddSerieController.php" method="post" enctype="multipart/form-data">

            <?php $serie = DB::Select("*","series","id='{$series_id}'"); ?>
            <table id="tv_series">
                <tr id="s_line">
                    <td>
                        <a href="index.php">Home</a>
                        <a href="add_season.php?serie_id=<?php echo $series_id; ?>">Add season</a>
                    </td>
                    <td>
                        <a href="auth.php?logout=1" id="exit">Logout</a>
                    </td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><input name="title" type="text" value="<?php echo $serie[0]->title; ?>" /></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="desc"><?php echo $serie[0]->description; ?></textarea> </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input name="date" type="date" value="<?php echo $serie[0]->date; ?>"></td>
                </tr>
                <tr>
                    <td>Img:</td>
                    <td>
                        <img src="../<?php echo $serie[0]->img; ?>" style="width: 100px; height: 60px"/>
                        <input type="file" name="filename" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input name="series_id" value="<?php echo $series_id; ?>" hidden="hidden" />
                        <input type="submit" value="Add">
                    </td>
                </tr>
                <tr id="f_line"></tr>
                <tr>
                    <td colspan="2">
                        <ol>


                            <?php
                            $seasons = DB::Select("id,title","seasons","series_id='{$series_id}'");
                            $i = 0;
                            while($value = $seasons[$i++]):
                                ?>
                                <li>
                                    <a href="add_season.php?serie_id=<?php echo $series_id; ?>&season_id=<?php echo $value->id; ?>" >
                                        <?php echo $value->title; ?>
                                    </a>
                                    <ul>
                                        <?php
                                        $episodes = DB::Select("id,title","episodes","season_id='{$value->id}'");
                                        $j = 0;
                                        while($valueEp = $episodes[$j++]):
                                            ?>

                                            <li>
                                                <a href="add_episode.php?season_id=<?php echo $value->id; ?>&episode_id=<?php echo $valueEp->id; ?>">
                                                    <?php echo $valueEp->title; ?>
                                                </a>
                                            </li>

                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                            <?php endwhile; ?>

                        </ol>
                    </td>
                </tr>
        </form>

    <?php else: ?>

        <form action="AddSerieController.php" method="post" enctype="multipart/form-data">

            <table id="tv_series">
                <tr id="s_line">
                    <td>
                        <a href="index.php">Home</a>
                    </td>
                    <td>
                        <a href="auth.php?logout=1" id="exit">Logout</a>
                    </td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><input name="title" type="text" /></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="desc"></textarea> </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input name="date" type="date"></td>
                </tr>
                <tr>
                    <td>Img:</td>
                    <td><input type="file" name="filename" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Add"></td>
                </tr>
        </form>

    <?php endif; ?>

    </body>
</html>