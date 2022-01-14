@extends('teacher.layouts.master')

@section('title', '作業管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                作業批改 <small>個別作業列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 作業批改
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
                        <th width="150" style="text-align: center">作業名稱</th>
                        <th style="text-align: center">學生編號</th>
                        <th style="text-align: center">學生姓名</th>
                        <th width="600" style="text-align: center">作業檔名</th>
                        <th width="100" style="text-align: center">檔案下載</th>
                        <th width="150" style="text-align: center">分數</th>
                    </tr>
                    </thead>
                    <tbody>

            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
