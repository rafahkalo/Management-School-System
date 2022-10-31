<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Absence;
use App\Models\Student;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{

    public function store(Request $request)
    {
        //

        $rules=[
            'student_id'=>'required',
            //|exists:students,id',
            'type'=>'required',


        ];
    $message=[
];
        $v=Validator::make($request->all(),$rules,$message);
        if($v->fails()){
            return $v->errors();
        }
      // Absence::create($request->all());


      foreach($request->student_id as $key=>$val)

      {
      $row=[

          'student_id'=>$request->student_id[$key],
          'type'=>$request->type[$key],

      ];

      Absence::insert($row);}





    }

    public function show($id)
    {
        $student=Student::with('absence')->find($id);
        return $student;
    }
    //النسبة المئوية لنسبة الغياب والحضور
    public function absence ($id)
    {
        $all= Absence::query()
        ->Where('student_id',$id)
        ->get();

       $absence= Absence::query()
        ->Where('student_id',$id)
        ->Where('type','absence')
        ->get();

     $absence1=(count($absence)/count($all))*100;

     $Presence=100-$absence1;

     return response()->json([
        'status' => true,
        'Presence'=>$Presence,
        'Absence'=>$absence1]);
    }

}
