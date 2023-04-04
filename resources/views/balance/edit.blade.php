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
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                    @foreach($balances as $bal)
                <form method = "POST" action="{{ route('balance-update',['bNo' => $b->bNo]) }}">
                        @csrf
                        @method('patch')

                    <div class="flex-items-center"><label for="Amount Due">Amount Due</label>
                    <div>
                    <input type="number" precision="8" scale="2" name="amountDue" value="{{$bal->amountDue}}"/>
                    </div>
                    </div>
                       <div class="flex-items-center"><label for="Total Balance">Total Balance</label>
                    <div>
                    <input type="text" precision="8" scale="2" name="totalBalance" value="{{$bal->totalBalance}}"/>
                    </div>
                    </div>
                       <div class="flex-items-center"><label for="Notes">Notes</label>
                    <div>
                    <input type="text"  name="xnotes" value="{{$bal->notes}}"/>
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