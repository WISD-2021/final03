@extends('teacher.layouts.master')

@section('title', '編輯作業')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            編輯作業 <small>編輯作業</small>
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
        <form action="/teacher/homeworks/{{$homework->id}}" method="POST" role="form">
            @method('PATCH')
            @csrf

            <div class="form-group" hidden>
                <label>course_id：</label>
                <input name="course_id" class="form-control" placeholder="請輸入作業題目" value="{{old('homework_id',$homework->id)}}" hidden>
            </div>

            <div class="form-group">
                <label>作業名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入作業名稱" value="{{old('name',$homework->name)}}">
            </div>

            <div class="form-group">
                <label>作業內容：</label>
                <input name="credits" class="form-control" placeholder="請輸入作業內容" value="{{old('content',$homework->content)}}">
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
