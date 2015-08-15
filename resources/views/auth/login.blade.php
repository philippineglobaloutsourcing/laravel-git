@extends('app')

@section('content')

	<div class="container">
		<div class="col-sm-8 col-sm-offset2 col-md-6 col-md-offset-3">
			<div class="text-center">
				<img src="" width="150" height="150">
			</div>

			<div>&nbsp;</div>
			<div>&nbsp;</div>

			<form action="/auth/login" method="POST">
				<div>
					<input type="text" name="email" placeholder="Email" class="form-control">
				</div>

				<div>&nbsp;</div>

				<div>
					<input type="password" name="password" placeholder="Password" class="form-control">
				</div>

				<div>&nbsp;</div>

				<div class="text-center">
					<button type="submit" class="btn btn-primary">Start</button>
				</div>
			</form>
		</div>
	</div>

@stop