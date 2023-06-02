<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end py-2 px-2">
                    <a href="{{route('admin.roles.create')}}" type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800">Create</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                          <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                  <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>

                                  </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 ">
                                    @foreach ($roles as $role)
                                      <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $role->name }}</td>

                                        <td class="text-right">
                                            <div class="px-2">
                                                <form action="{{ route('admin.roles.destroy', ['role' => $role->id ]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"> DELETE </button>
                                                </form>
                                                <a href="{{ route('admin.roles.edit', ['role' => $role->id]) }}"> Edit</a>
                                            </div>

                                        </td>

                                      </tr>
                                    @endforeach

                                </tbody>
                              </table>

                            </div>
                            {{ $roles->links() }}
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
