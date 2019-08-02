<?php

namespace App\Http\Controllers;
use DB;
use App\classes;
use App\Degree;
use Illuminate\Http\Request;

class ClassSubjController extends Controller
{
    public function AddClass()
    {
        return view('classviews.addclass');
    }

    public function InsertClass()
    {
        $class = new Degree();

        $class->name = request('name');
        $class->description = request('description');
        $class->typeId = request('typeId');
        $class->year = request('year');

        $class->save();

        return redirect('classtable');
    }

    public function ClassTable()
    {
        $degrees = DB::select('select * from degrees');
        return view('classviews.classtable', ['degrees'=>$degrees]);
    }

    public function DeleteDegree($id)
    {
        $degrees = DB::select('delete from degrees where id=?',[$id]);
        return view('classviews.classtable' , ['degrees'=>$degrees]);
    }
}
