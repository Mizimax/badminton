@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/event_create.css">
@endsection

@section('content')
@include('org/header')
<form method="post">
    <div class="container shadow">
        <div class="row form-container">
            <div class="col-sm-12 pad-side">
                <br>
                <h1 class="font-bold color-black">ข้อมูลสำคัญ</h1>
                <h3 class="font-bold grey-med">รูปโปสเตอร์ <span class="font-big grey-small">(ขนาดรูปที่แสดง 680 x 828)</span></h3>
                <div class="slide-add" style="height:70px">
                    <div class="hide">
<<<<<<< HEAD
                        <input  type="text" name="poster">
                    </div>
                    <div class="add-circle">
                        <input  type="file" accept="image/*" name="post">
=======
                        <input required type="text" name="poster" value="{{ old('poster') }}">
                    </div>
                    <div class="add-circle" style="background-image: url({{ old('poster') }})">
                        <input required type="file" accept="image/*" name="post">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    </div>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </div>
                <h3 class="font-bold grey-med">รูปหน้าปก <span class="font-big grey-small">(ขนาดรูปที่แสดง 680 x 828)</span></h3>
                <div id="slides" class="flex column center wrap mar-vert">
                    <div class="slide-add">
                        <div class="hide">
<<<<<<< HEAD
                            <input  type="text" name="cover[]">
                        </div>
                        <div class="add-circle">
                            <input  type="file" accept="image/*" name="slide_1">
=======
                            <input required type="text" name="cover[]" value="{{ old('cover[0]') }}">
                        </div>
                        <div class="add-circle" style="background-image: url({{ old('cover[0]') }})">
                            <input required type="file" accept="image/*" name="slide_1">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <p class="grey-small">Slide ที่ 1</p>
                    </div>
                    <div class="slide-add">
                        <div class="hide">
                            <input type="text" name="cover[]" value="{{ old('cover[1]') }}">
                        </div>
                        <div class="add-circle" style="background-image: url({{ old('cover[1]') }})">
                            <input type="file" accept="image/*" name="slide_2">
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <p class="grey-small">Slide ที่ 2</p>
                    </div>
                    <div class="slide-add">
                        <div class="hide">
                            <input type="text" name="cover[]" value="{{ old('cover[2]') }}">
                        </div>
                        <div class="add-circle" style="background-image: url({{ old('cover[2]') }})">
                            <input type="file" accept="image/*" name="slide_3">
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <p class="grey-small">Slide ที่ 3</p>
                    </div>
                </div>
                <div class="form-group max">
<<<<<<< HEAD
                    <input  type="text" class="form-control" id="event_title" name="event_title">
                    <label for="event_title">ชื่อรายการ</label>
                </div>
                <div class="form-group max">
                    <input  type="text" class="form-control" id="by" name="by">
=======
                    <input required type="text" class="form-control" value="{{ old('event_title') }}" id="event_title" name="event_title">
                    <label for="event_title">ชื่อรายการ</label>
                </div>
                <div class="form-group max">
                    <input required type="text" class="form-control" value="{{ old('by') }}" id="by" name="by">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    <label for="by">ผู้จัดแข่ง</label>
                </div>
                <div class="form-group max">
                    <div class="flex column">
<<<<<<< HEAD
                        <input  type="text" class="form-control" id="map-input" name="map-input">
=======
                        <input required type="text" class="form-control" value="{{ old('map-input') }}" id="map-input" name="map-input">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        <div class="icon map mar-side" data-toggle="collapse" data-target="#map" onclick="setTimeout(()=>initMap(),500)">
                          <span class="glyphicon glyphicon-map-marker" style="color:#ED1C24; font-size: 24px"></span>
                        </div>
                    </div>
                    <label for="map-input">สถาณที่จัดแข่ง</label>
                </div>
                <div id="map" style="height:0"></div>
                <div class="form-group max">
                    <div class="flex column wrap dropdown-group">
                        <div class="dropdown">
                        <div class="hide">
<<<<<<< HEAD
                            <input  type="text" id="event_date" name="event_date">
=======
                            <input required type="text" value="{{ old('event_date') }}" id="event_date" name="event_date">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        </div>
                            <div class="input"><span class="display">{{ old('event_date')? old('event_date') : 'วันที่' }}</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black has-scroll">
                                @for($i = 1; $i <= 30; $i++)
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">{{ $i }}</div></div>
                                @endfor
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown">
                        <div class="hide">
<<<<<<< HEAD
                            <input  type="text" id="event_month" name="event_month">
=======
                            <input required type="text" value="{{ old('event_month') }}" id="event_month" name="event_month">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        </div>
                            <div class="input"><span class="display">{{ old('event_month')? old('event_month') : 'เดือน' }}</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black has-scroll">
                                <div class="item-dropdown" value="1" onclick="selectDropdown(this)"><div class="item">มกราคม</div></div>
                                <div class="item-dropdown" value="2" onclick="selectDropdown(this)"><div class="item">กุมภาพันธ์</div></div>
                                <div class="item-dropdown" value="3" onclick="selectDropdown(this)"><div class="item">มีนาคม</div></div>
                                <div class="item-dropdown" value="4" onclick="selectDropdown(this)"><div class="item">เมษายน</div></div>
                                <div class="item-dropdown" value="5" onclick="selectDropdown(this)"><div class="item">พฤษภาคม</div></div>
                                <div class="item-dropdown" value="6" onclick="selectDropdown(this)"><div class="item">มิถุนายน</div></div>
                                <div class="item-dropdown" value="7" onclick="selectDropdown(this)"><div class="item">กรกฎาคม</div></div>
                                <div class="item-dropdown" value="8" onclick="selectDropdown(this)"><div class="item">สิงหาคม</div></div>
                                <div class="item-dropdown" value="9" onclick="selectDropdown(this)"><div class="item">กันยายน</div></div>
                                <div class="item-dropdown" value="10" onclick="selectDropdown(this)"><div class="item">ตุลาคม</div></div>
                                <div class="item-dropdown" value="11" onclick="selectDropdown(this)"><div class="item">พฤศจิกายน</div></div>
                                <div class="item-dropdown" value="12" onclick="selectDropdown(this)"><div class="item">ธันวาคม</div></div>
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown">
                        <div class="hide">
<<<<<<< HEAD
                            <input  type="text" id="event_year" name="event_year">
                        </div>
                            <div class="input"><span class="display">เดือน</span> <span class="icon dropdown">▼</span></div>
=======
                            <input required type="text" value="{{ old('event_year') }}" id="event_year" name="event_year">
                        </div>
                            <div class="input"><span class="display">{{ old('event_year')? old('event_year') : 'เดือน' }}</span> <span class="icon dropdown">▼</span></div>
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                            <div class="input-dropdown home shadow-black">
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2561</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2562</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2563</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2564</div></div>
                            </div>
                        </div>
                    </div>
                    <label for="event_year">วันที่จัดแข่ง</label>
                </div>
                <div class="form-group max">
                    
<<<<<<< HEAD
                    <input  type="text" class="form-control mar-side" id="expenses_detail" name="expenses_detail" style="width:80px;">
=======
                    <input required type="text" class="form-control mar-side" value="{{ old('expenses_detail') }}" id="expenses_detail" name="expenses_detail" style="width:80px;">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    <label for="expenses_detail" style="float:left; margin-top:7px">ค่าสมัครต่อคู่</label>
                    <label for="expenses_detail" style="display:inline-block">บาท</label>
                </div>
                <div id="hand" class="form-group max">
                <div class="flex column wrap dropdown-group">
                        <div class="dropdown">
                        <div class="hide">
<<<<<<< HEAD
                            <input  type="text" name="hand[]">
=======
                            <input required type="text" value="{{ old('hand[0]') }}" name="hand[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        </div>
                            <div class="input"><span class="display">{{ old('hand[0]')? old('hand[0]') : 'อันดับมือ' }}</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black has-scroll">
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">A</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">B+</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">B</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">C+</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">C</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P+</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P-</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">N</div></div>
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown">
                        <div class="hide">
<<<<<<< HEAD
                            <input  type="text" name="team_num[]">
=======
                            <input required type="text" name="team_num[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        </div>
                            <div class="input"><span class="display">จำนวนคู่</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black has-scroll">
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">4</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">8</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">16</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">24</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">32</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">48</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">64</div></div>
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown reward">
                            <div class="input" onclick="toggleDropdown(this)"><span class="display">เงินรางวัล</span> <span class="icon dropdown">▼</span></div>
                            <div class="dropdown-box shadow-black">
                                <div class="reward-container">
<<<<<<< HEAD
                                    <input  type="text" class="item-dropdown" name="reward_1[]" style="width: 100%; border:0" placeholder="ที่ 1">
                                    <span class="bath">บาท</span>
                                </div>
                                <div class="reward-container">
                                    <input  type="text" class="item-dropdown" name="reward_2[]" style="width: 100%; border:0" placeholder="ที่ 2">
                                    <span class="bath">บาท</span>
                                </div>
                                <div class="reward-container">
                                    <input  type="text" class="item-dropdown" name="reward_3[]" style="width: 100%; border:0" placeholder="ที่ 3">
=======
                                    <input required type="text" class="item-dropdown" name="reward_1[]" style="width: 100%; border:0" placeholder="ที่ 1">
                                    <span class="bath">บาท</span>
                                </div>
                                <div class="reward-container">
                                    <input required type="text" class="item-dropdown" name="reward_2[]" style="width: 100%; border:0" placeholder="ที่ 2">
                                    <span class="bath">บาท</span>
                                </div>
                                <div class="reward-container">
                                    <input required type="text" class="item-dropdown" name="reward_3[]" style="width: 100%; border:0" placeholder="ที่ 3">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                                    <span class="bath">บาท</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="reward_1">ประเภทการแข่งขัน</label>
                </div>
                <button type="button" class="btn btn-success btn-sm" onclick="addHand()">เพิ่มประเภท +</button>
                <h3 class="font-bold grey-med">การโอนเงิน</h3>
                <div id="account">
                    <div class="account">
                        <div class="form-group eiei">
                            
<<<<<<< HEAD
                            <input  type="text" class="form-control" name="name[]">
=======
                            <input required type="text" class="form-control" name="name[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                            <label for="name">ชื่อบัญชี</label>
                            
                        </div>
                        <br>
                        <div class="form-group eiei">
<<<<<<< HEAD
                            <input  type="text" class="form-control" name="account[]">
=======
                            <input required type="text" class="form-control" name="account[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                            <label for="account">เลขบัญชี</label>
                        </div>
                        <br>
                        <div class="form-group eiei">
<<<<<<< HEAD
                            <input  type="text" class="form-control" name="promptpay[]">
=======
                            <input required type="text" class="form-control" name="promptpay[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                            <label for="promptpay">Promptpay</label>
                        </div>
                        <br>
                        <div class="form-group eiei">
<<<<<<< HEAD
                            <input  type="text" class="form-control" name="bank[]">
=======
                            <input required type="text" class="form-control" name="bank[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                            <label for="bank">ธนาคาร</label>
                        </div>
                        <br>
                    </div>
                </div>
                <button type="button" class="btn btn-info btn-sm" onclick="addAccount()" style="margin-top:10px">เพิ่มบัญชี +</button>
                <br><br>
                <p class="font-bold font-big" style="margin-bottom:5px">ลูกแบตที่ใช้ในการแข่ง</p>
                <div class="form-group eiei za">
                    <input type="text" class="form-control" id="sonbad_band" name="sonbad_band">
                    <label class="font-big" for="sonbad_band">ยี่ห้อลูกแบด</label>
                </div>
                <div class="form-group max">
                    <textarea class="form-control" rows="5" id="sonbad" name="sonbad"></textarea>
                    <label class="font-big" for="sonbad">ข้อมูลลูกแบด</label>
                </div>
                <div class="form-group eiei za">
                    <input type="text" class="form-control" id="sonbad_price" name="sonbad_price">
                    <label class="font-big" for="sonbad_price">ราคาลูกแบด</label>
                </div>              
                <p class="font-bold font-big" style="margin-bottom:10px;margin-top:15px">ผู้ประเมินมือ</p>
                <div class="form-group max">
<<<<<<< HEAD
                    <input  type="text" class="form-control" id="organizer" name="organizer">
                    <label class="font-big" for="organizer">ชื่อ-นามสกุล</label>
                </div>
                <div class="form-group max">
                    <input  type="text" class="form-control" id="contact" name="contact">
=======
                    <input required type="text" class="form-control" id="organizer" name="organizer">
                    <label class="font-big" for="organizer">ชื่อ-นามสกุล</label>
                </div>
                <div class="form-group max">
                    <input required type="text" class="form-control" id="contact" name="contact">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    <label class="font-big" for="contact">ช่องทางการติดต่อ (เบอร์โทรศัพท์ หรือ Social Network)</label>
                </div>
                <div class="form-group max">
                    <div class="slide-add" style="margin-top:7px;height:70px">
                        <div class="hide">
<<<<<<< HEAD
                            <input  type="text" name="hand_img">
                        </div>
                        <div class="add-circle">
                            <input  type="file" accept="image/*" name="hand_pic">
=======
                            <input required type="text" name="hand_img">
                        </div>
                        <div class="add-circle">
                            <input required type="file" accept="image/*" name="hand_pic">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                    </div>
                    <label class="font-big" for="pic-hand">รูปผู้ประเมินมือ</label>
                </div>
                <h1 class="font-bold color-black">รายละเอียด</h1>
                <div class="form-group max">
<<<<<<< HEAD
                    <textarea  class="form-control" rows="5" id="objective" name="objective"></textarea>
                    <label class="font-big" for="objective">วัตถุประสงค์</label>
                </div>
                <div class="form-group max">
                    <textarea  class="form-control" rows="5" id="reg_duration" name="reg_duration"></textarea>
=======
                    <textarea required class="form-control" rows="5" id="objective" name="objective"></textarea>
                    <label class="font-big" for="objective">วัตถุประสงค์</label>
                </div>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="reg_duration" name="reg_duration"></textarea>
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    <label class="font-big" for="reg_duration">ระยะเวลาในการสมัคร</label>
                </div>
                <div class="form-group max">
                    <textarea class="form-control" rows="5" id="event_special" name="event_special"></textarea>
                    <label class="font-big" for="event_special">กิจกรรมพิเศษ</label>
                </div>
                <div class="form-group max">
<<<<<<< HEAD
                    <textarea  class="form-control" rows="5" id="rule" name="rule"></textarea>
                    <label class="font-big" for="rule">กติกาการแข่งขัน</label>
                </div>
                <div class="form-group max">
                    <textarea  class="form-control" rows="5" id="consideration" name="consideration"></textarea>
                    <label class="font-big" for="consideration">การพิจารณามือนักกีฬา</label>
                </div>
                <div class="form-group max">
                    <textarea  class="form-control" rows="5" id="postscript" name="postscript"></textarea>
=======
                    <textarea required class="form-control" rows="5" id="rule" name="rule"></textarea>
                    <label class="font-big" for="rule">กติกาการแข่งขัน</label>
                </div>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="consideration" name="consideration"></textarea>
                    <label class="font-big" for="consideration">การพิจารณามือนักกีฬา</label>
                </div>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="postscript" name="postscript"></textarea>
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    <label class="font-big" for="postscript">กล่าวจบ</label>
                </div>
                <div align="center">
                    <button type="button" class="btn btn-success btn-lg" onclick="saveEvent(this)">สร้างรายการ</button>
                </div>
                <br>
                <div style="color:red">
                หมายเหตุ : <br>
                > ท่านสามารถแก้ไขข้อมูลรายการแข่งของท่านได้ถึงก่อนวันจัดแข่ง 1 วัน* <br>
                > หลังจากกด "สร้างรายการ" ผู้เข้าแข่งขันจะเห็นรายการของท่านและสมัครผ่านทางเว็บไซต์นี้ได้ทันที
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</form>
@if(count($errors) != 0)
<div class="hide errors">
    {{$errors}}
</div>
@endif
@endsection
@section('scripts')
@if(count($errors) != 0)
    
    <script>
        var errors = $('.errors').html();
        var errorData = JSON.parse(errors);
        var error = '';
        for (var k in errorData){
            error += errorData[k] + '<br>';
            break;
        }

        var swalContent = {
            title: 'เกิดข้อผิดพลาด',
            html: error,
            type: 'warning'
        }
    </script>
@endif
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqij_a4O1A9CmXrqg2EkA9fWwmg9g_HaI&libraries=places&callback=initMap"
        async defer></script>
<script src="/js/map.js"></script>
<script src="/js/create_upload.js"></script>
<script>
    var handCount = 2;
    var accountCount = 2;
    var addHand = (function() {
        var text = `
                <div class="flex column wrap dropdown-group">
                    <div class="dropdown">
                    <div class="hide">
<<<<<<< HEAD
                        <input  type="text" name="hand[]">
=======
                        <input required type="text" name="hand[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    </div>
                        <div class="input"><span class="display">อันดับมือ</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black has-scroll">
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">A</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">B+</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">B</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">C+</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">C</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P+</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P-</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">N</div></div>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown">
                    <div class="hide">
<<<<<<< HEAD
                        <input  type="text" name="team_num[]">
=======
                        <input required type="text" name="team_num[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                    </div>
                        <div class="input"><span class="display">จำนวนคู่</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black">
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">4</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">8</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">16</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">24</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">32</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">48</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">64</div></div>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown reward">
                        <div class="input" onclick="toggleDropdown(this)"><span class="display">เงินรางวัล</span> <span class="icon dropdown">▼</span></div>
                        <div class="dropdown-box shadow-black">
                            <div class="reward-container">
<<<<<<< HEAD
                                <input  type="text" class="item-dropdown" name="reward_1[]" style="width: 100%; border:0" placeholder="ที่ 1">
                                <span class="bath">บาท</span>
                            </div>
                            <div class="reward-container">
                                <input  type="text" class="item-dropdown" name="reward_2[]" style="width: 100%; border:0" placeholder="ที่ 2">
                                <span class="bath">บาท</span>
                            </div>
                            <div class="reward-container">
                                <input  type="text" class="item-dropdown" name="reward_3[]" style="width: 100%; border:0" placeholder="ที่ 3">
=======
                                <input required type="text" class="item-dropdown" name="reward_1[]" style="width: 100%; border:0" placeholder="ที่ 1">
                                <span class="bath">บาท</span>
                            </div>
                            <div class="reward-container">
                                <input required type="text" class="item-dropdown" name="reward_2[]" style="width: 100%; border:0" placeholder="ที่ 2">
                                <span class="bath">บาท</span>
                            </div>
                            <div class="reward-container">
                                <input required type="text" class="item-dropdown" name="reward_3[]" style="width: 100%; border:0" placeholder="ที่ 3">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                                <span class="bath">บาท</span>
                            </div>
                        </div>
                    </div>
                    <span class="glyphicon glyphicon-remove" onclick="removeHand(this)" style="margin:9px; color:red; cursor:pointer"></span>
                </div>
        `
        handCount++;
        $("#hand").append(text);
    });

    var removeHand = (function(ele) {
        $(ele).parents('.dropdown-group').remove();
    });

    var addAccount = (function() {
        var text = `
                <div class="account" style="position:relative; margin-top:15px">
                    
                    <div class="absolute" style="right:-40px;top:50%; transform:translateY(-50%)">
                    <span class="glyphicon glyphicon-remove font-big" onclick="removeAccount(this)" style="margin:9px; color:red; cursor:pointer"></span>
                    </div>
                    <div class="form-group eiei">
                        
<<<<<<< HEAD
                        <input  type="text" class="form-control" name="name[]">
=======
                        <input required type="text" class="form-control" name="name[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        <label for="name">ชื่อบัญชี</label>
                        
                    </div>
                    <br>
                    <div class="form-group eiei">
<<<<<<< HEAD
                        <input  type="text" class="form-control" name="account[]">
=======
                        <input required type="text" class="form-control" name="account[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        <label for="name">เลขบัญชี</label>
                    </div>
                    <br>
                    <div class="form-group eiei">
<<<<<<< HEAD
                        <input  type="text" class="form-control" name="promptpay[]">
=======
                        <input required type="text" class="form-control" name="promptpay[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        <label for="name">Promptpay</label>
                    </div>
                    <br>
                    <div class="form-group eiei">
<<<<<<< HEAD
                        <input  type="text" class="form-control" name="bank[]">
=======
                        <input required type="text" class="form-control" name="bank[]">
>>>>>>> e3241b2817c894d820a7fc3e99013319b8a01d9b
                        <label for="name">ธนาคาร</label>
                    </div>
                    <br>
                </div>
                
        `
        accountCount++;
        $('#account').append(text);
    });

    var removeAccount = (function(ele) {
        $(ele).parents('.account').remove();
    });

    var toggleDropdown = (function (ele) {
        $(ele).next().toggleClass('show');
    });

    var saveEvent = (function(button) {
        $(button).text('Loading...');
        $.ajax({
            type: 'POST',
            url: '/event/create',
            data: $("form").serialize(), 

            success: function(res) { 
                var swalContent = {
                    title: 'สร้างรายการสำเร็จ',
                    html: res.errors,
                    type: 'success'
                }
                swal(swalContent, function(){
                    window.location.href = '/';
                });
            },
            error: function(res) {
                var errors = res.responseJSON.errors;
                var swalContent = {
                    title: 'เกิดข้อผิดพลาด',
                    html: errors[Object.keys(errors)[0]][0],
                    type: 'warning'
                }
                swal(swalContent);
            },
            complete: function() {
                $(button).text('สร้างรายการ');
            }
        });

    });
</script>
@endsection