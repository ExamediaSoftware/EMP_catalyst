<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex flex-row-reverse mb-4 text-sm">
        
            <a href="{{route('user.create')}}" class="btn-shadow">{{ __('Create New User') }}</a>
        
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        {{ __('User name') }}
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        {{ __('Email') }}
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Date Register
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$item->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->email}}
                    </td>
                    <td class="px-6 py-4">
                        <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                            <span class="relative">{{$item->created_at}}</span>
                        </span>
                    </td>
    
                    <td class="px-6 py-4 text-right">
                        <a href="{{route('user.edit', $item->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-2">Edit</a>
                        <a href="{{route('user.destroy', $item->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline px-2">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
