<?php

namespace App\Http\Controllers;

use App\Type_seat;
use App\View_room;
use Illuminate\Http\Request;
use Validator;

class AdminViewRoomController extends Controller
{
    //
    protected function DetailView($viewroom)
    {
        $arr_rows = explode(",", $viewroom);
        $arrview = array();
        $cols = "";
        $rows = "";
        $begin_row = "A";
        $begin_col = "1";
        $status = true;

        $empty_row = "";
        for ($i = 0; $i < strlen($arr_rows[0]); $i++) {
            $empty_row .= "_";
        }


        for ($i = 0; $i < count($arr_rows); $i++) {
            if ($empty_row == $arr_rows[$i]) {
                $rows .= ",";
            } else {
                $rows .= $begin_row++ . ",";
            }
        }

        $c = 0;
        $r = 0;
        $max_seat = 0;
        for ($i = 0; $i < count($arr_rows); $i++) {
            for ($j = 0; $j < strlen($arr_rows[$i]); $j++) {
                $arrview[$i][$j] = $arr_rows[$i][$j];
                if ($arrview[$i][$j] != "_")
                    $max_seat++;
            }
            $c = strlen($arr_rows[$i]);
            $r++;
        }
        for ($i = 0; $i < $c; $i++) {
            $count_col = 0;
            for ($j = 0; $j < $r; $j++) {
                if ($arrview[$j][$i] == "_")
                    $count_col++;
            }
            if ($count_col == $r)
                $cols .= ",";
            else
                $cols .= $begin_col++ . ",";
        }
//        echo  $cols;
        $return = array();
        $return['status'] = $status;
        $return['col'] = $cols;
        $return['row'] = $rows;
        $return['max_seat'] = $max_seat;
        return $return;
    }

    public function getForm($id)
    {
        $type_seats = Type_seat::where('id','>',2)->get();
        if ($id == 0)
            return view("admin.viewroom.form", compact('type_seats'));
        else {
            $viewroom = View_room::find($id);
            return view("admin.viewroom.form", compact('viewroom','type_seats'));
        }
    }

    public function postForm($id, Request $request)
    {
        $messages = [
            'view.required' => 'Chưa nhập mẫu phòng chiếu.',
        ];
        $rules = [
            'view' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('cms.movie.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }
        $viewroom = $request->view;
//        $viewroom = "aa_bb,aa_aa,_a_a_,_____,aa_aa";
        $viewroom = preg_replace( "/(\r|\n)/", "", $viewroom );
        $return_view = $this->DetailView($viewroom);
        if ($return_view['status'] != true) {
            array_push($errors, "Định dạng view bị sai");
            return redirect()
                ->route('cms.viewroom.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        } else {
            if ($id == 0)
                $view_room = new View_room();
            else {
                $view_room = View_room::find($id);
            }

            $view_room->view = $viewroom;
            $view_room->col = rtrim($return_view['col'],",");
            $view_room->row = rtrim($return_view['row'],",");
            $view_room->max_seat = $return_view['max_seat'];
            $view_room->save();
            $id = $view_room->id;
            return redirect()->route("cms.viewroom.form.get", [$id])->with("success", "Lưu lại thành công");
        }

    }

    public function getList()
    {
        $viewrooms = View_room::all();
        return view("admin.viewroom.list", compact("viewrooms"));
    }
}
