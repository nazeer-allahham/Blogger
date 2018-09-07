@extends ('partials.master')

@section('title')
Posts
@endsection

@section('style')
.user-thumbnail {
    width: 48px;
    position: absolute;
    top: 12px;
    left: 12px;
}
@endsection

@section('content')
<div>
    <create-post v-bind:gender="{{json_encode(auth()->user()->gender) }}"></create-post>

    @include('posts.allposts')
</div>
@endsection