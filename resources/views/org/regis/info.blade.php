@extends('layouts.app')

@section('content')

@include('org/header')
<div id="content">
  <div class="row">
    <div class="col-sm-4">
      <div class="step active"></div>
    </div>
    <div class="col-sm-4">
      <div class="step"></div>
    </div>
    <div class="col-sm-4">
      <div class="step"></div>
    </div>
  </div>
  
  <div class="form">
    <form action="" method="post">
      <div class="row">
        <div class="col-sm-3">ชื่อ</div>
        <div class="col-sm-9 nopadding">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">นามสกุล</div>
        <div class="col-sm-9 nopadding">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">ชื่อเล่น</div>
        <div class="col-sm-9 nopadding">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">เบอร์โทร</div>
        <div class="col-sm-9 nopadding">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">Email</div>
        <div class="col-sm-9 nopadding">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 nopadding">
          <button type="button" class="btn btn-success btn-lg">ถัดไป</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection