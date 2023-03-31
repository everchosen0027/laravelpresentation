<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('add-subjects')}}">Add subject</a>

                    <h6>List of Subjects:</h6>
                    <table class="border-seperate border-spacing-5">
                        <thead>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th>Schedule</th>
                        </thead>
                        <tbody>
                            @foreach ($enrolled_subjects as $enrollsubj)
                            <tr>
                                <td>{{ $enrolled_subjects->subjectCode }}</td>
                                <td>{{ $enrolled_subjects->description }}</td>
                                <td>{{ $enrolled_subjects->units }}</td>
                                <td>{{ $enrolled_subjects->schedule }}</td>
                                <td>
                                    <a class="mt-4 bg-teal-200 hover:bg-teal-500 text-black font-bold py-2 px-4 rounded" href="{{ route('subjects-show', ['subjno' => $enrollsubj->esNo ]) }}">View</a>
                                    <a class="mt-4 bg-blue-200 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded" href="{{ route('subjects-edit', ['subjno' => $enrollsubj->esNo ]) }}">Edit</a>
                                    <form method="POST" action="{{ route('subjects-delete', ['subjno'=>$enrollsubj->esNo]) }}" onclick="return confirm('Are you sure you want to delete this?')">
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