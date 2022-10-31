<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\db;
use Illuminate\Support\Facades\URL;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all teacher
       $teacher=Teacher::with('user')->get();
      //return $teacher;
       return view('Teacher.#',compact('teacher'));
    }



    public function allteacher(){
        $subject=Subject::all();
        return view('Teacher.addTeacher',compact('subject'));
    }





    public function store(Request $request)
    {
        //
       $rules=[
             // teacher required
             'experince'=>'required|max:1500',
             'salary'=>'required',
              // user required
              'first_name'=>'required',
              'last_name'=>'required',
              'birthday'=>'required|date',
              'sex'=>'required',
              'number'=>'required|numeric|min:10',
              'email'=>'required|email',
              'image'=>'required'
     ];
     $message=[];
     $v=Validator::make($request->all(),$rules,$message);
     if($v->fails()){
         return $v->errors();
     }

$image = $request->file('image');
$newImageName=time().'.'.$request->file('image')->getClientOriginalExtension();
$image->move(public_path('teacher_image'),$newImageName);


     $user= User::query()->create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'image'=>$image,
        'birthday'=>$request->birthday,
        'sex'=>$request->sex,
        'email'=>$request->email,
        //'password'=>bcrypt($request->password),
        'number'=>$request->number,
        'role_id'=> 1
     ]);

        $user->save();
        $User = $user->id;
        $teacher=Teacher::query()->create([
            'experince'=>$request->experince,
            'salary'=>$request->salary,
            'father'=>$request->father,
            'address'=>$request->address,
            'mother'=>$request->mother,
            'user_id'=>$User
           ]);

       $teacher->save();
       $teacher->subject()->attach($request->subject_id);
      // return "added sussefuly";
      return redirect()->back();
       $request->session()->flash('Success','Store Sucssefully Teacher');
    }


    public function countTeacher(){


        $count = Teacher::count();
        return $count;
    }
    public function show($id)
    {
        $treacher=Teacher::with('user')->get()->find($id);

    return view('Teacher.#',compact('teacher'));

    }


    public function update(Request $request,$id)
    {
        $teacher=Teacher::find($id);
       $user=User::find($teacher->user_id);
         if(is_null($teacher))
         {
            return response()->json([
                "status" => false,
                'message'=>'error the teacher not found']);
         }
         $user->update([
               'first_name'=>$request->first_name,
     'last_name'=>$request->last_name,
      'image'=>$request->image,
      'birthday'=>$request->birthday,
      'sex'=>$request->sex,
      'email'=>$request->email,
      'number'=>$request->number,
     'role_id'=> 1
      ]);

       $teacher->update([
 'experince'=>$request->experince,
    'salary'=>$request->salary,
    'father'=>$request->father,
    'mother'=>$request->mother,
    'address'=>$request->address,
    'user_id'=>$teacher->user_id
    ]);
    //$request->session()->flash('Success','Update Sucssefully Teacher');


    }


    public function destroy(Request $request,$id)
{
    $t=Teacher::findOrFail($id);
    $s=$t->subject;
    $c=$t->class;

    //first delete user
    $t->user()->delete();
     //delete from classes
    $t->class()->detach($c);
    //delete from subjects
    $t->subject()->detach($s);

    $t->delete();

    $request->session()->flash('Success','Delete Sucssefully Teacher');
    }
     //معرفة الصفوف التي يعمل بها استاذ
    public function teacherclass($id)
    {
        $e=DB::table('teacher_class')->where('teacher_id','=',$id)->count();
        for($i=0;$i<$e;$i++){
            $teacher_class=DB::table('class_rooms')
            ->select('class_rooms.name','class_rooms.school-free')
            ->join('teacher_class','teacher_class.class_id','=','class_rooms.id')
            ->join('teacher','teacher.id','=','teacher_class.teacher_id')
            ->where('teacher.id',$id)
            ->get();
return response()->json(['teacher_class'=> $teacher_class]);
    }
}
public function teachersubjects($id){
    $e=DB::table('teacher_subject')->where('teacher_id','=',$id)->count();
    for($i=0;$i<$e;$i++){
        $teacher_subject=DB::table('subjects')
        ->select('subjects.name')
       // ->join('teacher','teacher.user_id','=','users.id')
        ->join('teacher_subject','teacher_subject.subject_id','=','subjects.id')
        ->join('teacher','teacher.id','=','teacher_subject.teacher_id')
        ->where('teacher.id',$id)
        ->get();}
        return response()->json(['teacher_subject'=>$teacher_subject]);
        //return view('',compact(teacher_subject));
    }

public function test(){
 $t=Teacher::select('created_at')->get();
foreach($t as $d){
    $y=Carbon::createFromFormat('Y-m-d',$d->created_at)->year;
    return $y;
}

    /*$d="2021-2-6";
    $y=Carbon::createFromFormat('Y-m-d',$d)->year;
    $m=Carbon::createFromFormat('Y-m-d',$d)->month;*/

}
}
