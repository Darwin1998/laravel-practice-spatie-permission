<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                          <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                <form action="{{ route('admin.roles.update', ['role' => $role->id ]) }}" method="POST" py-2 px-2">
                                    @csrf
                                    @method('PUT')
                                    <label for="name" class="flex justify-center">Role Name</label>
                                    <input type="text" value="{{$role->name}}" name="name" class="text-center text-lg  py-3 px-4 block w-full border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 bg-slate-300 dark:border-gray-700 dark:text-black">
                                    @error('name')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="flex justify-center py-3 px-4 pt-2 w-full items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800">Submit</button>

                                </form>
                            </div>
                            <div class="mt-6 p-2">
                                <h2 class="text-2xl font-semibold">
                                    Role Permission
                                </h2>
                                <div class="mt-4 p-2">
                                    @if ($role->permissions)
                                        @foreach ($role->permissions as $role_permission )
                                        <form action="{{ route('admin.roles.permission.revoke', ['role' => $role->id , 'permission' => $role_permission->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"> delete: {{ $role_permission->name }} </button>
                                        </form>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                    <form action="{{ route('admin.roles.permission', ['role' => $role->id ]) }}" method="POST" py-2 px-2">
                                        @csrf
                                        <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</label>
                                        <select id="permission" name="permission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-800 dark:focus:border-blue-500">

                                           @foreach ($permissions as $permission )
                                               <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                           @endforeach
                                        </select>
                                        @error('name')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                        <button type="submit" class="flex justify-center py-3 px-4 pt-2 w-full items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800">Submit</button>

                                    </form>
                                </div>
                            </div>

                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
