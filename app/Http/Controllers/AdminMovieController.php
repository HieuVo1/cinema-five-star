<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Validator;

class AdminMovieController extends Controller
{
    //
    public function getForm($id) {
        if ($id == 0) {
            return view("admin.movie.form");
        } else {
            $movie = Movie::find($id);
            return view("admin.movie.form",compact('movie'));
        }
    }

    public function getList() {
        $movies = Movie::orderBy("id","DESC")->get();
        return view("admin.movie.list", compact("movies"));
    }

    public function postForm($id, Request $request) {
        $messages = [
            'name.required' => 'Chưa nhập tên phim.',
            'image.required' => 'Chưa có ảnh phim.',
            'duration.numeric' => 'Thời lượng phải là số (phút).',
            'link_trailer' => 'Chưa có trailer.',
            'genre.required' => 'Chưa có thể loại.',
            'release_date.required' => 'Chưa có ngày khởi chiếu.',
            'rated.required' => 'Chưa chọn độ tuổi quy định.',
            'rated.numeric' => 'Độ tuổi quy định phải là số.',
        ];
        $rules = [
            'name' => 'required',
            'image' => 'required',
            'duration' => 'nullable|numeric',
            'link_trailer' => 'required',
            'director' => 'nullable',
            'cast' => 'nullable',
            'genre' => 'required',
            'language' => 'nullable',
            'release_date' => 'required',
            'rated' => 'required|numeric',
            'content' => 'nullable',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('cms.movie.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }

        $name = $request->name;
        $image = $request->image;
        $duration = $request->duration?:"";
        $link_trailer = $request->link_trailer;
        $director = $request->director?:"";
        $cast = $request->cast?:"";
        $genre = $request->genre;
        $language = $request->language?:"";
        $release_date = $request->release_date;
        $rated = $request->rated;
        $content = $request->content_movie?:"";

        if ($id == 0) {
            $movie = new Movie();
        } else {
            $movie = Movie::find($id);
        }

        $movie->name = $name;
        $movie->slug_name = str_slug($name);
        $movie->image = $image;
        $movie->duration = $duration;
        $movie->link_trailer = $link_trailer;
        $movie->director = $director;
        $movie->cast = $cast;
        $movie->genre = $genre;
        $movie->language = $language;
        $movie->release_date = $release_date;
        $movie->rated = $rated;
        $movie->content = $content;
        $movie->save();
        $id = $movie->id;
        return redirect()->route("cms.movie.form.get",[$id])->with("success","Lưu lại thành công");
    }
}
