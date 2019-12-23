<?php

namespace App\Http\Controllers;

use App\Cinema;
use App\Room;
use App\Seat;
use App\View_room;
use Illuminate\Http\Request;
use Validator;

class AdminRoomController extends Controller
{
    //
    public function getAddRoom($id) {
        //code here
        $cinemas = Cinema::all();
        $view_rooms = View_room::all();
        if ($id == 0)
            return view("admin.room.form",compact('cinemas','view_rooms'));
        else {
            $room = Room::find($id);
            return view("admin.room.form", compact('cinemas','view_rooms','room'));
        }
    }

    public function getListRoom() {
        //code here
        $rooms = Room::all();
        return view("admin.room.list",compact("rooms"));
    }

    public function postAddRoom($id, Request $request) {
        $messages = [
            'name.required' => 'Chưa nhập tên phòng chiếu.',
        ];
        $rules = [
            'name' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('cms.room.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }

        $name = $request->name;
        $cinema_id = $request->cinema_id;
        $view_id = $request->view_id;
        if ($id == 0) {
            $room = new Room();
        } else {
            $room = Room::find($id);
        }

        $room->name = $name;
        $room->cinema_id = $cinema_id;
        $room->view_id = $view_id;
        $room->save();
        $id_room = $room->id;
        if ($id == 0) {
            $view_room = View_room::find($view_id);
            $rows = $view_room->row;
            $cols = $view_room->col;
            $rows = explode(",",$rows);
            $cols = explode(",",$cols);
            for ($i = 0; $i < count($rows); $i++) {
                if ($rows[$i] != "") {
                    for ($j = 0; $j < count($cols); $j++) {
                        if ($cols[$j] != "") {
//                            echo $rows[$i] . "_" . $cols[$j] . "<br/>";
                            $seat = new Seat();
                            $seat->row_name = $rows[$i];
                            $seat->col_name = $cols[$j];
                            $seat->room_id = $id_room;
                            $seat->save();
                        }
                    }
                }
            }
        }
        return redirect()->route("cms.room.form.get",[$id_room])->with("success","Lưu lại thành công");
    }
}
