@extends('layouts.master')


@section('content')
<script type="text/javascript">
	var homeCoordinate = {{ json_encode($homeCoordinate) }}
</script>

<div class="row">
	<div class="col-lg-12 text-center">
		<h1 class="page-header">Search Business</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row text-center">
	<div class="col-md-12">
		<form class="form-inline" role="form" method="get">
			<div class="form-group">
				<label class="sr-only" for="search_for">Search for</label>
				<input type="text" class="form-control input-lg" id="search_for" name="what"
				       placeholder="Business name or keywords" value="{{ $what }}" autofocus>
				<input type="text" class="form-control input-lg" id="search_where" name="where"
				       placeholder="Address, City or ZIP code" value="{{ $where }}">
			</div>



			<button type="submit" class="btn btn-default input-lg">Search</button>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		@if ($rows === null)
		<div class="row search-results">
			<div class="col-lg-12">
			</div>
		</div>
		@elseif (count($rows))
		<div class="row search-results">
			<div class="col-md-12">
				@foreach ($rows as $row)
				<div class="search-result-item" data-id="{{ $row['id'] }}" lat="{{ $row['Latitude'] }}" lon="{{ $row['Longitude'] }}">
					<address>
						<strong><span class="business-name">{{ $row['Business_Name'] }}</span> <small>{{ $row['BizType'] }}</small></strong><br/>
						<small>
							Categories: {{ $row['Categories'] }}<br/>
							Tags: {{ $row['Tags'] }}<br/>
							Distance: {{ sprintf('%.02f', $row['distance']) }} miles</small>
						<br>{{ nl2br($row['Address']) }}
						<br>{{ $row['City'] }}, {{ $row['State'] }} {{ $row['Zip_Code'] }}
						<br>
						<abbr title="Phone"><span class="glyphicon glyphicon-phone-alt"></span></abbr> {{ $row['Phone_Number'] }}
					</address>
				</div>
				@endforeach
			</div>

		</div>
		<div class="row text-center">
			<small>SQL performed in {{ sprintf('%.05f', $t) }} seconds</small>
		</div>
		@else
		<div class="row search-results">
			<div class="col-lg-12 text-center">
				No results
			</div>
		</div>
		@endif
	</div>
	<div class="col-md-8 map-container">
		<div id="gmap"></div>
	</div>
</div>


@stop