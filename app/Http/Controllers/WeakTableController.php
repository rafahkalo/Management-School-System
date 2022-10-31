<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Support\Facades\Validator;
use App\Models\Weak_Table;
use App\Models\Subject;
use Illuminate\Http\Request;

class WeakTableController extends Controller
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
    public function allsubject()
    {
        $subject = Subject::all();
        $class = ClassRoom::all();
        return view('Layuots.Program.addwork', compact('subject', 'class'));
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
    {   $rules=[
            'class_id'=>'required',
            'subject'=>'required',
            'time'=>'required',
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
Weak_Table::insert($row);
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weak_Table  $weak_Table
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $c=ClassRoom::with('weak')->find($id);
        return $c;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weak_Table  $weak_Table
     * @return \Illuminate\Http\Response
     */
    public function edit(Weak_Table $weak_Table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weak_Table  $weak_Table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weak_Table $weak_Table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weak_Table  $weak_Table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weak_Table $weak_Table)
    {
        //
    }
}
