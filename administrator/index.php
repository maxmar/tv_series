<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/14/14
 * Time: 1:54 PM
 */

include_once('../includes/index.php');
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen,projection"  />
    <title>Administrator</title>
</head>

<body>
    <?php if(!User::GetUserState()): ?>

    <form id="auth" action="auth.php" method="post">
        <table>
            <tr>
                <td class="aut_top">
                    <center>
                        <font class="aut">Administrator</font>
                    </center>
                </td>
            </tr>
            <tr>
                <td class="inp">
                    <font class="inp">Login:</font>
                    <input name="login" type="text" class="inp">
                </td>
            </tr>
            <tr>
                <td class="inp">
                    <font class="inp">Password:</font>
                    <input name="password" type="password" class="inp">
                </td>
            </tr>
            <tr>
                <td class="aut_button">
                    <center>
                        <input class="button" name="auth_button" type="submit" value="Login">
                    </center>
                </td>
            </tr>
        </table>
    </form>

    <?php else: ?>
        <table id="tv_series">
            <tr id="f_line">
                <td class="title">
                    <h1>Title</h1>
                </td>
                <td class="desc">
                    <h1>Description</h1>
                </td>
                <td class="date">
                    <h1>Date</h1>
                </td>
            </tr>
            <tr id="s_line">
                <td colspan="2">
                    <a href="add_serie.php">Add series</a>
                </td>
                <td>
                    <a href="auth.php?logout=1" id="exit">Logout</a>
                </td>
            </tr>
            <?php

            $series = DB::Select("*","series",NULL,"ORDER BY id DESC");
            $i = 0;
            while($value = $series[$i++]):
            ?>
            <tr>
                <td class="title">
                    <a href="add_serie.php?series_id=<?php echo $value->id; ?>"><?php echo $value->title; ?></a>
                </td>
                <td class="desc">
                    <p><?php echo $value->description ; ?></p>
                </td>
                <td class="date">
                    <p><?php echo $value->date; ?></p>
                </td>
            </tr>
            <?php endwhile; ?>

        </table>
    <?php endif; ?>
</body>
</html>