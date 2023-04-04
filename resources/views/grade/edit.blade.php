<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students Information') }}
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
                    @foreach($grades as $gd)
                    <form method = "POST" action="{{ route('grade-update',['gradno' => $gd->gNo]) }}">
                        @csrf
                        @method('patch')
                    
                    <div class="flex-items-center"><label for="Prelim">Prelim</label>
                    <div>
                    <input type="decimal" precision="3" scale="2" name="xprelim" value="{{$gd->prelim}}"/>
                    </div>
                    </div>

                    <div class="flex-items-center"><label for="Midterm">Midterm</label>
                    <div>
                    <input type="decimal" precision="3" scale="2" name="xmidterm" value="{{$gd->midterm}}"/>
                    </div>
                    </div>

                    <div class="flex-items-center"><label for="Final">Final</label>
                    <div> 
                    <input type="decimal" precision="3" scale="2" name="xfinals" value="{{$gd->finals}}"/>
                    </div>
                    </div>
                    
                    <div class="flex-items-center"><label for="Remarks">Remarks</label>
                    <div>
                    <input type="text" name="xremarks" value="{{$gd->remarks}}"/>
                    </div>
                    </div>
                    
             <button type ="submit"> Submit Info </button>
                   </form>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>