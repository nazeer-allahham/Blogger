@extends ('partials.master')

@section('title')
Blogger - {{auth()->user()->name}}
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <profile-edit v-bind:details="{{json_encode(auth()->user()->details())}}"></profile-edit>
        </div>
    </div>
</div>
@endsection
