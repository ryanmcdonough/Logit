<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
    <body>
        <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Loggit</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="login">
                                <i class="material-icons">fingerprint</i> Login
                            </a>
                        </li>
                        <li class="">
                            <a href="/register">
                                <i class="material-icons">person_add</i> Register
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="wrapper wrapper-full-page">
            <div class="full-page full-page-fixed login-page bg-full">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="card card-login card-hidden">
                                        <div class="text-center">
                                            <h3 class="card-title">Login to Logit</h3>
                                        </div>
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group label-floating {{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating {{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>
                                            <a href="/password/reset" class="btn btn-sm btn-simple btn-primary m-t-0 m-b-0">Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
        <!--             Core JS             -->
        <script src="{{ mix('/js/logit.min.js') }}"></script>
        <script src="{{ mix('/js/material-dashboard.min.js') }}"></script>
        <script type="text/javascript">
            $().ready(function() {

                setTimeout(function() {
                    // after 1000 ms we add the class animated to the login/register card
                    $('.card').removeClass('card-hidden');
                }, 700)
            });
        </script>
    </body>
</html>