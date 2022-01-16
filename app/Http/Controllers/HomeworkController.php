<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Homework;
use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Requests\UpdateHomeworkRequest;
use App\Models\Pay;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeworks = Homework::where('course_id',$_GET['course_id'])->orderBy('id','ASC')->get();
        $data = ['homeworks' => $homeworks];
        $courses = Course::where('id',$_GET['course_id'])->orderBy('id','ASC')->get();
        $data2 = ['courses'=>$courses];
        return view('teacher.homeworks.index',$data,$data2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::where('id',$_GET['course_id'])->orderBy('id','ASC')->get();
        $data2 = ['courses'=>$courses];
        //$_SESSION['course_id']=$_GET['course_id'];
        return view('teacher.homeworks.create',$data2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeworkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeworkRequest $request)
    {
        Homework::create($request->all());
        return redirect()->route('teacher.dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        $homework = Homework::where('id',$homework)->get();
        $data = ['homework'=>$homework];
        //$pays = Pay::where('homework_id',$homework)->orderBy('id','ASC')->get();
        //$data2 = ['homework'=>$homework];
        return view('teacher.homeworks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homework = Homework::find($id);
        $data = ['homework'=>$homework];
        return view('teacher.homeworks.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeworkRequest  $request
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeworkRequest $request, $id)
    {
        $homework = Homework::find($id);
        $homework->update($request->all());
        return redirect()->route('teacher.dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Homework::destroy($id);
        return redirect()->route('teacher.dashboard.index');
    }
}
