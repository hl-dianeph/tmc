@extends('backend.layouts.page')


@section('content')

<div id="back-to-home" class="hidden-sm hidden-xs">
	<a href="/" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
</div>
<div class="simple-page-wrap">
	<div class="simple-page-logo animated swing">
		<a href="index.html">
			<!-- <span><i class="fa fa-gg"></i></span> -->
			<span>Панель администратора</span>
		</a>
	</div><!-- logo -->
	<div class="simple-page-form animated flipInY" id="login-form">
		<h4 class="form-title m-b-xl text-center">Добро пожаловать!</h4>

		@if ($errors->has('email') || $errors->has('password'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Ошибка! </strong>
				<span>Неверный логин или пароль.</span>
			</div>
		@endif

		<form method="post" action="{{ url('/login') }}">
			{!! csrf_field() !!}
			<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
				<input id="sign-in-email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="required">
			</div>

			<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
				<input id="sign-in-password" type="password" class="form-control" placeholder="Password" name="password" required="required">
			</div>

			<div class="form-group m-b-xl">
				<div class="checkbox checkbox-primary">
					<input type="checkbox" id="keep_me_logged_in" name="remember"> 
					<label for="keep_me_logged_in">Запомнить меня</label>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Вход">
		</form>
	</div><!-- #login-form -->

	{{--
	<div class="simple-page-footer">
		<p><a href="password-forget.html">FORGOT YOUR PASSWORD ?</a></p>
		<p>
			<small>Don't have an account ?</small>
			<a href="signup.html">CREATE AN ACCOUNT</a>
		</p>
	</div><!-- .simple-page-footer -->
	--}}

</div><!-- .simple-page-wrap -->


@endsection