@extends ('partials.master')

@section('title')
Home
@endsection

@section('style')

.carousel-main {
  margin-bottom: 20px;
}

.carousel-item {
  height: 34em;
}

.carousel-item img {
  height: 34em;
  margin: auto auto;
}

#guest {
  width: 100%;
  margin: 4em auto;
  padding: 4em 2em;
  position: fixed;
  top: 30%;
}
@endsection

@section ('content')
<div id="carousel-main" class="carousel slide bg-dark my-2" data-ride="carousel" data-interval="1000">
  <ol class="carousel-indicators">
    <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-main" data-slide-to="1"></li>
    <li data-target="#carousel-main" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block img-responsive" src="{{ asset('/images/logo.png') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-responsive" src="{{ asset('/images/male-user.png') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-responsive" src="{{ asset('/images/female-user.png') }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel-main" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-main" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@guest
<div id="guest" class="bg-light container" style="z-index:10">
  <button type="button" class="close" aria-label="Close" onclick="document.getElementById('guest').style['display'] = 'none'">
    <span aria-hidden="true">&times;</span>
  </button>
  <h1>It's Look Like You Are Not Connected To Any Account</h1>
  <h3>Please <a href="/login" class="btn btn-primary">Login</a> To You Account or <a href="/register" class="btn btn-danger">Register</a> New One If You Don't Have</h3>
  <h5></h5>
</di>
@endguest
@endsection