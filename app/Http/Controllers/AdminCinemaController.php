<?php

namespace App\Http\Controllers;

use App\Cinema;
use App\Province;
use Illuminate\Http\Request;
use Validator;

class AdminCinemaController extends Controller
{
    //
    public function getAddCinema($id) {
        $provinces = Province::all();
        if ($id == 0) {
            return view("admin.cinema.form", compact('provinces'));
        }
        else {
            $cinema = Cinema::find($id);
            return view("admin.cinema.form",compact('cinema', 'provinces'));
        }
    }

    public function postAddCinema($id, Request $request) {
        $messages = [
            'name.required' => 'Chưa nhập tên rạp chiếu.',
            'province.required' => 'Chưa chọn tỉnh/thành phố.',
            'address.required' => 'Chưa nhập địa chỉ.',
            'address.min' => 'Địa chỉ quá ngắn.',
            'address.max' => 'Địa chỉ quá dài.',
            'phone.required' => 'Chưa nhập SDT.',
            'phone.max' => 'SDT không đúng định dạng.',
        ];
        $rules = [
            'name' => 'required',
            'province' => 'required',
            'address' => 'required|min:3|max:50',
            'phone' => 'required|max:12',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('cms.cinema.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }
        $name = $request->name;
        $province = $request->province;
        $address = $request->address;
        $phone = $request->phone;
        if ($id == 0) {
            $cinema = new Cinema();
            $cinema->name = $name;
            $cinema->province_id = $province;
            $cinema->address= $address;
            $cinema->phone = $phone;
            $cinema->save();
            return redirect()->route('cms.cinema.form.get',[$id])->with('success','Thêm rạp chiếu thành công');
        }
        else {
            $cinema = Cinema::find($id);
            $cinema->name = $name;
            $cinema->province_id = $province;
            $cinema->address= $address;
            $cinema->phone = $phone;
            $cinema->save();
            return redirect()->route('cms.cinema.form.get',[$id])->with('success','Sửa rạp chiếu thành công');
        }
    }

    public function getListCinema() {
        //lay danh sach cinema
        $cinemas = Cinema::all();
        return view("admin.cinema.list",compact('cinemas'));
    }
}
