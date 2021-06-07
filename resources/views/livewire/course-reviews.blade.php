<section class="mt-4">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Valoración</h1>
    @can('enrolled', $course)
        <article class="my-4" >
            @can('valued',$course)
                <textarea wire:model="comment" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block mt-1" placeholder="Ingrese una reseña del curso"></textarea>

                <div class="flex mt-1 items-center mb-2">
                    <button wire:click='store' class="btn btn-primary mr-4">Guardar</button>
                    <ul class="flex">
                        <li class="mr-1 cursor-pointer" wire:click='$set("rating", 1)'>
                            <i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click='$set("rating", 2)'>
                            <i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click='$set("rating", 3)'>
                            <i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click='$set("rating", 4)'>
                            <i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click='$set("rating", 5)'>
                            <i class="fas fa-star text-{{ $rating == 5 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                    </ul>
                </div>
            @else
                <div class="relative px-4 py-3 leading-normal text-white bg-blue-500 rounded-lg" role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                    </span>
                    <p class="ml-6">Usted ya ha valorado este curso</p>
                </div>
            @endcan
        </article>
    @endcan
    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl mb-2">{{ $course->reviews->count() }} Valoraciones</p>
            @foreach ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $review->user->profile_photo_url }}" >
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{ $review->user->name }}</b><i class="fas fa-star text-yellow-300 ml-2"></i> ({{ $review->rating }})</p>

                            {{ $review->comment }}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
