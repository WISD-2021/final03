@extends('teacher.layouts.master')

@section('title', '編輯課程')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            編輯課程 <small>編輯課程</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 課程管理
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
        <form action="/teacher/courses/{{$course->id}}" method="POST" role="form">
            @method('PATCH')
            @csrf

            <div class="form-group" hidden>
                <label>teacher_id：</label>
                <input name="teacher_id" class="form-control" placeholder="請輸入文章標題" value="{{old('teacher_id',$course->teacher_id)}}" hidden>
            </div>

            <div class="form-group">
                <label>課程名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入課程名稱" value="{{old('name',$course->name)}}">
            </div>

            <div class="form-group">
                <label>學分：</label>
                <input name="credits" class="form-control" placeholder="請輸入學分" value="{{old('credits',$course->credits)}}">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
