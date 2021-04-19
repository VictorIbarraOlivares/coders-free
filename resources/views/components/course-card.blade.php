@props(['course'])

<article class="bg-white shadow-lg rounded overflow-hidden">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}">

    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
        <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>

        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>

                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>

                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>

                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                </li>

                <li class="mr-1">
                    <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
            </ul>

            <p class="text-sm text-gray-500 ml-auto"><i class="fa fa-users"></i>({{ $course->students_count }})</p>
        </div>

        <a href="{{ route('courses.show', $course) }}" class="block text-center w-full mt-4 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Más información</a>
    </div>
</article>