<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>

    <x-table-responsive>
        <div class="px-6 py-4 ">
            <input wire:model='search' class="shadow appearance-none border rounded flex-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 w-full" placeholder="Ingrese el nombre de un curso ...">
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Ver</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ $student->profile_photo_url }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $student->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $student->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a  class="text-indigo-600 hover:text-indigo-900">Ver</a>
                        </td>
                    </tr>  
                @empty
                    <tr>
                        <th colspan="5" scope="col" class="relative px-6 py-3 items-center">
                            <span>No hay registros que coincidan con la búsqueda "{{ $search }}"</span>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-6 py-4">
            {{ $students->links() }}
        </div>

    </x-table-responsive>
</div>
