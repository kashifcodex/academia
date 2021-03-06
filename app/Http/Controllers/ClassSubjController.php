<?php
 
namespace App\Http\Controllers;
use DB;
use App\classes;
use App\Degree;
use Illuminate\Http\Request;

class ClassSubjController extends Controller
{
    public function AddSubject()
    {
        return view('classviews.addsubject');
    }

    public function AddChapter()
    {
        return view('classviews.addchapter');
    }

    //*********************************************************
//    public function AddMCQS()
//    {
//        return view('classviews.addmcqs');
//    }

    //*********************************************************
    //************Controllers for showing all data*************
    public function AllClasses()
    {
        return view('classviews.allclasses');
    }

    //*********************************************************
    public function AllSubjects()
    {
        return view('classviews.allsubjects');
    }

    //*********************************************************
    public function AllChapters()
    {
        return view('classviews.allchapters');
    }

    //*********************************************************
    public function AllMcqs()
    {
        return view('classviews.allmcqs');
    }

    //*********************************************************
    public function AllTutorials()
    {
        return view('classviews.alltutorials');
    }

// ******************************** CRUD without AJAX-calll ****************
//  public function InsertClass()
//    {
//        $class = new Degree();
//
//        $class->name = request('name');
//        $class->description = request('description');
//        $class->typeId = request('typeId');
//        $class->year = request('year');
//
//        $class->save();
//
//        return redirect('classtable');
//    }
//
//    public function ClassTable()
//    {
//        $degrees = DB::select('select * from degrees');
//        return view('classviews.classtable', ['degrees'=>$degrees]);
//    }
//
//    public function DeleteDegree($id)
//    {
//        $degrees = DB::select('delete from degrees where id=?',[$id]);
//        return view('classviews.classtable' , ['degrees'=>$degrees]);
//    }
//***********************************************


}
