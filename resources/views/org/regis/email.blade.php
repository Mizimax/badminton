@extends('layouts.app')

@section('content')
@include('org/header')
<div id="content">
  <div class="row" style="margin: 15px 0 50px 0;" align="center">
    <div class="col-sm-4">
      <div class="step pointer" onclick="window.location='/org/register?edit=true'">
        <div>กรอกใบสมัคร<br>
        ข้อมูลเบื้องต้น</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="step pointer" onclick="window.location='/org/register/step/verify?edit=true'">
        <div>ข้อมูลยืนยัน<br>
        และประวัติการจัด</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="step active">
        <div>ดำเนินการ<br>
        เสร็จสิ้น</div>
      </div>
    </div>
  </div>
  
  <div align="center">
    <span class="glyphicon glyphicon-ok-sign" style="color:#7FE18E; font-size: 120px"></span><br>
    <span class="font-bold font-big color-black">ข้อความคุณถูกส่งแล้ว<br>กรุณารอการยืนยันใน Email</span>
  </div>
</div>
<br><br><br>
@endsection