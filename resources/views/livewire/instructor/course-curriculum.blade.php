<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="text-2xl fond-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)
        <article x-data="{ open : true }" class="card mb-6">
            <div class="card-body bg-gray-100">
                @if ( $section->id == $item->id )
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-1" placeholder="Ingrese el nombre de la sección" >
                        @error('section.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección:</strong> {{ $item->name }}</h1>
                        <div class="">
                            <i wire:click='edit({{ $item }})' class="fas fa-edit cursor-pointer text-blue-500"></i>
                            <i wire:click="destroy({{ $item }})" class="fas fa-eraser cursor-pointer text-red-500"></i>
                        </div>
                    </header>

                    <div x-show="open">
                        @livewire('instructor.course-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{ open:false }">
        <a x-on:click="open = true" x-show="!open" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva sección
        </a>

        <article x-show="open" class="card" >
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>
                <div class="mb-4">
                    <input wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-1" placeholder="Escriba el nombre de la sección">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button x-on:click="open = false" class="btn btn-danger">Cancelar</button>
                    <button wire:click="store" class="btn btn-primary ml-2">Agregar</button>
                </div>
            </div>

        </article>
    </div>
</div>
