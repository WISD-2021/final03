<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/student">Student</a>&nbsp;&nbsp;/&nbsp;
            <?php
//               $homeworks= DB::table('homework')->where('id',$_GET['homework_id'])->orderBy('id','ASC')->get();
//               $courses= DB::table('courses')->where('id',$_GET['course_id'])->orderBy('id','ASC')->get();
            ?>
            @foreach($courses as $course)
                @foreach($homeworks as $homework)
                    <from method="GET" action="{{ route('courses.index'), $course->id}}">
                        <input name="course_id" class="form-control" value="{{$course->id}}" hidden>
                        <button type="submit" class="btn btn-link">{{ $course->name }}</button>
                    </from>
                    &nbsp;&nbsp;/&nbsp;
                    {{$homework->name}}

                @endforeach
            @endforeach
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <form action="/homework" method="POST" role="form">
                        @method('POST')
                        @csrf

                        <?php
                           //$students= DB::table('students')->orderBy('id','ASC')->get();
                        ?>
                        <div class="form-group"  hidden>
                            <input name="student_id" class="form-control" placeholder="請輸入作業名稱" value="{{auth()->user()->id}}">
                        </div>
                        @foreach($courses as $course)
                        <div class="p-6">
                            <div class="flex items-center">
                        <div class="form-group" >
                            <label>課程名稱：{{$course->name}}</label>
                        </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($homeworks as $homework)
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="form-group" >
                                    <label>作業名稱：{{$homework->name}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="form-group" >
                                    <label>作業內容：{{$homework->content}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"  hidden>
                            <input name="homework_id" class="form-control" placeholder="請輸入作業名稱" value="{{$homework->id}}">
                        </div>
                        @endforeach
{{--                        <div class="form-group"  hidden>--}}
{{--                            <input name="date" class="form-control" placeholder="請輸入作業名稱" value="<?php $getDate= date("Y-m-d"); echo $getDate;?>">--}}
{{--                        </div>--}}
                        <div class="form-group"  hidden>
                            <input name="datetime" class="form-control" placeholder="請輸入作業名稱" value="<?php $getDate=date("Y-m-d"); echo $getDate;?>">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="form-group" >
                                  <input name="file" type="file" accept=".pdf,.png,.txt,.doc" onChange="fileUpload">
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">新增</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
