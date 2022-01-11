@extends('teacher.layouts.master')

@section('title', '課程管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            課程管理 <small>所有課程列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 課程管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('teacher.courses.create') }}" class="btn btn-success">建立課程</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">#</th>
                        <th>標題</th>
                        <th width="100" style="text-align: center">學分</th>
                        <th width="150" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td style="text-align: center">{{ $course->id }}</td>
                        <td>{{$course->name}}</td>
                        <td style="text-align: center">{{ $course->credits }}</td>

                        <td style="text-align: center">
                            <a href="{{ route('teacher.courses.edit', $course->id) }}" class="btn btn-sm btn-primary">編輯</a>
                            /
                            <a href="{{ route('teacher.courses.destroy',$course->id) }}" class="btn btn-sm btn-danger" onClick="return confirm('確定要刪除此課程?')">刪除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
