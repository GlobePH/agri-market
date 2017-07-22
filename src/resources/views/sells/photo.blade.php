@extends ('layouts.master')

@section ('content')
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Update Item</h1>

		<form method="POST" action="{{ route('photo.saveavatar') }}" enctype="multipart/form-data">

		{{ csrf_field() }}

		<div class="form-group row">
			<label for="name" class="col-sm-3 col-form-label">Avatar</label>
			<div class="col-sm-8">
				<input type="file" class="form-control text-right" name="avatar" id="avatar"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-3 col-form-label">Photo Album (Max 5)</label>
			<div class="col-sm-8">
				<input type="file" class="form-control text-right" name="photo1" id="photo1"/>
				<input type="file" class="form-control text-right" name="photo2" id="photo2"/>
				<input type="file" class="form-control text-right" name="photo3" id="photo3"/>
				<input type="file" class="form-control text-right" name="photo4" id="photo4"/>
				<input type="file" class="form-control text-right" name="photo5" id="photo5"/>
			</div>
		</div>


		<button type="submit" class="btn btn-primary">Save Avatar</button>

		</form>

	@include('partials.error')

  </div>
</section>
@endsection()