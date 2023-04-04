<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grades Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                <a class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded" href="{{ route('add-grade')}}">Add Grades</a>
                    <h6>Grades List</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Subject Number</th>
                        <th>Student Number</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Final</th>
                        <th>Remarks</th>
                      </tr>
                    <tbody>
                        @foreach($grades as $gd)
                       <tr>
                        <td>{{$gd->esNo }}</td>
                        <td>{{$gd->sNo }} </td>
                        <td>{{$gd->prelim }}</td>
                        <td>{{$gd->midterm }}</td>
                        <td>{{$gd->finals }}</td>
                        <td>{{$gd->remarks}}</td>
                        <td>
                            <a class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded" href= "{{route('grade-show', ['gradno' => $gd->gNo]) }}" >View</a>
                            <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href= "{{route('grade-edit', ['gradno' => $gd->gNo]) }}" >Edit</a>
                            <form method="POST" action = "{{ route('grade-delete', ['gradno' => $gd->gNo ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">
                           @csrf
                           @method('delete')
                           <button class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded" type="submit" >Delete</a>
                        </form>
                        <td>
                       </tr>
                        @endforeach
                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>