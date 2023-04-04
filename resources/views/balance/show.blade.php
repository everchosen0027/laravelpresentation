<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Balance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h6>List of Grades</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Student Number</th>
                        <th>Amount Due</th>
                        <th>Total Balance</th>
                        <th>Notes</th>
                    <tbody>
                    @foreach($balances as $bal)
                       <tr>
                       <td>{{$bal->sNo }} </td>
                        <td>{{ number_format($bal->amountDue)}}</td>
                        <td>{{ number_format($bal->totalBalance)}} </td>
                        <td>{{$bal->notes }}</td>
                    </tr>
                        @endforeach
                   </tbody>

                    </table>
                    <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('balance')}}"> Back </a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>