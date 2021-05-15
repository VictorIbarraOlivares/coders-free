<div>
    @foreach ($section->lessons as $item)
        <article x-data="{ open : false }" class="card mt-4">
            <div class="card-body">
                @if ( $lesson->id == $item->id )
                    <form wire:submit.prevent='update'>
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="lesson.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-1">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="lesson.platform_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-1" >
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}" >{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center">
                            <label class="w-32">URL:</label>
                            <input wire:model="lesson.url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-4">
                        </div>
                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button wire:click="cancel" type="button" class="btn btn-danger">Cancelar</button>
                            <button type="submit" class="btn btn-primary ml-2">Actualizar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i>Lección: {{ $item->name }}</h1>
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}" target="_blank" >{{ $item->url }}</a></p>

                        <div class="my-2">
                            <button wire:click='edit({{ $item }})' class="btn btn-primary text-sm" >Editar</button>
                            <button wire:click="destroy({{ $item }})" class="btn btn-danger text-sm" >Eliminar</button>
                        </div>

                        <div class="mb-4">
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description'. $item->id))
                        </div>
                        <div>
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources'. $item->id))
                        </div>
                    </div>
                @endif
            </div>
            </article>
    @endforeach

    <div x-data="{ open:false }" class="mt-4">
        <a x-on:click="open = true" x-show="!open" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva lección
        </a>

        <article x-show="open" class="card" >
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>
                <div class="mb-4">
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-1">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select wire:model="platform_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-1" >
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}" >{{ $platform->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('platform_id')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex items-center">
                        <label class="w-32">URL:</label>
                        <input wire:model="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-4">
                    </div>
                    @error('url')
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
