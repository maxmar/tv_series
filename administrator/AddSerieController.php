<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 1:22 PM
 */
include_once("../includes/index.php");

if(empty($_POST['title']) || empty($_POST['desc']) || empty($_POST['date'])){
    header("location: ".$_SERVER['HTTP_REFERER']);
}

if(isset($_POST['series_id'])){
    AddContent::AddSerie($_POST['title'],$_POST['desc'],$_POST['date'],NULL,$_POST['series_id']);
} else {
    AddContent::AddSerie($_POST['title'],$_POST['desc'],$_POST['date']);
}

header("location: index.php");