<?php

namespace App\Http\Controllers;

use App\SP;
use Illuminate\Http\Request;
use App\Plan_cinema;

class IndexAjaxController extends Controller
{
    //
    public function postLoadDate(Request $request)
    {
        if ($request->ajax()) {
            $id_movie = $request->movie;
            $msg = "";
            $datenow = date("Y-m-d");
            $plan = Plan_cinema::select('show_date')->where('movie_id', $id_movie)->where('show_date','>=',$datenow)->groupBy('show_date')->get();
            $i = 0;
            if (count($plan) == 0)
                $msg .= "<-!->0<-!->";
            else {
                foreach ($plan as $detail) {
                    $day = date_format(date_create($detail->show_date), 'd');
                    $month = date_format(date_create($detail->show_date), 'm');
                    $thu = date_format(date_create($detail->show_date), 'D');
                    if ($i == 0) {
                        $msg .= "<input onchange='loadProjector()' type=\"radio\" name=\"date\" id=\"date_{$detail->show_date}\" value=\"{$detail->show_date}\" checked>
                        <label for=\"date_{$detail->show_date}\" ><span>{$day}</span>/{$month} - {$thu}</label>";
                    } else {
                        $msg .= "<input onchange='loadProjector()' type=\"radio\" name=\"date\" id=\"date_{$detail->show_date}\" value=\"{$detail->show_date}\">
                        <label for=\"date_{$detail->show_date}\" ><span>{$day}</span>/{$month} - {$thu}</label>";
                    }
                    $i++;
                }
            }
            $msg .= "";
            echo $msg;
        }
    }

    public function postLoadProjector(Request $request)
    {
        if ($request->ajax()) {
            $id_movie = $request->movie;
            $date = $request->date;
            $msg = "";
            $plan_proj = Plan_cinema::select('type_projector_id')->where('movie_id', $id_movie)->where('show_date', $date)->groupBy('type_projector_id')->get();
            if (count($plan_proj) == 0)
                $msg .= "";
            else
                foreach ($plan_proj as $i => $detail) {
                    if ($i == 0) {
                        $msg .= "<input onchange='loadPlan()' type=\"radio\" name=\"projector\" id=\"projector_{$detail->type_projector_id}\" value=\"{$detail->type_projector_id}\" checked>
                        <label for=\"projector_{$detail->type_projector_id}\" class=\"\">{$detail->type_projector->name}</label>";
                    } else {
                        $msg .= "<input onchange='loadPlan()' type=\"radio\" name=\"projector\" id=\"projector_{$detail->type_projector_id}\" value=\"{$detail->type_projector_id}\">
                        <label for=\"projector_{$detail->type_projector_id}\" class=\"\">{$detail->type_projector->name}</label>";
                    }
                }
            echo $msg;
        }
    }

    public function postLoadPlan(Request $request)
    {
        if ($request->ajax()) {
            $id_movie = $request->movie;
            $date = $request->date;
            $proj = $request->projector;
            $msg = "";
//            if (strtotime($date) == strtotime($date_now)) {
//                $plan_proj = Plan_cinema::where('movie_id', $id_movie)
//                    ->where('show_date', $date)
//                    ->where('type_projector_id', $proj)
//                    ->where('time_begin', '>=', $time_now)
//                    ->get();
//            } else {
//                $plan_proj = Plan_cinema::where('movie_id', $id_movie)
//                    ->where('show_date', $date)
//                    ->where('type_projector_id', $proj)
////                    ->OrWhere('time_begin', '>=', $time_now)
//                    ->get();
//            }
            $plan_proj = SP::getPlanCinemaByMovie($id_movie, $date, $proj);
            if (count($plan_proj) == 0)
                $msg .= "";
            else {
                $cinemas = SP::getCinemaGroupBy($id_movie, $proj, $date);
                foreach ($cinemas as $value) {
                    $msg .= "<div class=\"col-md-12\" style=\"margin-bottom: 20px\">";
                    $msg .= "<p style=\"color: #333333; font-size: 20px; font-weight: 400; padding-bottom: 10px\">{$value->cinema_name}</p><ul>";
                    foreach ($plan_proj as $detail) {
                        if ($detail->cinema_id == $value->cinema_id) {
                            $date = date_format(date_create($detail->show_date), "Ymd");
                            $time = date_format(date_create($detail->time_begin), "H:i");
                            $msg .= "<li>";
                            $msg .= "<a href='" . route("index.booking.get", ["id" => $detail->id, "date" => $date]) . "' class='btn'>{$time}</a><br/>";
                            $msg .= "<span style='font-size: 13px'>" . Plan_cinema::GetSeatNone($detail->id) . " ghế trống</span>";
                            $msg .= "</li>";
                        }
                    }
                    $msg .= "</ul></div>";
                }
            }
            echo $msg;
        }
    }
}
