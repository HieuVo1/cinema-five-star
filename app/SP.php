<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SP extends Model
{
    /**
     * Get view room by plan id
     *
     * @param  int $plan_id
     * @return View_room
     */
    public static function getViewByPlan($plan_id) {
        $view_room = DB::select("CALL `get_view_by_plan`($plan_id)");
        return $view_room;
    }

    public static function getNSMovies() {
        return DB::select("CALL `get_movies_now_showing`()");
    }

    public static function getCSMovies() {
        return DB::select("CALL `get_movies_coming_soon`()");
    }

    public static function getCinemaGroupBy($movie_id, $proj_id, $date) {
        $cinemas = DB::select("CALL `get_cinema_with_plan`($movie_id, $proj_id, '$date')");
        return $cinemas;
    }

    public static function getPlanCinemaByMovie($movie_id, $date, $proj_id) {
        return DB::select("CALL `get_plan_cinema_by_movie`({$movie_id},'{$date}',{$proj_id})");
    }

    public static function getInfoCinemaByRoom($room_id) {
        return DB::select("CALL `get_info_cinema_by_room`({$room_id})");
    }

    public static function checkPlanCinema($plan_id) {
        return DB::select("CALL `check_plan_cinema_status`({$plan_id})");
    }

    public static function getFullInfoPlan($plan_id) {
        return DB::select("CALL `get_full_info_plan_by plan`({$plan_id})");
    }
}
