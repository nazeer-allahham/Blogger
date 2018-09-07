@extends ('partials.master')

@section('title')
Blogger - {{auth()->user()->name}}
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
    <div class="col-8 mx-auto">
        @foreach ($posts as $post)
        <div class="card mx-auto mt-0 my-2">
            <div class="card-body mb-0">
                <div class="row">
                    <img src="{{ asset($post->publisherGender() === 'male' ? 'images/male-user.png':'images/female-user.png') }} " class="rounded-circle" style="width:48px;height:48px;margin:4px 12px" />
                    <div>
                        <h5 class="card-title mb-0">{{ $post->publisherName() }}</h5>
                        <label class="card-date text-muted" >{{ $post->created_at->diffForHumans() }} <span class="fa fa-globe"></span></label>
                    </div>
                </div>
                <p class="card-text text-align-left">{{$post->body}}</p>
                <div class="row">
                    <form method="POST" action="/posts/{{ $post->id }}/like" class="col-6">
                        @csrf
                        <button type="submit" class="btn btn-light form-control"><span class="fa fa-heart"></span> {{ count($post->likes) }}</button>
                    </form>
                    <form method="POST" action="/posts/{{ $post->id }}" class="col-6" >
                        @csrf
                        <button type="submit" class="btn btn-light form-control"><span class="fa fa-comment"></span></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
@endsection
