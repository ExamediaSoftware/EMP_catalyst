<div>
    <div>
        <h4>My Application</h4>
    </div>
    <div class="flex flex-row-reverse mb-4 text-sm">
        <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn-shadow">{{ __('Create New Application') }}</button>
        </form>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        {{ __('Company name') }}
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        {{ __('Created date') }}
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" colspan="2"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($application as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $item->company_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                <span class="relative">
                                    @if (!$item->currentStatus == null)
                                        {{ $item->currentStatus->status_id }}
                                    @else
                                        ""
                                    @endif
                                </span>
                            </span>
                        </td>

                        <td class="pr-4 py-4 text-right">
                            <a href="{{ route('application.edit', $item->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>

                        <td class="pr-4 py-4 text-right">
                            <form action="{{ route('application.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                            {{-- <a href="{{ route('application.destroy', $item->id) }}" method="DELETE"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
