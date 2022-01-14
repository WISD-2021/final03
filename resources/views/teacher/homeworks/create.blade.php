@extends('teacher.layouts.master')

@section('title', '新增作業')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增作業 <small>請輸入作業名稱</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 作業管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/teacher/homeworks" method="POST" role="form">
            @method('POST')
            @csrf

            @foreach($courses as $course)
                <div class="form-group">
                    <label>課程編號：{{$course->id}}</label>
                </div>
                <div class="form-group"  hidden>
                    <input name="course_id" class="form-control" placeholder="請輸入作業名稱" value="{{$course->id}}">
                </div>
                <div class="form-group"  >
                    <label>課程名稱：{{$course->name}}</label>
                </div>
            @endforeach

            <div class="form-group">
                <label>作業名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入作業名稱" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label>作業內容：</label>
                <input name="content" class="form-control" placeholder="請輸入作業內容" value="{{old('credits')}}">
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
