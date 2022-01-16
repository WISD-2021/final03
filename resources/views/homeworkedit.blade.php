<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/student">Student</a>&nbsp;&nbsp;/&nbsp;
            @foreach($pays as $pay)
                <?php
                    $homeworks = DB::table('homework')->where('id',$pay->homework_id)->orderby('id','ASC')->get();
                ?>
                @foreach($homeworks as $homework)
                    <?php
                        $courses = DB::table('courses')->where('id',$homework->course_id)->orderby('id','ASC')->get();
                    ?>
                    @foreach($courses as $course)
                        <a href="/course?course_id={{$course->id}}">{{$course->name}}</a>&nbsp;&nbsp;/&nbsp;
                        {{$homework->name}}
                    @endforeach
                @endforeach
            @endforeach
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    @foreach($pays as $pay)
                    <form action="/homework/{{$pay->id}}" method="POST" role="form">
                        @method('PATCH')
                        @csrf
                        <div class="form-group"  hidden>
                            <input name="student_id" class="form-control" value="{{auth()->user()->id}}">
                        </div>

                        <?php
                           //$students= DB::table('students')->orderBy('id','ASC')->get();
                            $homeworks = DB::table('homework')->where('id',$pay->homework_id)->orderBy('id','ASC')->get();
                        ?>
                            @foreach($homeworks as $homework)
                                <?php
                                    $courses=DB::table('courses')->where('id',$homework->course_id)->orderBy('id','ASC')->get();
                                ?>
                                @foreach($courses as $course)
                                    <div class="p-6">
                                        <div class="flex items-center">
                                            <div class="form-group" >
                                                <label>課程名稱：{{$course->name}}</label>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="p-6">
                                        <div class="flex items-center">
                                            <div class="form-group" >
                                                <label>原檔案：{{$pay->file}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"  hidden>
                                        <input name="datetime" class="form-control" value="{{old('datetime',$pay->datetime)}}">
                                    </div>
                                @endforeach
                            @endforeach


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
                                    <button type="submit" class="btn btn-success">修改</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
