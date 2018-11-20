@extends('layouts.app')
@section('content')
<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link href="{{ asset('css/coin_shop.css') }}" rel="stylesheet">
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=https://docs.google.com/forms/d/e/1FAIpQLSeEcA3Gt0NCC-lbAPDaERlejbCWlEnzcJWDmiiRIxLPZ316vQ/viewform">
<div class="row">
    <div class="body-content col-md-6" style="width: 75%;" align="center">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeEcA3Gt0NCC-lbAPDaERlejbCWlEnzcJWDmiiRIxLPZ316vQ/viewform" width="400px" height="700px;" scrolling="yes"></iframe>
    </div>

    <div class="col-md-1">

    </div>
</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127412532-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-127412532-1');
</script>

@endsection
