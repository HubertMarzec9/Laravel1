<article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
    <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

        <p class="mt-4 block text-gray-400 text-xs">
            Published
            <time>{{$post->created_at->diffForHumans()}}</time>
        </p>

        <div class="flex items-center lg:justify-center text-sm mt-4">
            <img src="{{asset('images/lary-avatar.svg')}}" alt="avatar">
            <div class="ml-3 text-left">
                <h5 class="font-bold">{{$post->author->name}}</h5>
            </div>
        </div>
    </div>

    <div class="col-span-8">
        <div class="hidden lg:flex justify-between mb-6">
            <a href="/"
               class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path class="fill-current"
                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                        </path>
                    </g>
                </svg>

                Back to Posts
            </a>

            <div class="space-x-2">
                <a href="/categories/{{$post->category->slug}}"
                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                   style="font-size: 10px">{{$post->category->name}}</a>
            </div>
        </div>

        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
            {{$post->title}}
        </h1>

        <div class="space-y-4 lg:text-lg leading-loose">
            <p>
                {{$post->body}}
            </p>
        </div>
    </div>
</article>
<section>
    @auth()
        <section class="flex border border-gray-200 p-6 rounded-xl space-x-4 mb-5">
            <form action="/posts/{{$post->id}}/comments" method="post">
                @csrf
                <label for="body">Comment:</label>
                <textarea name="body" id="body" class="w-full" cols="200" rows="5"></textarea><br>
                <button type="submit" class="border border-gray-200 bg-gray-300 p-2 hover:bg-gray-200">Comment</button>
            </form>
        </section>
    @endauth

    @foreach($post->comments as $comment)
        <x-post-comment :comment="$comment"></x-post-comment>
    @endforeach
</section>
