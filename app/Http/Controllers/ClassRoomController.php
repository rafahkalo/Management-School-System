<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\db;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function allclass(){



        return view('Class.allclass');
    }
    public function index()
    {
        //get all classes =>show
        $classroom=ClassRoom::all();
        //return $classroom;
        return view('Class.#',compact('classroom'));
    }

    public function store(Request $request)
    {
        //create a new class
        $rules=[
            'name'=>'required',
            'school-free'=>'required',

        ];
    $message=['name.required'=>'you must inter class_name',
            'school-free.required'=>'enter money of class'];
        $v=Validator::make($request->all(),$rules,$message);
        if($v->fails()){
            return $v->errors();
        }
      $c=  ClassRoom::create($request->all());

$c->teacher()->attach($request->teacher_id);
$request->session()->flash('Success','Store Sucssefully Class');

    }


    public function show($id){
$student=DB::table('users')
->select('*','students.id')
->join('students','students.user_id','=','users.id')
->join('class_rooms','class_rooms.id','=','students.class_id')
->where('class_rooms.id',$id)
->get();

return $student;
//return view('Class.#',compact('student'));
    }

    public function update(Request $request, $id)
    {
        $rules=[
            'name'=>'required',
            'school-free'=>'required',

        ];
    $message=['name.required'=>'you must inter class_name',
           'school-free.required'=>'enter money of class'
        ];
        $v=Validator::make($request->all(),$rules,$message);
        if($v->fails()){
            return $v->errors();
        }
        $c=ClassRoom::where('id',$id)->update($request->all());
        $request->session()->flash('Success','Updated sucssefully class');

    }



    public function destroy(Request $request,$id)
    {
    //delete class with his student
        $c=ClassRoom::find($id);
        //first delete student
        $c->student()->delete();
        //second delete class room
        $c->delete();
        $request->session()->flash('Success','Deleted sucssefully class');
    }
}
