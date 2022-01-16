<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Pay;
use App\Models\Course;
use App\Http\Requests\StorePayRequest;
use App\Http\Requests\UpdatePayRequest;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('id',$_GET['course_id'])->get();
        $data = ['courses' => $courses];
        $homeworks = Homework::where('id',$_GET['homework_id'])->get();
        $data2 = ['homeworks' => $homeworks];
        return view('homework',$data,$data2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::where('id',$_GET['course_id'])->get();
        $data = ['courses' => $courses];
        $homeworks = Homework::where('id',$_GET['homework_id'])->get();
        $data2 = ['homeworks' => $homeworks];
        return view('homeworkcreate',$data,$data2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayRequest $request)
    {
        Pay::create($request->all());
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pays = Pay::where('id',$id)->get();
        $data = ['pays'=>$pays];
        return view('homeworkedit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayRequest  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayRequest $request, $id)
    {
        $pays = Pay::find($id);
        $pays->update($request->all());
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        //
    }
}
