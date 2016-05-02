@extends('master')
@section('content')

<style type="text/css">
	#gallery-images img {
		width: 240px;
		height: 160px;
		border: 2px solid black;
		margin-bottom: 10px;
	}
	#gallery-images ul {
		margin: 0;
		padding: 0;
	}
	#gallery-images li {
		margin: 0;
		padding: 0;
		list-style: none;
		float: left;
		padding-right: 10px;
	}

	#form_layout {

	}
</style>
<div class="row">
	<div class="col-md-12">
	<h1>My Gallery</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h1>{{ $gallery->name}}</h1>
		<h1>{{ $gallery->published}}</h1>
			
	</div>
</div>

	<div class="row">
		<div class="col-md-12">
			<div id="gallery-images">
				<ul>
					@foreach($gallery->images as $image)
						<li>
							<a href="{{ url('/gallery/images/thumbs/' . $image->file_name) }}" target="blank">
								<img src="{{ url('/gallery/images/thumbs/' . $image->file_name) }}" width="" ="50" height="50">
							</a>
						</li>
					@endforeach
				</ul>
				
			</div>
		</div>
	</div>
<div class="row">
	<div class="col-md-12">
		{!!Form::open(['url' => 'gallery/do-upload', 'class' => 'dropzone', 'id' => 'addImage']) !!}
		{!! csrf_field() !!}
		{!!Form::hidden('gallery_id', $gallery->id) !!}
		{!!Form::close() !!}
	</div>
	<div class="col-md-4">
		<a href="{{ url('gallery/list') }}" class="btn btn-primary">Back</a>
	</div>
</div>

@endsection
