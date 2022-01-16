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
                    <a href="/course?course_id={{$course->id}}">{{$course->name}}</a>&nbsp;&nbsp;/&nbsp;
                    {{$homework->name}}
                @endforeach
            @endforeach
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <?php
                        $students= DB::table('students')->where('user_id',auth()->user()->id)->orderBy('id','ASC')->get();
                    ?>
                    @foreach($homeworks as $homework)
                        @foreach($students as $student)
                            @foreach($courses as $course)
                                <?php
                                    $id=$homework->id;
                                    $s_id=$student->id;
                                    $pays= DB::table('pays')->where('homework_id',$id)->where('student_id',$s_id)->orderBy('id','ASC')->first();
                                ?>
                                @if(isset($pays))
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="form-group" >
                                            <label>作業檔案名稱：{{$pays->file}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="text-right">
                                            <a href="{{ route('homework.edit', $pays->id) }}" class="btn btn-sm btn-primary">編輯</a>
                                        </div>
                                    </div>
                                </div>
{{--                                        <form  method="GET" action='{{ route('homework.edit'), $homework->id}}' style="display: inline">--}}
{{--                                            <?php--}}
{{--                                            echo "<input name='course_id' value='".$course->id."' hidden>";--}}
{{--                                            echo "<input name='homework_id' value='".$homework->id."' hidden>";--}}
{{--                                            ?>--}}
{{--                                            <div class="row" style="margin-bottom: 20px; text-align: right">--}}
{{--                                                <div class="col-lg-12">--}}
{{--                                                    <button  class="btn btn-success" type="submit" >修改</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
                                @elseif($pays === null)
                                    <div class="p-6">
                                        <div class="flex items-center">
                                            <div class="form-group" >
                                                <label>無上傳資料</label>
                                            </div>
                                        </div>
                                    </div>
                                    <form  method="GET" action='{{ route('homework.create'), $course->id}}' style="display: inline">
                                        <?php
                                        echo "<input name='course_id' value='".$course->id."' hidden>";
                                        echo "<input name='homework_id' value='".$homework->id."' hidden>";
                                        ?>
                                        <div class="p-6">
                                            <div class="flex items-center">
                                                <div class="text-right">
                                                    <button  class="btn btn-success" type="submit" >上傳</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
