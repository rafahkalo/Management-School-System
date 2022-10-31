<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\db;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        //get all teacher
       $teacher=Student::with('user')->get();
      //return $teacher;
       return view('Teacher.#',compact('teacher'));
    }

    public function countStudent(){


        $count = Student::count();
        return $count;
    }

    public function store(Request $request)
    {
        $rules=[
               // user required
               'first_name'=>'required',
               'last_name'=>'required',
               'birthday'=>'required|date',
               'sex'=>'required',
               'class_id'=>'required|numeric|exists:class_rooms,id',
               'number'=>'required|numeric|min:10',
               'email'=>'required|email',
               'image'=>'required|mimes:jpg,png,bmp|max:5048',
                 // student required
            'father'=>'required|max:15',
            'mother'=>'required|max:15',
            'address'=>'required',
        ];
        $message=['first_name'=>'you must inter name',

    ];

    $v=Validator::make($request->all(),$rules,$message);
    if($v->fails()){
        return $v->errors();
    }
      ///save image in folder student_image
      $newImageName=time().'.'.$request->image->extension();
      $request->image->move(public_path('student_image'),$newImageName);

      $user= User::query()->create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'image'=>$request->image,
        'birthday'=>$request->birthday,
        'sex'=>$request->sex,
        'email'=>$request->email,
        'number'=>$request->number,
        'role_id'=> 2
       ]);
        $user->save();
        $User = $user->id;
        $Student=Student::query()->create([

            'father'=>$request->father,
            'mother'=>$request->mother,
            'class_id'=>$request->class_id,
            'address'=>$request->address,
            'user_id'=>$User
            ]);
            $Student->save();

        $request->session()->flash('Success','Store Sucssefully Student');
    }

    public function show($id)
    {

    $student=Student::with(['class','user'])->find($id);
    //return $student;
    return view('Student.#',compact('student'));

    }

    public function update(Request $request,$id)
    {
        //
        $s=Student::find($id);
       $user=User::find($s->user_id);
         if(is_null($s))
         {
            return response()->json([
                "status" => false,
                'message'=>'error the student not found']);
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
      $s->update([
            'class_id'=>$request->class_id,

           'user_id'=>$s->user_id,
           'address'=>$request->address,
           'father'=>$request->father,
           'mother'=>$request->mother
           ]);
           $request->session()->flash('Success','Updated sucssefully student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
   $s=Student::findOrFail($id);
    //first delete user
    $s->user()->delete();

    //second delete teacher room
    $s->delete();
    $request->session()->flash('Success','Deleted Sucssefully Student');

    }
}
