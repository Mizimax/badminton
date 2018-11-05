@extends('layouts.app')
@section('content')
<link href="{{ asset('css/event.css?'.time()) }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

    </div>
    <div class="col-md-3"></div>
</div>
<form action="/edit_score{{ isset($event_id) ? '/'. $event_id : ' ' }}" method="post">

@if (Session::get('message'))
<div class="form-group">
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
</div>
@endif
@if (Session::get('error'))
<div class="form-group">
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('error')}}
</div>
</div>
@endif
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 body-content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center"><h1>KMUTT 1</h1></div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3" align="right">เลข match</div>
            <div class="col-md-3" ><input class="form-control" type="text" id="match" name="match"></div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center"><button type="button" class="btn primary" onclick="search_match()">ค้นหา</button></div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center"><hr></div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" align="center">
            <div id="form_match"></div>

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
</form>

@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    function search_match(){
        match = $('#match').val();
        match = match? match:1;
        $.ajax({
            url: '/search_match/' + "{{ isset($event_id) ? $event_id .'/' : '' }}" + match,
            success: function(data){
                $('#form_match').html(data);
            }
        });
    }
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127412532-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-127412532-1');
</script>

@endsection
