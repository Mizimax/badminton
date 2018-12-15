@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/event_create.css">
@endsection

@section('content')
@include('org/header')
<form method="post">
    <div class="container shadow">
        <div class="row form-container">
            <div class="col-sm-12 pad-side" style="z-index:99">
                <br>
                <h1 class="font-bold color-black">ข้อมูลสำคัญ</h1>
                <h3 class="font-bold grey-med">รูปโปสเตอร์ <span class="font-big grey-small">(ขนาดรูปที่แสดง 680 x 828)</span></h3>
                <div class="slide-add" style="height:70px">
                    <div class="hide">
                        <input required type="text" name="poster">
                    </div>
                    <div class="add-circle">
                        <input required type="file" accept="image/*" name="post">
                    </div>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </div>
                <h3 class="font-bold grey-med">รูปหน้าปก <span class="font-big grey-small">(ขนาดรูปที่แสดง 680 x 828)</span></h3>
                <div id="slides" class="flex column center wrap mar-vert">
                    <div class="slide-add">
                        <div class="hide">
                            <input required type="text" name="cover[]">
                        </div>
                        <div class="add-circle">
                            <input required type="file" accept="image/*" name="slide_1">
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <p class="grey-small">Slide ที่ 1</p>
                    </div>
                    <div class="slide-add">
                        <div class="hide">
                            <input type="text" name="cover[]">
                        </div>
                        <div class="add-circle">
                            <input type="file" accept="image/*" name="slide_2">
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <p class="grey-small">Slide ที่ 2</p>
                    </div>
                    <div class="slide-add">
                        <div class="hide">
                            <input type="text" name="cover[]">
                        </div>
                        <div class="add-circle">
                            <input type="file" accept="image/*" name="slide_3">
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <p class="grey-small">Slide ที่ 3</p>
                    </div>
                </div>
                <div class="form-group max">
                    <input required type="text" class="form-control" id="event_title" name="event_title">
                    <label for="event_title">ชื่อรายการ</label>
                </div>
                <div class="form-group max">
                    <input required type="text" class="form-control" id="by" name="by">
                    <label for="by">ผู้จัดแข่ง</label>
                </div>
                <div class="form-group max">
                    <div class="flex column">
                        <input required type="text" class="form-control" id="map-input" name="map-input">
                        <div class="icon map mar-side" data-toggle="collapse" data-target="#map" onclick="setTimeout(()=>initMap(),500)">
                          <span class="glyphicon glyphicon-map-marker" style="color:#ED1C24; font-size: 24px"></span>
                        </div>
                    </div>
                    <label for="map-input">สถานที่จัดแข่ง</label>
                </div>
                <div id="map" style="height:0"></div>
                <div class="form-group max">
                    <div class="flex column wrap dropdown-group">
                        <div class="dropdown">
                        <div class="hide">
                            <input type="text" id="event_start" name="event_start">
                        </div>
                            <div class="input"><span class="display">วันที่เริ่ม</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black has-scroll">
                                @for($i = 1; $i <= 31; $i++)
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">{{ $i }}</div></div>
                                @endfor
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown">
                        <div class="hide">
                            <input type="text" id="event_month_start" name="event_month_start">
                        </div>
                            <div class="input"><span class="display">เดือน</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black">
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
                            <input type="text" id="event_year_start" name="event_year_start">
                        </div>
                            <div class="input"><span class="display">ปี</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black">
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2561</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2562</div></div>

                            </div>
                        </div>

                    </div>
                    <label for="event_year">วันที่จัดแข่ง</label>
                </div>
                <div class="form-group max">
                    <div class="flex column wrap dropdown-group">
                        <div class="dropdown">
                        <div class="hide">
                            <input type="text" id="event_end" name="event_end">
                        </div>
                            <div class="input"><span class="display">วันจบการแข่ง</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black has-scroll">
                                @for($i = 1; $i <= 31; $i++)
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">{{ $i }}</div></div>
                                @endfor
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown">
                        <div class="hide">
                            <input type="text" id="event_month_end" name="event_month_end">
                        </div>
                            <div class="input"><span class="display">เดือน</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black">
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
                            <input type="text" id="event_year" name="event_year_end">
                        </div>
                            <div class="input"><span class="display">ปี</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black">
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2561</div></div>
                                <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2562</div></div>

                            </div>
                        </div>

                    </div>
                    <label for="event_year">วันจบการแข่งขัน</label>
                </div>
                <div class="form-group max">

                    <input required type="text" class="form-control mar-side" id="expenses_detail" name="expenses_detail" style="width:80px;">
                    <label for="expenses_detail" style="float:left; margin-top:7px">ค่าสมัครต่อคู่</label>
                    <label for="expenses_detail" style="display:inline-block">บาท</label>
                </div>
                <div id="hand" class="form-group max">
                <div class="flex column wrap dropdown-group hand">
                        <div class="dropdown">
                        <div class="hide">
                            <input type="text" name="type[]">
                        </div>
                            <div class="input"><span class="display">ปกติ</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black">
                                <div class="item-dropdown" value="0" onclick="selectDropdown(this);filterType('normal', this)"><div class="item">ปกติ</div></div>
                                <div class="item-dropdown" value="1" onclick="selectDropdown(this);filterType('special', this)"><div class="item">พิเศษ</div></div>

                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown">
                        <div class="hide">
                            <input type="text" name="hand[]">
                        </div>
                            <div class="input"><span class="display">อันดับมือ</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black has-scroll hand">
                                @for($i = 0; $i < 14; $i++)
                                <div class="item-dropdown" value="{{ $races[$i]->race_id }}" onclick="selectDropdown(this)"><div class="item">{{ $races[$i]->race_name }}</div></div>
                                @endfor
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="dropdown">
                        <div class="hide">
                            <input type="text" name="team_num[]">
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
                                    <input type="text" class="item-dropdown" name="reward_1[]" style="width: 100%; border:0" placeholder="ที่ 1">
                                    <span class="bath">บาท</span>
                                </div>
                                <div class="reward-container">
                                    <input type="text" class="item-dropdown" name="reward_2[]" style="width: 100%; border:0" placeholder="ที่ 2">
                                    <span class="bath">บาท</span>
                                </div>
                                <div class="reward-container">
                                    <input type="text" class="item-dropdown" name="reward_3[]" style="width: 100%; border:0" placeholder="ที่ 3">
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

                            <input required type="text" class="form-control" name="name[]">
                            <label for="name">ชื่อบัญชี</label>

                        </div>
                        <br>
                        <div class="form-group eiei">
                            <input required type="text" class="form-control" name="account[]">
                            <label for="account">เลขบัญชี</label>
                        </div>
                        <br>
                        <div class="form-group eiei">
                            <input required type="text" class="form-control" name="promptpay[]">
                            <label for="promptpay">Promptpay</label>
                        </div>
                        <br>
                        <div class="form-group eiei">
                            <input required type="text" class="form-control" name="bank[]">
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
                <div class="form-group eiei za">
                    <input type="text" class="form-control" id="sonbad_price" name="sonbad_price">
                    <label class="font-big" for="sonbad_price">ราคาลูกแบด</label>
                </div>
                <p class="font-bold font-big" style="margin-bottom:10px;margin-top:15px">ผู้ประเมินมือ</p>
                <div class="form-group max">
                    <input required type="text" class="form-control" id="organizer" name="organizer">
                    <label class="font-big" for="organizer">ชื่อ-นามสกุล</label>
                </div>
                <div class="form-group max">
                    <input required type="text" class="form-control" id="contact" name="contact">
                    <label class="font-big" for="contact">ช่องทางการติดต่อ (เบอร์โทรศัพท์ หรือ Social Network)</label>
                </div>
                <div class="form-group max">
                    <div class="slide-add" style="margin-top:7px;height:70px">
                        <div class="hide">
                            <input required type="text" name="hand_img">
                        </div>
                        <div class="add-circle">
                            <input required type="file" accept="image/*" name="hand_pic">
                        </div>
                        <span class="glyphicon glyphicon-plus-sign"></span>
                    </div>
                    <label class="font-big" for="pic-hand">รูปผู้ประเมินมือ</label>
                </div>
                <h1 class="font-bold color-black">รายละเอียด</h1>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="objective" name="objective"></textarea>
                    <label class="font-big" for="objective">วัตถุประสงค์</label>
                </div>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="reg_duration" name="reg_duration"></textarea>
                    <label class="font-big" for="reg_duration">ระยะเวลาในการสมัคร</label>
                </div>
                <div class="form-group max">
                    <textarea class="form-control" rows="5" id="event_special" name="event_special"></textarea>
                    <label class="font-big" for="event_special">กิจกรรมพิเศษ</label>
                </div>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="rule" name="rule"></textarea>
                    <label class="font-big" for="rule">กติกาการแข่งขัน</label>
                </div>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="consideration" name="consideration"></textarea>
                    <label class="font-big" for="consideration">การพิจารณามือนักกีฬา</label>
                </div>
                <div class="form-group max">
                    <textarea required class="form-control" rows="5" id="postscript" name="postscript"></textarea>
                    <label class="font-big" for="postscript">กล่าวจบ</label>
                </div>
                <div align="center">
                    <button id="submit" type="submit" class="btn btn-success btn-lg">สร้างรายการ</button>
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
<div class="hide hand">{{ $races }}</div>
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
    var hand = $('.hand.hide').html();
    hand = JSON.parse(hand);

    $(document).ready(function() {
        $("form").submit(function(e) {

            e.preventDefault();
            saveEvent();


        });
    });

    var addHand = (function() {
        var text = `
                <div class="flex column wrap dropdown-group">
                    <div class="dropdown">
                        <div class="hide">
                            <input type="text" name="hand[]">
                        </div>
                            <div class="input"><span class="display">ปกติ</span> <span class="icon dropdown">▼</span></div>
                            <div class="input-dropdown home shadow-black">
                                <div class="item-dropdown" value="0" onclick="selectDropdown(this);filterType('normal', this)"><div class="item">ปกติ</div></div>
                                <div class="item-dropdown" value="1" onclick="selectDropdown(this);filterType('special', this)"><div class="item">พิเศษ</div></div>

                            </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown">
                    <div class="hide">
                        <input type="text" name="hand[]">
                    </div>
                        <div class="input"><span class="display">อันดับมือ</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black has-scroll">
                            @foreach($races as $race)
                            <div class="item-dropdown" value="{{ $race->race_id }}" onclick="selectDropdown(this)"><div class="item">{{ $race->race_name }}</div></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown">
                    <div class="hide">
                        <input type="text" name="team_num[]">
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
                                <input type="text" class="item-dropdown" name="reward_1[]" style="width: 100%; border:0" placeholder="ที่ 1">
                                <span class="bath">บาท</span>
                            </div>
                            <div class="reward-container">
                                <input type="text" class="item-dropdown" name="reward_2[]" style="width: 100%; border:0" placeholder="ที่ 2">
                                <span class="bath">บาท</span>
                            </div>
                            <div class="reward-container">
                                <input type="text" class="item-dropdown" name="reward_3[]" style="width: 100%; border:0" placeholder="ที่ 3">
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

                        <input required type="text" class="form-control" name="name[]">
                        <label for="name">ชื่อบัญชี</label>

                    </div>
                    <br>
                    <div class="form-group eiei">
                        <input required type="text" class="form-control" name="account[]">
                        <label for="name">เลขบัญชี</label>
                    </div>
                    <br>
                    <div class="form-group eiei">
                        <input required type="text" class="form-control" name="promptpay[]">
                        <label for="name">Promptpay</label>
                    </div>
                    <br>
                    <div class="form-group eiei">
                        <input required type="text" class="form-control" name="bank[]">
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
        if($(ele).hasClass('disable'))
            return false;
        $(ele).next().toggleClass('show');
    });

    var filterType = (function(type, ele) {
        var dropdownText = '';
        var normal = hand.slice(0, 14);
        var special = hand.slice(14, hand.length);
        if(type === 'normal'){
            normal.forEach(function (data) {
                dropdownText += `
                    <div class="item-dropdown" value="${data['race_id']}" onclick="selectDropdown(this)"><div class="item">${data['race_name']}</div></div>
                `;
            })
        }
        else{
            special.forEach(function (data) {
                dropdownText += `
                    <div class="item-dropdown" value="${data['race_id']}" onclick="selectDropdown(this)"><div class="item">${data['race_name']}</div></div>
                `;
            })
        }
        $(ele).parents('.dropdown-group').children().eq(2).children().eq(2).html(dropdownText);
    });

    var saveEvent = (function() {
        var button = $('#submit');
        button.text('Loading...');

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
                swal(swalContent).then(function() {
                    window.location = '/event/' + res.redirect;
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
                button.text('สร้างรายการ');
            }
        });

    });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127412532-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-127412532-1');
</script>

@endsection
