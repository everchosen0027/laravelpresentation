<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fill in Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                <form method = "POST" action="{{ route('grade-store') }}">
                        @csrf
                    <div class="flex-items-center"><label for="Enrolled Subject Number">Enrolled Subject Number</label>
                    <div>
                    <input type="text" name="xesNo" value="{{old('xesNo')}}"/>
                    </div>
                    </div>
                       <div class="flex-items-center"><label for="Student Number">Student Number</label>
                    <div>
                    <input type="text" name="sNo" value="{{old('sNo')}}"/>
                    </div>
                    </div>
                       <div class="flex-items-center"><label for="Prelim">Prelim</label>
                    <div>
                    <input type="number" precision="3" scale="2" name="xprelim" value="{{old('xprelim')}}"/>
                    </div>
                    </div>
                    <div class="flex-items-center"><label for="Midterm">Midterm</label>
                    <div>
                    <input type="number" precision="3" scale="2" name="xmidterm" value="{{old('xmidterm')}}"/>
                    </div>
                    </div>
                    <div class="flex-items-center"><label for="Final">Final</label>
                    <div>
                    <input type="number" precision="3" scale="2" name="xfinal" value="{{old('xfinal')}}"/>
                    </div>
                    </div>
                   <div class="flex-items-center"><label for="Remarks">Remarks</label>
                    <div>
                    <input type="text" name="xremarks" value="{{old('xremarks')}}"/>
                    </div>
                    </div>
             <button type ="submit"> Submit Info </button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>