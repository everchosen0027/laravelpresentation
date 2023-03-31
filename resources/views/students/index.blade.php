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
                    <a href="{{ route('add-student')}}">Add Student Infromation</a>

                    <h6>List of Students:</h6>
                    <table class="border-seperate border-spacing-5">
                        <thead>
                            <th>ID No.</th>
                            <th>Full Name</th>
                            <th>Course and Year</th>
                            <th>Birth Date</th>
                            <th>Gender</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            @foreach ($studentinfo as $stuinfo)
                            <tr>
                                <td>{{ $stuinfo->idNo }}</td>
                                <td>{{ $stuinfo->firstname }} {{ $stuinfo->middlename }} {{ $stuinfo->lastname }}, {{ $stuinfo->suffix }}</td>
                                <td>{{ $stuinfo->course }} - {{ $stuinfo->year }}</td>
                                <td>{{ date("F j, Y", strtotime($stuinfo->birthDate)) }}</td>
                                <td>{{ $stuinfo->gender }}</td>
                                <td>
                                    <a class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{ route('students-show', ['stuno' => $stuinfo->sno ]) }}">View</a>
                                    <a class="mt-4 bg-blue-200 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded" href="{{ route('students-edit', ['stuno' => $stuinfo->sno ]) }}">Edit</a>
                                    <form method="POST" action="{{ route('students-delete', ['stuno'=>$stuinfo->sno]) }}" onclick="return confirm('Are you sure you want to delete this?')">
                                        @csrf
                                        @method('delete')
                                        <button class="mt-4 bg-red-200 hover:bg-red-500 text-black font-bold py-2 px-4 rounded" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>