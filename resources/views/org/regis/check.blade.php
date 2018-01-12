@extends('layouts.app')

@section('css')
<style>
  .col-sm-3 {
    margin-top:10px;
  }
</style>
@endsection

@section('content')
<br><br>
<div id="content" class="container pad">
  <div class="card">
    <div class="card-block">
        <div class="row">
          <div class="col-sm-3" align="right">ชื่อ</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="org_firstname" name="org_firstname" value="{{ $Firstname }}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3" align="right">นามสกุล</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="org_lastname" name="org_lastname" value="{{ $Lastname }}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3" align="right">ชื่อเล่น</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="org_nickname" name="org_nickname" value="{{ $Nickname }}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3" align="right">เบอร์โทร</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="org_phone" name="org_phone" value="{{ $Phone }}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3" align="right">Email</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="org_email" name="org_email" value="{{ $Email }}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3" align="right">เคยจัดมากี่รายการ</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="org_create_time" name="org_create_time" value="{{ $org_create_time }}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3" align="right">ชื่อรายการล่าสุดที่จัด</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="org_last_create" name="org_last_create" value="{{ $org_last_create }}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12" align="center">
            <img src="{{$org_id_card}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12" align="center">
            <img src="{{$org_house_reg}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12" align="center">
            <img src="{{$org_bank_account}}">
          </div>
        </div>
      <form action="" method="post">
        <div class="row">
          <div class="col-sm-12 font-big font-bold" align="center">
            <label class="checkbox-inline"><input type="radio" name="org_active" value="1" style="margin-right: 7px">ผ่าน</label>
            <label class="checkbox-inline"><input type="radio" name="org_active" value="0" style="margin-right: 7px">ไม่ผ่าน</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12" align="center">
            <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<br><br><br>
<div class="hide errors">
  {{$errors}}
</div>
@endsection
@section('scripts')
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