@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Agri Market Items</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <a href="{{ route('sell.index') }}" class="btn btn-primary">Selling</a>
      <a href="{{ route('buyer.index') }}" class="btn btn-success">Buying</a>
    </p>
  </div>
</section>

<div class="album text-muted">
  <div class="container">

    <div class="row">

      @foreach ($sells as $sell)
      <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
              <img src="{{ url('/') }}/img/320x150.png" alt="">
              <div class="caption">
                  <h4 class="pull-right">&#8369; {{ number_format($sell->unitprice, 2, '.', ',') }} </h4>
                  <h4><a href="{{ route('sell.show', $sell->id) }}">{{ $sell->name }}</a>
                  </h4>
                  <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="ratings">
                  <p class="pull-right">12 reviews</p>
                  <p>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                  </p>
              </div>
          </div>
      </div>
      @endforeach

      <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
              <img src="{{ url('/') }}/img/320x150.png" alt="">
              <div class="caption">
                  <h4 class="pull-right">$64.99</h4>
                  <h4><a href="#">Second Product</a>
                  </h4>
                  <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="ratings">
                  <p class="pull-right">12 reviews</p>
                  <p>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                  </p>
              </div>
          </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
              <img src="{{ url('/') }}/img/320x150.png" alt="">
              <div class="caption">
                  <h4 class="pull-right">$74.99</h4>
                  <h4><a href="#">Third Product</a>
                  </h4>
                  <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="ratings">
                  <p class="pull-right">31 reviews</p>
                  <p>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                  </p>
              </div>
          </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
              <img src="{{ url('/') }}/img/320x150.png" alt="">
              <div class="caption">
                  <h4 class="pull-right">$84.99</h4>
                  <h4><a href="#">Fourth Product</a>
                  </h4>
                  <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="ratings">
                  <p class="pull-right">6 reviews</p>
                  <p>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                  </p>
              </div>
          </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
              <img src="{{ url('/') }}/img/320x150.png" alt="">
              <div class="caption">
                  <h4 class="pull-right">$94.99</h4>
                  <h4><a href="#">Fifth Product</a>
                  </h4>
                  <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="ratings">
                  <p class="pull-right">18 reviews</p>
                  <p>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                  </p>
              </div>
          </div>
      </div>

  </div>
</div>

@endsection