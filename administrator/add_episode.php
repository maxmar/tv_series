<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 12:49 AM
 */

include_once('../includes/index.php');

if(!User::GetUserState()) { header("location: index.php"); }
if(!$_GET['season_id']) { header("location: index.php"); }
$season_id = $_GET['season_id'];
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen,projection"  />
    <title>Administrator</title>
</head>

<body>
<?php if(isset($_GET['episode_id'])): $episode_id = (int)$_GET['episode_id']; ?>
    <form action="AddEpisodeController.php" method="post" enctype="multipart/form-data">

        <?php $episode = DB::Select("*","episodes","id='{$episode_id}'"); ?>
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
                <td><input name="title" type="text" value="<?php echo $episode[0]->title; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input name="season_id" value="<?php echo $season_id; ?>" hidden="hidden" />
                    <input name="episode_id" value="<?php echo $episode_id; ?>" hidden="hidden" />
                    <input type="submit" value="Add">
                </td>
            </tr>
    </form>

<?php else: ?>

<form action="AddEpisodeController.php" method="post" enctype="multipart/form-data">
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
            <td colspan="2">
                <input name="season_id" value="<?php echo $season_id; ?>" hidden="hidden" />
                <input type="submit" value="Add">
            </td>
        </tr>

<?php endif; ?>

</body>
</html>