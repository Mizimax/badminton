@extends('layouts.app')

@section('content')

@include('org/header')
<form action="" method="post">
<div id="content">
  <div class="row" style="margin: 15px 0 50px 0;" align="center">
    <div class="col-sm-4">
      <div class="step pointer" onclick="window.location='/org/register?edit=true'">
        <div>กรอกใบสมัคร<br>
        ข้อมูลเบื้องต้น</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="step active">
        <div>ข้อมูลยืนยัน<br>
        และประวัติการจัด</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="step pointer" onclick="window.location='/org/register/step/email?edit=true'">
        <div>ดำเนินการ<br>
        เสร็จสิ้น</div>
      </div>
    </div>
  </div>
  
  <div class="form">
      <div class="row">
        <div class="col-sm-5">เคยจัดมากี่รายการ</div>
        <div class="col-sm-7">
          <div class="dropdown-container" style="width: 180px; position: relative;">
            <div class="hide">
              <input type="text" value="{{$org_create_time}}" id="org_create_time" name="org_create_time">
            </div>
            <div class="input" align="center"><span class="display">{{$org_create_time}}</span> <span class="icon dropdown">▼</span></div>
            <div class="input-dropdown home shadow-black" style="top: 45px">
                <div class="item-dropdown" onclick="selectDropdown(this);$('#org_create_time').val('1')"><div class="item">1</div></div>
                <div class="item-dropdown" onclick="selectDropdown(this);$('#org_create_time').val('2')"><div class="item">2</div></div>
                <div class="item-dropdown" onclick="selectDropdown(this);$('#org_create_time').val('3')"><div class="item">3</div></div>
                <div class="item-dropdown" onclick="selectDropdown(this);$('#org_create_time').val('4')"><div class="item">4</div></div>
                <div class="item-dropdown" onclick="selectDropdown(this);$('#org_create_time').val('5')"><div class="item">5</div></div>
                <div class="item-dropdown" onclick="selectDropdown(this);$('#org_create_time').val('6')"><div class="item">มากกว่า 5</div></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">ชื่อรายการล่าสุดที่จัด</div>
        <div class="col-sm-7">
          <input type="text" class="form-control" value="{{$org_last_create}}" id="org_last_create" name="org_last_create" style="width: 250px;">
        </div>
      </div>
  </div>
</div>
<div class="upload row" align="center">
    <div class="">
      บัตรประจำตัวประชาชน
    <div class="upload-box" style="background-image: url({{$org_id_card ? $org_id_card: '/images/org/1.jpg'}})">
      <div class="hider">
        <input type="file" id="org_id_card" name="org_id_card" accept="image/*">
      </div>
      <div class="absolute middle">
        <span class="glyphicon glyphicon-plus-sign {{$org_id_card ? 'hide': ''}}"></span>
        <div class="text"></div>
        <span class="glyphicon glyphicon-ok-circle {{$org_id_card ? 'show': ''}}" style="color: #D9E021;display: none"></span>
      </div>
      <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        </div>
      </div>
    </div>
    </div>
    <div class="">
      สำเนาทะเบียนบ้าน
    <div class="upload-box" style="background-image: url({{$org_house_reg? $org_house_reg: '/images/org/2.jpg'}})">
      <div class="hider">
        <input type="file" id="org_house_reg" name="org_house_reg" accept="image/*">
      </div>
      <div class="absolute middle">
        <span class="glyphicon glyphicon-plus-sign {{$org_house_reg ? 'hide': ''}}"></span>
        <div class="text"></div>
        <span class="glyphicon glyphicon-ok-circle {{$org_house_reg ? 'show': ''}}" style="color: #D9E021;display: none"></span>
      </div>
      <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        </div>
      </div>
    </div>
</div>
<div class="">
  บัญชีธนาคาร
    <div class="upload-box" style="background-image: url({{$org_bank_account? $org_bank_account: '/images/org/3.jpg'}})">
      <div class="hider">
        <input type="file" id="org_bank_account" name="org_bank_account" accept="image/*">
      </div>
      <div class="absolute middle">
        <span class="glyphicon glyphicon-plus-sign {{$org_bank_account ? 'hide': ''}}"></span>
        <div class="text"></div>
        <span class="glyphicon glyphicon-ok-circle {{$org_bank_account ? 'show': ''}}" style="color: #D9E021;display: none"></span>
      </div>
      <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        </div>
      </div>
    </div>
</div>
</div>
<div align="center">
  <button type="submit" class="btn btn-success btn-lg">ถัดไป</button>
</div>
</form>
<br><br><br>
<div class="hide errors">
  {{$errors}}
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="/js/org_reg.js?v=2"></script>
  @if(count($errors) != 0)

  <script>
    var errors = $('.errors').html();
    var errorData = JSON.parse(errors);
    var error = '';
    for (var k in errorData){
        error += errorData[k] + '<br>';
    }
    
    var swalContent = {
        title: 'เกิดข้อผิดพลาด',
        html: error,
        type: 'warning'
    }
  </script>
  @endif
@endsection