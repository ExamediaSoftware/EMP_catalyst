<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                {{-- <h1>{{ $company_name }}</h1> --}}
                <h3 class="text-lg font-medium leading-6 text-gray-900">General</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Use a permanent address where you can receive mail.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="createUser">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-8 sm:grid-cols-8 gap-4 lg:gap-5">
                        {{-- <div class="grid grid-cols-12 lg:grid-cols-12 gap-4"> --}}
                        <div class="col-span-4 sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">User
                                Name</label>
                            <input wire:model="name" type="text"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('name')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input wire:model="email" type="email"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('email')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input wire:model="password" type="password"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('password')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                            <label for="passwordAgain" class="block text-sm font-medium text-gray-700">Password Again</label>
                            <input wire:model="passwordAgain" type="password"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('passwordAgain')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select wire:model="role"
                                class="mt-1 text-gray-600 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                <option class="py-2">Please Choose</option>
                                @foreach ($global_role as $role)
                                    @if (Request::old('role') == $role->id)
                                        <option value="{{ $role->id }}" selected>
                                            {{ $role->name }}</option>
                                    @else
                                        <option value="{{ $role->id }}">
                                            {{ $role->name }}</option>
                                    @endif
                                @endforeach

                            </select>
                            @error('role')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        @if($createMode)
                        Create this user
                        @else
                        Update this user
                        @endif
                    </button>
                </div>
                {{-- </div> --}}
            </form>
        </div>
    </div>
</div>
