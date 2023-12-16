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
<body class="w-full h-full bg-gray-100">
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            All Articles
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

    <div class="py-10 sm:py-20">
        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
           href="{{route('blog.create')}}">
            create
        </a>
    </div>
</div>
@foreach($comments as $comment)

<div class="w-4/5 mx-auto pb-10" name="{{$comment->id}}">
    <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
        <div class="w-11/12 mx-auto pb-10">
            <h2 class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">


                @foreach($comment->categories as $category)

                <a href="{{route('blog.show' , ['id'=>$category->id])}}">
                   {{$category->titel}}<br>
                    @endforeach
                </a>
            </h2>

                <a
                   class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                   user_name= {{$comment->username}}
                </a>
            <p class="text-gray-900 text-lg py-8 w-full break-words">
              comment=  {{$comment->comment}}
            </p>

            <span class="text-gray-500 text-sm sm:text-base">

                        <a href="{{route('blog.edit' , ['id'=>$comment->id])}}"
                           class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                            update
                        </a>
                /
                <a href="{{route('blog.destroy' , ['id'=>$comment->id])}}"
                   class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                            delete
                        </a>

                </span>

                <br>

        </div>
    </div>
</div>

@endforeach
{{--@endforeach--}}
</body>
</html>
