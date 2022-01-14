@extends('teacher.layouts.master')

@section('title', '作業管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            作業管理 <small>個別作業列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 作業管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<!--<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('teacher.homeworks.create') }}" class="btn btn-success">建立作業</a>
    </div>
</div>-->
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">#</th>
                        <th>課程名稱</th>
                        <th>作業名稱</th>
                        <th width="800" style="text-align: center">內容</th>
                        <th width="100" style="text-align: center">查看作業</th>
                        <th width="150" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($homeworks as $homework)
                    @foreach($courses as $course)
                    <tr>
                        <?php

                            //$_SESSION['course_id']=$course->id;
                        ?>
                        <td style="text-align: center">{{ $homework->id }}</td>
                        <td name="course_name" value="{{$course->name}}">{{$course->name}}</td>
                        <td>{{$homework->name}}</td>
                        <td style="text-align: center">{{ $homework->content }}</td>
                        <td style="text-align: center">
                           <a href="{{ route('teacher.homeworks.show', $homework->id) }}" class="btn btn-sm btn-primary">查看作業</a>
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('teacher.homeworks.edit', $homework->id) }}" class="btn btn-sm btn-primary">編輯</a>
                            /
                            <a href="{{ route('teacher.homeworks.destroy',$homework->id) }}" class="btn btn-sm btn-danger" onClick="return confirm('確定要刪除此課程?')">刪除</a>
                        </td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            @foreach($courses as $course)
                <form  method="GET" action='{{ route('teacher.homeworks.create'), $course->id}}' style="display: inline">
                        <?php
                        echo "<input name='course_id' value='".$course->id."' hidden>";
                        ?>
                        <div class="row" style="margin-bottom: 20px; text-align: right">
                            <div class="col-lg-12">
                                <button  class="btn btn-success" type="submit" >建立作業</button>
                            </div>
                        </div>
                </form>
            @endforeach
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
