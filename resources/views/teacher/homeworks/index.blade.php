@extends('teacher.layouts.master')

@section('title', '作業管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            作業管理 <small>所有作業列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 作業管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('teacher.homeworks.create') }}" class="btn btn-success">建立作業</a>
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
                        <th width="800" style="text-align: center">內容</th>
                        <th width="150" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($homework as $homeworks)
                    <tr>
                        <td style="text-align: center">{{ $homework->id }}</td>
                        <td>{{$homework->name}}</td>
                        <td style="text-align: center">{{ $homework->content }}</td>

                        <td style="text-align: center">
                            <a href="{{ route('teacher.homeworks.edit', $homework->id) }}" class="btn btn-sm btn-primary">編輯</a>
                            /
                            <a href="{{ route('teacher.homeworks.destroy',$homework->id) }}" class="btn btn-sm btn-danger" onClick="return confirm('確定要刪除此課程?')">刪除</a>
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
