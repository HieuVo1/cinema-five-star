<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan_cinema;
use App\Movie;
use App\Type_projector;
use App\Room;
use Validator;
class AdminShowTimeController extends Controller
{
    //
    public function getForm($id) {
        //

        $movies = Movie::all();
        $type_projectors=Type_projector::all();
        $rooms = Room::all();
        if ($id == 0)
            return view("admin.showtime.form",compact('movies','type_projectors','rooms'));
        else {
            $showtime = Plan_cinema::find($id);
            return view("admin.showtime.form", compact('movies','type_projectors','rooms','showtime'));
        }
    }

    public function getList() {
        //
        $showtime = Plan_cinema::all();
        return view("admin.showtime.list",compact("showtime"));
    }

    public function postForm($id, Request $request) {
        //


        $name = $request->name;
        $cinema_id = $request->cinema_id;
        $view_id = $request->view_id;
        if ($id == 0) {
            $showtime = new Plan_cinema();
        } else {
            $showtime = Plan_cinema::find($id);
        }

        $showtime->show_date = $request->show_date;
        $showtime->time_begin = $request->time_begin;
        $showtime->movie_id = $request->movie_id;
        $showtime->room_id = $request->room_id;
        $showtime->type_projector_id = $request->type_projector_id;
        $showtime->save();
        $id_showtime = $showtime->id;
        return redirect()->route("cms.showtime.form.get",[$id_showtime])->with("success","Lưu lại thành công");
    
    }
}
