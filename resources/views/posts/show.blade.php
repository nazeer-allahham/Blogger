@extends ('partials.master')

@section('title')
Post #{{$post->id}}
@endsection

@section('style')
.user-thumbnail {
    width: 48px;
    position: absolute;
    top: 12px;
    right: 12px;
}
@endsection

@section('content')
<div class="mb-5 mt-1">
    @if($flash = session('message'))
    <div class="alert alert-warning alert-dismissible fade show col-8 mx-auto" role="alert">
        <strong>{{ $flash }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card mx-auto col-8 my-0">
        <div class="card-body mb-0">
            <div class="row ">
                <img src="{{ asset('images/male-user.png') }} " class="rounded-circle" style="width:48px;height:48px;margin:4px 12px" />
                <div>
                    <h5 class="card-title mb-0">{{ $post->publisherName() }}</h5>
                    <label class="card-date text-muted" >{{ $post->created_at->diffForHumans() }} <span class="fa fa-globe"></span></label>
                </div>
            </div>
            <p class="card-text text-align-left">{{$post->body}}</p>
            <div class="row ">
                <form method="POST" action="/posts/{{ $post->id }}/like" class="col-6">
                    @csrf
                    <button type="submit" class="btn btn-light form-control"><span class="fa fa-heart"></span> {{ count($post->likes) }}</button>
                </form>
                <form method="POST" action="/posts/{{ $post->id }}/show" class="col-6" >
                    @csrf
                    <button type="submit" class="btn btn-light form-control"><span class="fa fa-comment"></span></button>
                </form>
            </div>
        </div>
        <div class="col-12 mx-auto">
        @include('posts.comments')
        </div>
    </div>
</div>
@endsection