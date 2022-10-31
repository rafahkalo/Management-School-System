<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\db;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Validator;
use App\Models\Final_Exam;
use Illuminate\Http\Request;

class FinalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules=[
            'class_id'=>'required',
            'time'=>'required',
            'subject'=>'required',
            'day'=>'required'
    ];
$message=[

];
    $v=Validator::make($request->all(),$rules,$message);
    if($v->fails()){
        return $v->errors();
    }

foreach($request->subject as $key=>$val)

{
$row=[
    'class_id'=>$request->class_id,
    'time'=>$request->time[$key],
    'subject'=>$request->subject[$key],
    'day'=>$request->day
];

Final_Exam::insert($row);}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Final_Exam  $final_Exam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $final= ClassRoom::with('final')->find($id);
     return view('Final.#',compact('final'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Final_Exam  $final_Exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Final_Exam $final_Exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Final_Exam  $final_Exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Final_Exam $final_Exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Final_Exam  $final_Exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Final_Exam $final_Exam)
    {
        //
    }
}
