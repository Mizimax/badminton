@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                                                                

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                            <a onclick="$('#logout-form').submit();">
                                            Logout
                                        </a>
                                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
