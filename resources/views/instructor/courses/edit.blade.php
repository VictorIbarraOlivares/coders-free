<x-app-layout>
    <div class="container py-8 grid grid-cols-5">
        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 border-indigo-400 pl-2">
                    <a href="">Información del curso</a>
                </li>

                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Lecciones del curso</a>
                </li>

                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Metas del curso</a>
                </li>

                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Estudiantes</a>
                </li>
            </ul>
        </aside>

        <div class="card col-span-4">
            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
                <hr class="mt-2 mb-6">

                {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put']) !!}
                    <div class="mb-4">
                        {!! Form::label('title', 'Título del curso ') !!}
                        {!! Form::text('title', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block w-full mt-1']) !!}
                    </div>

                    <div class="mb-4">
                        {!! Form::label('slug', 'Slug del curso ') !!}
                        {!! Form::text('slug', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-400 block w-full mt-1']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script>
            //Slug automático
            document.getElementById("title").addEventListener('keyup', slugChange);

            function slugChange(){
                
                title = document.getElementById("title").value;
                document.getElementById("slug").value = slug(title);

            }

            function slug (str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }


            //CKEDITOR

            // ClassicEditor
            //     .create( document.querySelector( '#description' ), {
            //         toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
            //         heading: {
            //             options: [
            //                 { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            //                 { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            //                 { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            //             ]
            //         }
            //     } )
            //     .catch( error => {
            //         console.log( error );
            //     } );

            //     //Cambiar imagen
            // document.getElementById("file").addEventListener('change', cambiarImagen);

            // function cambiarImagen(event){
            //     var file = event.target.files[0];

            //     var reader = new FileReader();
            //     reader.onload = (event) => {
            //         document.getElementById("picture").setAttribute('src', event.target.result); 
            //     };

            //     reader.readAsDataURL(file);
            // }
        </script>
    </x-slot>
</x-app-layout>