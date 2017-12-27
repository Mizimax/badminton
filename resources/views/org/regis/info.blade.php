@extends('layouts.app')

@section('content')

@include('org/header')
<div id="content">
  <div class="row" style="margin: 15px 0 50px 0;" align="center">
    <div class="col-sm-4">
      <div class="step active">
        <div>กรอกใบสมัคร<br>
        ข้อมูลเบื้องต้น</div>
      </div>
    </div>
    <div class="col-sm-4" onclick="window.location='/org/register/step/verify'">
      <div class="step pointer">
        <div>ข้อมูลยืนยัน<br>
        และประวัติการจัด</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="step pointer" onclick="window.location='/org/register/step/email'">
        <div>ดำเนินการ<br>
        เสร็จสิ้น</div>
      </div>
    </div>
  </div>
  
  <div class="form">
    <form action="" method="post">
      <div class="row">
        <div class="col-sm-3">ชื่อ</div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="org_firstname" name="org_firstname" value="{{ $Firstname }}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">นามสกุล</div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="org_lastname" name="org_lastname" value="{{ $Lastname }}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">ชื่อเล่น</div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="org_nickname" name="org_nickname" value="{{ $Nickname }}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">เบอร์โทร</div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="org_phone" name="org_phone" value="{{ $Phone }}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">Email</div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="org_email" name="org_email" value="{{ $Email }}">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
          <button type="submit" class="btn btn-success btn-lg">ถัดไป</button>
        </div>
      </div>
    </form>
  </div>
</div>
<br><br><br>

@endsection