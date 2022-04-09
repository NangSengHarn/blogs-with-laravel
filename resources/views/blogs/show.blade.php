<x-layout>
    <x-slot name="title">
        {{$blog->title}}
    </x-slot>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src='{{asset("storage/$blog->thumbnail")}}'
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div>
              <div>Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
              <div><a href="/categories/{{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a></div>
              <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
              <div class="text-secondary">
                @auth
                <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                  @csrf
                  @if (auth()->user()->isSubscribed($blog))
                  <button class="btn btn-danger">unsubscribe</button>
                  @else
                  <button class="btn btn-warning">subscribe</button>
                  @endif
                </form>
                @endauth
              </div>
          </div>
          <p class="lh-md mt-3">
            {!!$blog->body!!}
          </p>
        </div>
      </div>
    </div>

    <section class="container">
        <div class="col-md-8 mx-auto">
          @auth
          <x-comment-form :blog="$blog"/>
          @else
          <p class="text-center">Please <a href="/login">login</a> to participate in this discussion.</p>
          @endauth
        </div>
    </section>
    @if ($blog->comments->count())
    <x-comments :paginatedcomments="$blog->comments()->latest()->paginate(3)"
                :allcomments="$blog->comments" />
    @endif

    <x-blogs-you-may-like :randomBlogs="$randomBlogs"/>
    </div>
</x-layout>

