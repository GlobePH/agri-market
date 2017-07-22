@extends ('layouts.master')

@section ('content')
<section class="jumbotron text-center" style="border-style: dotted;">Advertisement</section>
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                
				<div class="thumbnail">
				
					<img src="http://localhost/img/320x150.png" alt="">
					<div class="caption">
						<h4 class="pull-right">&#8369; 1,500.00 </h4>
						<h4><a href="http://localhost/sell/1">Rhode Island</a>
						</h4>
						<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>

				</div>

				<div class="thumbnail">
				
					<img src="http://localhost/img/320x150.png" alt="">
					<div class="caption">
						<h4 class="pull-right">&#8369; 1,500.00 </h4>
						<h4><a href="http://localhost/sell/1">Rhode Island</a>
						</h4>
						<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>

				</div>	

            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">&#8369; {{ number_format($sell->unitprice, 2, '.', ',') }} </h4>
                        <h4><a href="#">{{ $sell->name }}</a>
                        </h4>
                        <p>{{ $sell->description }}</p>
                        <p>Want to make these reviews work? Check out
                            <strong><a href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this building a review system tutorial</a>
                            </strong>over at maxoffsky.com!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                    @if ( Auth::User() )
	                    <form action="{{ route('sellreview.store', $sell->id) }}" method="POST">
	                    {{ csrf_field() }}
	                    	<textarea class="form-control" rows="5" id="review" name="review"></textarea>
	                    	<br>
	                    	<select name="rating" id="rating">
	                    		@for ($r = 5; $r >= 1; $r--)
	                    		<option value={{$r}}>{{$r}}</option>
	                    		@endfor;
	                    	</select>
	                    	<button type="submit" class="btn btn-success">Leave a Review</button>

	 					</form>
	 					<br>
	 					@include('partials.error')
	 				@endif
                    </div>

                    @foreach ($reviews as $review)

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                        	@for ($i = 1; $i <= 5; $i++)
							    @if ($i > $review->rating)
							    <span class="glyphicon glyphicon-star-empty"></span>
	                            @else 
	                            <span class="glyphicon glyphicon-star"></span>
							    @endif
							@endfor

                            {{ $review->user->name }}
                            <span class="pull-right">{{ $review->created_at->diffForHumans() }}</span>
                            <p>{{ $review->review }}</p>
                        </div>
                    </div>

                    @endforeach

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

@endsection