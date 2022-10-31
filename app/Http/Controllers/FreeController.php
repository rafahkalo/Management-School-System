<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Free;
use App\Models\Student;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\db;

class FreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //معرفة الطلاب التي لم تنتهي من الدفع
    public function searchfree()
    {

$free=DB::table('users')

->join('students','students.user_id','=','users.id')
->join('frees','frees.student_id','=','students.user_id')
->where('the_reset','!=',0)
->get(['users.first_name', 'users.last_name','students.father','frees.amount','frees.paid']);

        return $free;
    }

//ارجاع اقساط طالب معين
    public function searchSfree(Request $request)
    {
        $first_name = $request->first_name;
        $last_name = $request->last_name;
       $user= User::join('students', 'students.user_id', '=', 'users.id')
        ->join('frees','frees.student_id' , '=', 'students.id')
       ->Where('users.first_name',$first_name)
     // ->Where('users.last_name',$last_name)
       // ->select('frees.*')
        ->get('frees.*');


        return $user.$first_name;
    }


public function test(){


    $ff=Free::sum('paid');
    return $ff;



//$t=Free::select('created_at')->get();
// $t='12/3/2020';
// $tt= Carbon::createFormFormat('m/d/Y',$t)->format('Y');
// return $tt;
//return $t->format('Y-m-d H:i');
}

    public function show($id)
    {
        //ارجاع اقساط طالب معين
        $student=Student::with('free')->find($id);
        return view('Student.#',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $rules=[
            'amount'=>'required',
            'paid'=>'required',
            'student_id'=>'required|exists:students,id',
            'date_paid'=>'required'
    ];
$message=[];
    $v=Validator::make($request->all(),$rules,$message);
    if($v->fails()){
        return $v->errors();
    }

$student=Free::find($request->student_id);
if(is_null($student)){

    $f=new Free();
    $f->amount=$request->amount;
    $f->paid=$request->paid;
    $f->date_paid=$request->date_paid;
    $f->student_id=$request->student_id;
   $f-> the_reset=($request->amount)-($request->paid);

}

else{


    $request->session()->flash('Warning','You Cannot Add Free');





}
    }
    public function storee(Request $request){
$data=User::where('first_name',$request->first_name)
->where('last_name',$request->last_name)->first()->id;

$f=new Free();
$f->amount=$request->amount;
$f->paid=$request->paid;
$f->date_paid=$request->date_paid;
$f->student_id=$data;
$f->the_reset=($request->amount)-$request->paid;
$f->save();
return $data;


    }
public function update(Request $request)
    {

$data=User::where('first_name',$request->first_name)
->where('last_name',$request->last_name)->first()->id;
$s=Free::where('student_id',$data)->first();
$id=$s->id;
        $f=Free::find($id);
        if($f->the_reset!=0){
        $ff=$f->paid;
        $fff=$request->paid;
        $s=$ff+$fff;
        $amount=$request->amount;
        $reset=$amount-$s;
                $f->update([
            'amount'=>$request->amount,
             'paid'=>$s,
             'date_paid'=>$request->date_paid,
             'student_id'=>$data,
   ]);
   $f->the_reset=$reset;
   $f->save();}
else{
    $request->session()->flash('Warning','You Cannot Add Free');

}


    }









}
