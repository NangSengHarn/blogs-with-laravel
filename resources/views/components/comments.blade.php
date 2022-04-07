@props(['paginatedcomments','allcomments'])
<section class="container">
    <div class="col-md-8 mx-auto">
        <h5 class="my-3 text-secondary">Comments ({{$allcomments->count()}})</h5>
        @foreach ($paginatedcomments as $comment)
        <x-single-comment :comment="$comment"/>
        @endforeach
        {{$paginatedcomments->links()}}
    </div>
</section>