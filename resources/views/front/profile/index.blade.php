@extends('layouts.app')
@section('content')
<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link href="/css/datepicker.min.css" rel="stylesheet">
<link href="/css/app.css" rel="stylesheet">
<link href="/css/profile.css" rel="stylesheet">



<div class="container">
  <div class="container-profile">
      <div class="row">
        <div class="col-xl-12">
          <span class="profile-text">PLAYER PROFILE</span><br>
          </div>
          </div>
        </div>
        </div>


      <div class="container">
    <div class="container-profile">
   <div class="row">
     <div class="col-md-5">
      <div class="box-profile-list box-profile">
      <span>PLAYER PROFILE</span><br>
      <span>คู่กันมากที่สุดกับ</span><br>
      <span>kuy  kuy</span><br>
<span>ARIKA YOKO</span><br>

<div class="img-thumbnail img-circle">
  <div style="position: relative; padding: 0; cursor: pointer;" type="file">
    <img class="img-circle" src="/images/no_pic.jpg" style="width: 140px; height: 140px;" >
    <span style="position: absolute; color: red; bottom: 20px; left: 40px;">UPLOAD</span>
  </div>
</div>
<span>Ranking:</span><span>C+</span><br>
<img src="{{}" class="img-circle" height="57px">


      </div>
  </div>




       <div class="col-md-5">
         <div class="box-profile-detal box-profile box-profile-list-histor">
           <span>COMPETITION HISTOY</span><br>
         <div class="img-thumbnail img-circle-R">
           <div style="position: relative; padding: 0; cursor: pointer;" type="file">
             <img class="img-circle-R" src="/images/no_pic.jpg" style="width:40px; height:40px;" >
           </div>
         </div>
         <span>KMUTT OPEN</span><br>
         </div>
      </div>
      </div>
    </div>
  </div>







<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

@endsection
