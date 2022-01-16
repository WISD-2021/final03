<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/student">Student</a>&nbsp;&nbsp;/&nbsp;
            @foreach($courses as $course)
                {{$course->name}}
            @endforeach
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                <?php
                    $homeworks= DB::table('homework')->orderBy('id','ASC')->get();
                ?>
                @foreach($homeworks as $homework)
                    @foreach($courses as $course)
                        @if($homework->course_id == $course->id)
                            <form method="GET" action="{{ route('homework.index'), $course->id}}">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <input name="course_id" class="form-control" placeholder="請輸入作業名稱" value="{{$course->id}}" hidden>
                                        <input name="homework_id" class="form-control" placeholder="請輸入作業名稱" value="{{$homework->id}}" hidden>
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        <div class="ml-4 text-lg leading-7 font-semibold">
                                            <button type="submit" class="btn btn-link">{{ $homework->name }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endforeach
                @endforeach
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
