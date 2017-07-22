@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Update Item</h1>
	
	<form method="POST" action="{{ route('sell.update', $sell->id) }}">

	{{	csrf_field() }}
	{{ method_field('PUT') }}

	<div class="form-group">

		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" value={{ $sell->name }}>
			</div>
		</div>

		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="description" name="description">{{ $sell->description }}</textarea>
			</div>
		</div>

		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Unit Price</label>
			<div class="col-sm-10">
				<input type="text" class="form-control text-right" id="unitprice" name="unitprice" value={{ $sell->unitprice }}>
			</div>
		</div>

		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Quantity</label>
			<div class="col-sm-10">
				<input type="text" class="form-control text-right" id="quantity" name="quantity" value={{ $sell->quantity }}>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="offset-sm-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Update</button>
				<a href="{{ URL::previous() }}" class="btn btn-primary">Cancel</a>
			</div>
		</div>

	</div>
	</form>

	@include('partials.error')

  </div>
</section>

@endsection