<!-- login.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container transparent">
    <div class="row" align="center">
        <div style="width: 500px; max-width: 90%; padding: 40px 0;">
            <div class="panel panel-default" align="left">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ Request::fullUrl() }}">

                        <div style="max-width: 250px; width: 70%; margin: 0 auto;">
                            <form action="login" method="post" onSubmit="return check_form_register()">
                                @if (Session::get('error'))
                                <div class="form-group">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{Session::get('error')}}
                                </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
                                <div class="form-group" align="center">
                                    <button type="submit" class="btn btn-default">Login</button>
                                </div>
                            </form>   
                     </div>
                     <div class="row">
                     <div class="col-md-5"></div>
                     <div class="col-md-5"></div>
                     </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3" align="center" style="border-top: 1px solid #ccc">
                                <br>
                              <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
                              <br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection