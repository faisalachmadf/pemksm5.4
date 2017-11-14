@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><center>Biro Pemerintahan dan Kerja Sama <br/>Provinsi Jawa Barat</center></h2></div>

                <div class="panel-body">
                  <center> </center>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              

                <div class="panel-body">
                    @if ($errors->has('credential'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ $errors->first('credential') }}</strong>
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('auth.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="credential" class="col-md-4 control-label">Username/E-Mail</label>

                            <div class="col-md-6">
                                <input id="credential" type="text" class="form-control" name="credential" value="{{ old('credential') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

