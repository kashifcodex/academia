<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Degree;
use DataTables;

class AjaxdataController extends Controller
{
    function index()
    {
        return view('datatableviews.ajaxdata');
    }

    function getdata()
    {
        $degrees = Degree::select('id', 'name', 'description','typeId', 'year');
        return Datatables::of($degrees)
            ->addColumn('action', function($student){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;
                        <a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->make(true);
    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $student = Degree::find($id);
        $output = array(
            'name'    =>  $student->name,
            'description'     =>  $student->description,
            'typeId'    =>  $student->typeId,
            'year'    =>  $student->year,

        );
        echo json_encode($output);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'description'  => 'required',
            'typeId'  => 'required',
            'year'  => 'required',
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
                $student = new Degree([
                    'name'    =>  $request->get('name'),
                    'description'     =>  $request->get('description'),
                    'typeId'    =>  $request->get('typeId'),
                    'year'    =>  $request->get('year'),
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $student = Degree::find($request->get('student_id'));
                $student->name = $request->get('name');
                $student->description = $request->get('description');
                $student->typeId = $request->get('typeId');
                $student->year = $request->get('year');
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
