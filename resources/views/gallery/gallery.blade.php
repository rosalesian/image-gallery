@extends('master')
@section('content')
<div class="row">
	<div class="col-md-12">
	<h1>My Gallery</h1>
	</div>
</div>

<dir class="row">
	<div class="col-md-8">
	
		@if($gallery->count() > 0)
			<table class="table table-striped table-bordered table-responsive" border="1">
				<thead>
					<tr>Name</tr>
					<tr>Publish</tr>
					<tr>Created</tr>
					<tr>View</tr>
				</thead>
				<tbody>
					@foreach($gallery as $gl)
					<tr>
						<td>{{ $gl->name }}</td>
						<td>{{ $gl->published }}</td>
						<td>{{ $gl->created_by }}</td>
						<td><a href="{{ url('gallery/view/' . $gl->id) }}">View</a>/
							<a href="{{ url('gallery/delete/' . $gl->id) }}">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				
			</table>
		@endif
	</div>
	<div class="col-md-4">
		<!-- <form class="form" method="POST" action="{{ url('gallery/save') }}"> -->
		{!! Form::open(['url' => 'gallery/save', 'class' => 'form']) !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

		<div class="form-group">
			<input type="text" name="gallery_name" id="gallery_name" placeholder="Name of Gallery" class="form-control/">
		</div>
		<br>
		<button class="btn btn-primary">Save</button>
	<!-- </form> -->
	{!! Form::close() !!}
	</div>
</dir>
@endsection
