<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\db;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject=Subject::all();
        return $subject;
    }


    public function store(Request $request)
    {
        //
        $rules=[
            'name'=>'required',


    ];
$message=[

];
    $v=Validator::make($request->all(),$rules,$message);
    if($v->fails()){
        return $v->errors();
    }
    Subject::create($request->all());

    $request->session()->flash('Success','Store Sucssefully Subject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
//معرفة اساتذة مادة معينة
//select count(*) from teacher_subject;
$e=DB::table('teacher_subject')->where('subject_id','=',$id)->count();
    for($i=0;$i<$e;$i++){
        $teacher_subject=DB::table('users')
        ->select('*')
        ->join('teacher','teacher.user_id','=','users.id')
        ->join('teacher_subject','teacher_subject.teacher_id','=','teacher.id')
        ->join('subjects','subjects.id','=','teacher_subject.subject_id')
        ->where('subjects.id',$id)
        ->get();}
        return $teacher_subject.'the number row is '.$e;
        //return view('',compact(teacher_subject));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
