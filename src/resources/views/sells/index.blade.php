@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Agri Market Items</h1>
    
    <p>
      <a href="{{ route('sell.create') }}" class="btn btn-primary">Sell Item</a>
      <a href="{{ route('buyer.create') }}" class="btn btn-secondary">Buy Item</a>
    </p>
  </div>
</section>

<div class="album text-muted">
  <div class="container">

    <div class="row">

      @foreach ($sells as $sell)

      <div class="col-sm-4 col-lg-4 col-md-4">

        <div class="thumbnail">
            <img src="{{ url('/') }}/img/350x280.png" alt="">
            <div class="caption">
                <div class="row">
                  <div class="col-sm-8"><h4 class="pull-left">&#8369; {{ number_format($sell->unitprice, 2, '.', ',') }} </h4></div>
                  <div class="col-sm-4 text-right"><a href="{{ route('sell.edit', $sell->id) }}">Edit</a></div>
                  <div class="col-sm-4 text-right"><a href="{{ route('sell.photo', $sell->id) }}">Photo</a></div>
                </div>
                <h4><a href="{{ route('sell.show', $sell->id) }}">{{  $sell->name }}</a>
                </h4>
                <p>{{  $sell->description }}</p>
                <p>{{  $sell->quantity }}</p>
            </div>
            <div class="ratings">
                <p class="pull-right">15 reviews</p>
                <p>
                {{  $sell->created_at->diffForHumans() }}
                {{  $sell->created_at->toFormattedDateString() }}
                {{-- For Ratings
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span> --}}
                </p>
            </div>
        </div>
      </div>
      @endforeach

      {{-- <div class="card">
        <img data-src="img/thumb.jpg" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>

      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>

      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card">
        <img data-src="holder.js/100px280/thumb" alt="Card image cap" style="height: 250px; width: 280px">
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div> --}}
     </div>
  </div>
</div>

@endsection