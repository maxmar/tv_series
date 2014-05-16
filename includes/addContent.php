<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/14
 * Time: 10:32 PM
 */

class AddContent {
    static private function LoadImg($img){

    }
    static public function AddSerie($title,$description,$date = NULL,$img = NULL,$serie_id = NULL){
        $title = trim($title);
        $description = trim($description);
        $title = stripslashes($title);
        $description = stripslashes($description);
        $title = htmlspecialchars($title);
        $description = htmlspecialchars($description);

        if(isset($serie_id)){
            DB::Update("series",array("title","description","date"),array($title,$description,$date),$serie_id);
        } else {
            DB::Insert("series",array("title","description","date"),array($title,$description,$date));
        }
    }
    static public function AddSeason($title,$serie_id,$date_start = NULL,$date_finish = NULL,$season_id = NULL){
        $title = trim($title);
        $title = stripslashes($title);
        $title = htmlspecialchars($title);

        if(isset($season_id)){
            DB::Update("seasons",array("title","series_id","date_start","date_finish"),array($title,$serie_id,$date_start,$date_finish),$season_id);
        } else {
            DB::Insert("seasons",array("title","series_id","date_start","date_finish"),array($title,$serie_id,$date_start,$date_finish));
        }
    }
    static public function AddEpisode($title,$season_id,$episode_id = NULL){
        $title = trim($title);
        $title = stripslashes($title);
        $title = htmlspecialchars($title);

        if(isset($episode_id)){
            DB::Update("episodes",array("title","season_id"),array($title,$season_id),$episode_id);
        } else {
            DB::Insert("episodes",array("title","season_id"),array($title,$season_id));
        }
    }
} 