@extends ('partials.master')

@section('title')
Search
@endsection

@section('style')

@endsection

@section ('content')
<div class="accordion" id="search_results_accordion">
  <div class="card">
    <div class="card-header" id="accounts_match">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Users Accounts That Matched Searching Keys
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#search_results_accordion">
      <div class="card-body">
        @foreach ($results->accounts as $account)
        <div class="media">
            <img class="mr-3" src="{{ asset($account->gender === 'male' ? 'images/male-user.png':'images/female-user.png') }}" style="height:48px;width:48px">
            <div class="media-body">
                <h5 class="mt-0">{{ $account->name }}</h5>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="posts_match">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Posts Thier's Publisher's Name's Matched Searching Keys
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="posts_match" data-parent="#search_results_accordion">
      <div class="card-body">
        @foreach ($results->posts as $post)
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
</div>
@endsection