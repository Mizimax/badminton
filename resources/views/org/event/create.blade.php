@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/event_create.css">
@endsection

@section('content')
@include('org/header')
<div class="container shadow">
    <div class="row form-container">
        <div class="col-sm-12 pad-side">
            <br>
            <h1 class="font-bold color-black">ข้อมูลสำคัญ</h1>
            <h3 class="font-bold grey-med">รูปหน้าปก <span class="font-big grey-small">(ขนาดรูปที่แสดง 680 x 828)</span></h3>
            <div id="slides" class="flex column center wrap mar-vert">
                <div class="slide-add">
                    +
                    <p class="grey-small">Slide ที่ 1</p>
                </div>
                <div class="slide-add">
                    +
                    <p class="grey-small">Slide ที่ 2</p>
                </div>
                <div class="slide-add">
                    +
                    <p class="grey-small">Slide ที่ 3</p>
                </div>
            </div>
            <div class="form-group max">
                <input type="text" class="form-control" id="name">
                <label for="name">ชื่อรายการ</label>
            </div>
            <div class="form-group max">
                <div class="flex column">
                    <input type="text" class="form-control" id="map-input">
                    <div class="icon map mar-side" data-toggle="collapse" data-target="#map" onclick="setTimeout(()=>initMap(),500)">Map</div>
                </div>
                <label for="name">สถาณที่จัดแข่ง</label>
            </div>
            <div id="map" style="height:0"></div>
            <div class="form-group max">
                <div class="flex column wrap dropdown-group">
                    <div class="dropdown">
                        <div class="input"><span class="display">วันที่</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black">
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">1</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">3</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">4</div></div>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown">
                        <div class="input"><span class="display">เดือน</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black">
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">มกราคม</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">กุมพา</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">มีนา</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">เมษา</div></div>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown">
                        <div class="input"><span class="display">ปี</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black">
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2561</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2562</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2563</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2564</div></div>
                        </div>
                    </div>
                </div>
                <label for="name">วันที่จัดแข่ง</label>
            </div>
            <div class="form-group max">
                
                <input type="text" class="form-control mar-side" id="name" style="width:80px;">
                <label for="name" style="float:left; margin-top:3px">ค่าสมัครต่อคู่</label>
                <label for="name" style="display:inline-block">บาท</label>
            </div>
            <div class="form-group max">
                <input type="text" class="form-control" id="name">
                <label for="name">ประเภทการแข่งขัน</label>
            </div>
            <h3 class="font-bold grey-med">การโอนเงิน</h3>
            <div class="account">
                <div class="form-group eiei">
                    
                    <input type="text" class="form-control" id="name">
                    <label for="name">ชื่อบัญชี</label>
                    
                </div>
                <br>
                <div class="form-group eiei">
                    <input type="text" class="form-control" id="name">
                    <label for="name">เลขบัญชี</label>
                </div>
                <br>
                <div class="form-group eiei">
                    <input type="text" class="form-control" id="name">
                    <label for="name">Promptpay</label>
                </div>
                <br>
                <div class="form-group eiei">
                    <input type="text" class="form-control" id="name">
                    <label for="name">ธนาคาร</label>
                </div>
                <br>
            </div>
            <br>
            <p class="font-bold font-big" style="margin-bottom:5px">ลูกแบตที่ใช้ในการแข่ง</p>
            <div class="form-group eiei za">
                <input type="text" class="form-control" id="name">
                <label class="font-big" for="name">ยี่ห้อลูกแบด</label>
            </div>
            <div class="form-group eiei za">
                <input type="text" class="form-control" id="name">
                <label class="font-big" for="name">ราคาลูกแบด</label>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br><br>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqij_a4O1A9CmXrqg2EkA9fWwmg9g_HaI&libraries=places&callback=initMap"
        async defer></script>
<script src="/js/map.js"></script></script>
@endsection