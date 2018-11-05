@extends('layouts.app')
@section('content')
<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link href="{{ asset('css/coin_shop.css') }}" rel="stylesheet">

<div class="row">
    <div class="body-content" style="width: 76%; margin:0 auto" align="center">
         <img src="/images/soon.png" style="width: 100%" alt="">
    </div>
    <div class="col-md-1"></div>
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
