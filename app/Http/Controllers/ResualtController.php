<?php

namespace App\Http\Controllers;

use App\Models\Resualt;
use Illuminate\Http\Request;

class ResualtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//معرفة علامة مادة معينة في كل فحص
    public function index(Request $request)
    {
        $student_id=$request->student_id;
        $subject_id=$request->subject_id;
        $result = Resualt::query()
        ->Where('student_id',$student_id)
         ->Where('subject_id',$subject_id)
         ->get(['results.type','results.mark']);

        return response()->json([
            "status" => true,
            "message" => 'All results',
            'result'=>$result]);

    }
//عرض  كم امتحان للمادة
    public function type(Request $request)
    {
        $class_id=$request->class_id;
        $year=$request->year;
        $subject_id=$request->subject_id;
        $result = Resualt::query()
        ->Where('year',$year)
        ->Where('class_id',$class_id)
         ->Where('subject_id',$subject_id)
         ->distinct()
         ->get('type');

         return response()->json([
            "status" => true,
            "message" => 'All Types',
            'result'=>$result]);


    }
    // عرض جميع علامات الطلاب  بمادو مينة
    public function allmark(Request $request)
    {
        $class_id=$request->class_id;
        $year=$request->year;
        $subject_id=$request->subject_id;
        $type=$request->type;
        $result = Resualt::query()
        ->Where('year',$year)
        ->Where('class_id',$class_id)
         ->Where('subject_id',$subject_id)
         ->Where('type',$type)

         ->get(['mark','student_id']);

         return response()->json([
            "status" => true,
            "message" => 'All Types',
            'result'=>$result]);

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
        foreach($request->student_id as $key=>$val)

        {
        $row=[
            'student_id'=>$request->student_id[$key],
            'mark'=>$request->mark[$key],
            'class_id'=>$request->class_id,
            'type'=>$request->type,
            'subject_id'=>$request->subject_id,
            'year'=>$request->year
        ];

        Resualt::insert($row);}











    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resualt  $resualt
     * @return \Illuminate\Http\Response
     */
    public function show(Resualt $resualt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resualt  $resualt
     * @return \Illuminate\Http\Response
     */
    public function edit(Resualt $resualt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resualt  $resualt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resualt $resualt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resualt  $resualt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $r=Resualt::findorfail($id);
        $r->delete();

    }
}
