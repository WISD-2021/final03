@extends('teacher.layouts.master')

@section('title', '新增課程')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增課程 <small>請輸入課程名稱</small>
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
        <form action="/teacher/courses" method="POST" role="form">
            @method('POST')
            @csrf
            <?php
                $teachers = DB::table('teachers')->orderBy('id','ASC')->get();
            ?>
            @foreach($teachers as $teacher)
                @if(auth()->user()->id == $teacher->user_id)
                    <label>老師編號：{{$teacher->id}}</label>
                @endif
            @endforeach

            <div class="form-group" hidden>
                <label>老師編號：</label>
                <input name="teacher_id" class="form-control" placeholder="請輸入文章標題" value="{{$teacher->id}}">
            </div>

            <div class="form-group">
                <label>課程名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入課程名稱" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label>學分：</label>
                <input name="credits" class="form-control" placeholder="請輸入學分" value="{{old('credits')}}">
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
