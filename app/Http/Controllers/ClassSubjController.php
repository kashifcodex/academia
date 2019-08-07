<?php
 
namespace App\Http\Controllers;
use DB;
use App\classes;
use App\Degree;
use Illuminate\Http\Request;
use Validator;
use DataTables;

class ClassSubjController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Degree::latest()->get())
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('classviews.addsubject');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'         =>  'required',
            'description'  =>  'required',
            'typeId'       =>  'required',
            'year'         =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }



        $form_data = array(

            'name'        =>  $request->name,
            'description' =>  $request->description,
            'typeId'      =>  $request->typeId,
            'year'        =>  $request->year
        );

        Degree::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }
    // ********* Class CRUD operations Add,Update,delete ***************

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

    // Display Degrees DB values in Table view
    public function ClassTable()
    {
        $degrees = DB::select('select * from degrees');
        return view('classviews.classtable', ['degrees'=>$degrees]);
    }

    public function DeleteDegree($id)
    {
        Degree::find($id)->delete();
        return redirect('classtable');
        // $degrees = DB::select('delete from degrees where id=?',[$id]);
        //echo '<pre>'; print_r($degrees); echo '</pre>';
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Degree::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'description'     =>  'required',
            'typeId'    =>  'required',
            'year'    =>  'required',
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'       =>   $request->name,
            'description'        =>   $request->description,
            'typeId'       =>   $request->typeId,
            'year'       =>   $request->year,

        );
        Degree::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

//****************************************************************************
//    public function AddSubject()
//    {
//        return view('classviews.addsubject');
//    }

    public function InsertSubject()
    {
        return redirect('index');
    }
//*********************************************************
    public function AddChapter()
    {
        return view('classviews.addchapter');
    }

    public function InsertChapter()
    {
        return redirect('index');
    }

    //*********************************************************
    public function AddMCQS()
    {
        return view('classviews.addmcqs');
    }

    public function InsertMCQS()
    {
        return redirect('index');
    }

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


}
