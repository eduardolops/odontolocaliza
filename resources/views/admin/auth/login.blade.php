@extends('structures.login_template')

@section('content')
    <form role="form" method="POST" action="{{ url('/admin/login') }}">
        {{ csrf_field() }}
        @if ($errors->has('errors'))
            <span class="help-block">
                <strong>{{ $errors->first('errors') }}</strong>
            </span>
        @endif
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color: #25a9e0;">Logar</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection