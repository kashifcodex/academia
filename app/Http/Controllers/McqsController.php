<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Mcq;
use DataTables;


class McqsController extends Controller
{
    public function AddMCQS()
    {
        return view('datatableviews.mcqs');
    }

    function getdata()
    {
        $mcqs = Mcq::select('id', 'question', 'option1','option2', 'option3','option4','ans');
        return Datatables::of($mcqs)
            ->addColumn('action', function($student){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;
                        <a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->make(true);
    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $student = Mcq::find($id);
        $output = array(
            'question'    =>  $student->question,
            'option1'     =>  $student->option1,
            'option2'    =>  $student->option2,
            'option3'    =>  $student->option3,
            'option4'    =>  $student->option4,
            'ans'    =>  $student->ans,

        );
        echo json_encode($output);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'question' => 'required',
            'option1'  => 'required',
            'option2'  => 'required',
            'option3'  => 'required',
            'option4'  => 'required',
            'ans'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $student = new Mcq([
                    'question'   =>  $request->get('question'),
                    'option1'    =>  $request->get('option1'),
                    'option2'    =>  $request->get('option2'),
                    'option3'    =>  $request->get('option3'),
                    'option4'    =>  $request->get('option4'),
                    'ans    '    =>  $request->get('ans'),
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $student = Mcq::find($request->get('student_id'));
                $student->question = $request->get('question');
                $student->option1 = $request->get('option1');
                $student->option2 = $request->get('option2');
                $student->option3 = $request->get('option3');
                $student->option3 = $request->get('option4');
                $student->option3 = $request->get('ans');
                $student->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }

        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function removedata(Request $request)
    {
        $student = Degree::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
}
