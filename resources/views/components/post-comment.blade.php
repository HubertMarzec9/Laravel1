@props(['comment'])

<article class="flex border border-gray-200 p-6 rounded-xl space-x-4 mb-5">
    <div class="flex-shrink-0 ">
        <img class="rounded-xl" src="https://i.pravatar.cc/100">
    </div>

    <div>
        <header>
            <h3 class=""><strong>{{$comment->author->username}}</strong></h3>
            <small>
                <p>Posted
                    <time> {{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </small>
        </header>

        <p class="mt-2">
            {{$comment->body}}
        </p>
    </div>
</article>
