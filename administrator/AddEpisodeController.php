<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 1:22 PM
 */
include_once("../includes/index.php");

if(empty($_POST['title']) || empty($_POST['season_id'])){
    header("location: ".$_SERVER['HTTP_REFERER']);
}

if(isset($_POST['episode_id'])){
    AddContent::AddEpisode($_POST['title'],(int)$_POST['season_id'],(int)$_POST['episode_id']);
} else {
    AddContent::AddEpisode($_POST['title'],(int)$_POST['season_id']);
}

header("location: index.php");