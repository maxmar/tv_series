<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 12:49 AM
 */

include_once('../includes/index.php');

if(!User::GetUserState()) { header("location: index.php"); }
if(!$_GET['serie_id']) { header("location: index.php"); }
$serie_id = $_GET['serie_id'];
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../style.css" type="text/css" media="screen,projection"  />
        <title>Administrator</title>
    </head>

    <body>
    <?php if(isset($_GET['season_id'])): $season_id = (int)$_GET['season_id']; ?>
        <form action="AddSeasonController.php" method="post" enctype="multipart/form-data">

            <?php $season = DB::Select("*","seasons","id='{$season_id}'"); ?>
            <table id="tv_series">
                <tr id="s_line">
                    <td>
                        <a href="index.php">Home</a>
                        <a href="add_episode.php?season_id=<?php echo $season_id; ?>">Add episode</a>
                    </td>
                    <td>
                        <a href="auth.php?logout=1" id="exit">Logout</a>
                    </td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><input name="title" type="text" value="<?php echo $season[0]->title; ?>" /></td>
                </tr>
                <tr>
                    <td>Date begin:</td>
                    <td><input name="date_start" type="date" value="<?php echo $season[0]->date_start; ?>"></td>
                </tr>
                <tr>
                    <td>Date end:</td>
                    <td><input name="date_finish" type="date" value="<?php echo $season[0]->date_finish; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input name="series_id" value="<?php echo $serie_id; ?>" hidden="hidden" />
                        <input name="season_id" value="<?php echo $season_id; ?>" hidden="hidden" />
                        <input type="submit" value="Add">
                    </td>
                </tr>
                <tr id="f_line"></tr>
                <tr>
                    <td colspan="2">
                        <ol>

                            <?php
                            $episodes = DB::Select("*","episodes","season_id='{$season_id}'");
                            $j = 0;
                            while($valueEp = $episodes[$j++]):
                            ?>

                                <li>
                                    <a href="add_episode.php?season_id=<?php echo $season_id; ?>&episode_id=<?php echo $valueEp->id; ?>">
                                        <?php echo $valueEp->title; ?>
                                    </a>
                                </li>

                            <?php endwhile; ?>
                        </ol>
                    </td>
                </tr>
        </form>

    <?php else: ?>

        <form action="AddSeasonController.php" method="post" enctype="multipart/form-data">

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
                    <td>Date begin:</td>
                    <td><input name="date_start" type="date"></td>
                </tr>
                <tr>
                    <td>Date end:</td>
                    <td><input name="date_finish" type="date"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input name="series_id" value="<?php echo $serie_id; ?>" hidden="hidden" />
                        <input type="submit" value="Add">
                    </td>
                </tr>
        </form>

    <?php endif; ?>

    </body>
</html>