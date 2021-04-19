<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="container flex">
            <button wire:click="resetFilters" 
                    class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 focus:outline-none">
                <i class="fas fa-archway text-xs mr-2" ></i>
                Todos los cursos
            </button>

            <!-- Dropdown Categorias -->
            <div class="relative mr-4" x-data="{ open: false }">
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
                    x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm ml-2" ></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl"
                    x-show="open"
                    x-on:click.away="open = false">
                    @foreach ($categories as $category)
                        <a wire:click='$set("category_id", {{ $category->id }})'
                            x-on:click="open = false"
                            class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white">{{ $category->name }}</a>
                    @endforeach
                    
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

            <!-- Dropdown Niveles -->
            <div class="relative" x-data="{ open: false }">
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
                    x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-sm ml-2" ></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl"
                    x-show="open"
                    x-on:click.away="open = false">   
                    @foreach ($levels as $level)
                        <a wire:click='$set("level_id", {{ $level->id }})'
                            x-on:click="open = false"
                            class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white">{{ $level->name }}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->
        </div>
    </div>

    <div class="container grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>

    <div class="container mt-4 mb-8">
        {{ $courses->links() }}
    </div>
</div>
