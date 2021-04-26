<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            {!! $current->iframe !!}
            {{ $current->name }}

            <p>Indice : {{ $this->index }}</p>
            <p>previous : {{ $this->previous != null ?? $this->previous->id }}</p>
            <p>next : {{ $this->next != null ?? $this->next->id }}</p>
        </div>

        <div class="card">
            <div class="card-body">
                <h1>{{ $course->title }}</h1>

                <div class="flex items-center">
                    <figure>
                        <img src="{{ $course->teacher->profile_photo_url }}">
                    </figure>

                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500">{{ '@'.Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a class="font-bold">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a class="cursor-pointer" wire:click='changeLesson({{ $lesson }})' >{{ $lesson->id }}
                                            @if ($lesson->complete)
                                                (Completado)
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
