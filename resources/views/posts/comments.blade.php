<div class="p-2 my-0">
    <form method="POST" action="/posts/{{$post->id}}/comments/push" id="create-new-post">
        @csrf
        <div class="form-group d-flex align-items-end">

            <textarea class="form-control post-body" name="body" placeholder="Write a comment..." style="padding:6px 60px 6px 12px;height:125px;"></textarea>
            <button type="submit" class="btn btn-primary btn-sm w-10 py-0 ml-auto" style="position:relative;left:-33px;top:-2px" onclick="">
                <span class="fa fa-paper-plane"></span>
            </button>
        </div>
    </form>
    <hr class="bg-dark">
    @foreach ($post->comments as $comment)
    <div class="media">
        <img class="mr-3" src="{{ asset('images/male-user.png') }}" style="height:48px;width:48px">
        <div class="media-body">
            <h5 class="mt-0">{{ $comment->publisherName() }}</h5>
            <label class="mt-0 text-muted" >{{ $post->created_at->diffForHumans() }} <span class="fa fa-globe"></span></label>
            <p style="overflow-wrap: break-word;">{{$comment->body}}</p>
        </div>
    </div>
    @endforeach
</div>