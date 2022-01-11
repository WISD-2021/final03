<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Requests\UpdateHomeworkRequest;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeworks = Homework::orderBy('id','ASC')->get();
        $data = ['homework' => $homeworks];
        return view('teacher.homeworks.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.homeworks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeworkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeworkRequest $request)
    {
        Homework::create($request->aall());
        return redirect()->route('teacher.homeworks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        //
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
        return redirect()->route('teacher.homeworks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Homework::destroy($id);
        return redirect()->route('teacher.homeworks.index');
    }
}
