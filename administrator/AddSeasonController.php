<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 1:22 PM
 */
include_once("../includes/index.php");

if(empty($_POST['title']) || empty($_POST['date_start']) || empty($_POST['date_finish']) || empty($_POST['series_id'])){
    header("location: ".$_SERVER['HTTP_REFERER']);
}

if(isset($_POST['season_id'])){
    AddContent::AddSeason($_POST['title'],$_POST['series_id'],$_POST['date_start'],$_POST['date_finish'],$_POST['season_id']);
} else {
    AddContent::AddSeason($_POST['title'],$_POST['series_id'],$_POST['date_start'],$_POST['date_finish']);
}

header("location: index.php");