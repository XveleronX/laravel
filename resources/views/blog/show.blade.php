<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        Laravel App
    </title>
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    />
</head>
<body>
    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{route('blog.index')}}"
               class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                < Back to previous page
            </a>
        </div>
        @foreach($categories as $category)
        <h4 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 sm:py-20">
            {{$category->titel}}
        </h4>


            @foreach($category->comments as $comment)
                <div class="w-4/5 mx-auto pb-10" >
                    <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
                        <div class="w-11/12 mx-auto pb-10">
        <div class="pt-10 pb-10 text-gray-900 text-xl">


            <p class="font-bold text-2xl text-black pt-10">

               {{$comment->comment}}<br>


            </p>

        </div>
            <div class="block lg:flex flex-row">
                <div class="basis-9/12 text-center sm:block sm:text-left">
                <span class="text-left sm:text-center sm:text-left sm:inline block text-gray-900 pb-10 sm:pt-0 pt-0 sm:pt-10 pl-0 sm:pl-4 -mt-8 sm:-mt-0">
                    Made by:
                    <a
                        href=""
                        class="font-bold text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                        {{$comment->username}}
                    </a>
                    On {{$comment->updated_at}}
                </span>
                </div>
            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    @endforeach
    </div>
    </body>
</html>
