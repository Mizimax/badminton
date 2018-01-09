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
                <label for="name" style="float:left; margin-top:7px">ค่าสมัครต่อคู่</label>
                <label for="name" style="display:inline-block">บาท</label>
            </div>
            <div id="hand" class="form-group max">
            <div class="flex column wrap dropdown-group">
                    <div class="dropdown">
                        <div class="input"><span class="display">อันดับมือ</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black">
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S+</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S-</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P</div></div>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown">
                        <div class="input"><span class="display">จำนวนคู่</span> <span class="icon dropdown">▼</span></div>
                        <div class="input-dropdown home shadow-black">
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">1</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">3</div></div>
                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">4</div></div>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="dropdown reward">
                        <div class="input" onclick="toggleDropdown(this)"><span class="display">เงินรางวัล</span> <span class="icon dropdown">▼</span></div>
                        <div class="dropdown-box shadow-black">
                            <input type="text" class="item-dropdown" style="width: 100%; border:0" placeholder="ที่ 1">
                            <input type="text" class="item-dropdown" style="width: 100%; border:0" placeholder="ที่ 2">
                            <input type="text" class="item-dropdown" style="width: 100%; border:0" placeholder="ที่ 3">
                        </div>
                    </div>
                </div>
                <label for="name">ประเภทการแข่งขัน</label>
            </div>
            <button class="btn btn-success btn-sm" onclick="addHand()">เพิ่มประเภท +</button>
            <h3 class="font-bold grey-med">การโอนเงิน</h3>
            <div id="account">
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
            </div>
            <button class="btn btn-info btn-sm" onclick="addAccount()" style="margin-top:10px">เพิ่มบัญชี +</button>
            <br><br>
            <p class="font-bold font-big" style="margin-bottom:5px">ลูกแบตที่ใช้ในการแข่ง</p>
            <div class="form-group eiei za">
                <input type="text" class="form-control" id="name">
                <label class="font-big" for="name">ยี่ห้อลูกแบด</label>
            </div>
            <div class="form-group max">
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <label class="font-big" for="name">ข้อมูลลูกแบด</label>
            </div>
            <div class="form-group eiei za">
                <input type="text" class="form-control" id="name">
                <label class="font-big" for="name">ราคาลูกแบด</label>
            </div>
            <p class="font-bold font-big" style="margin-bottom:10px;margin-top:15px">ผู้ประเมินมือ</p>
            <div class="form-group max">
                <input type="text" class="form-control" id="name">
                <label class="font-big" for="name">ชื่อ</label>
            </div>
            <div class="form-group max">
                <input type="text" class="form-control" id="name">
                <label class="font-big" for="name">นามสกุล</label>
            </div>
            <div class="form-group max">
                <button>+</button>
                <label class="font-big" for="name">รูปผู้ประเมินมือ</label>
            </div>
            <h1 class="font-bold color-black">รายละเอียด</h1>
            <div class="form-group max">
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <label class="font-big" for="name">วัตถุประสงค์</label>
            </div>
            <div class="form-group max">
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <label class="font-big" for="name">ระยะเวลาในการสมัคร</label>
            </div>
            <div class="form-group max">
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <label class="font-big" for="name">กิจกรรมพิเศษ</label>
            </div>
            <div class="form-group max">
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <label class="font-big" for="name">กติกาการแข่งขัน</label>
            </div>
            <div class="form-group max">
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <label class="font-big" for="name">การพิจารณามือนักกีฬา</label>
            </div>
            <div class="form-group max">
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <label class="font-big" for="name">กล่าวจบ</label>
            </div>
            <div align="center">
                <button type="submit" class="btn btn-success btn-lg">สร้างรายการ</button>
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
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqij_a4O1A9CmXrqg2EkA9fWwmg9g_HaI&libraries=places&callback=initMap"
        async defer></script>
<script src="/js/map.js"></script>
<script>

    var addHand = (function() {
        var text =
  '\n                <div class="flex column wrap dropdown-group">\n                    <div class="dropdown">\n                        <div class="input"><span class="display">\u0E2D\u0E31\u0E19\u0E14\u0E31\u0E1A\u0E21\u0E37\u0E2D</span> <span class="icon dropdown">\u25BC</span></div>\n                        <div class="input-dropdown home shadow-black">\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S</div></div>\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S+</div></div>\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">S-</div></div>\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">P</div></div>\n                        </div>\n                    </div>\n                    <div class="space"></div>\n                    <div class="dropdown">\n                        <div class="input"><span class="display">\u0E08\u0E33\u0E19\u0E27\u0E19\u0E04\u0E39\u0E48</span> <span class="icon dropdown">\u25BC</span></div>\n                        <div class="input-dropdown home shadow-black">\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">1</div></div>\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">2</div></div>\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">3</div></div>\n                            <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">4</div></div>\n                        </div>\n                    </div>\n                    <div class="space"></div>\n                    <div class="dropdown reward">\n                        <div class="input" onclick="toggleDropdown(this)"><span class="display">\u0E40\u0E07\u0E34\u0E19\u0E23\u0E32\u0E07\u0E27\u0E31\u0E25</span> <span class="icon dropdown">\u25BC</span></div>\n                        <div class="dropdown-box shadow-black">\n                            <input type="text" class="item-dropdown" style="width: 100%; border:0" placeholder="\u0E17\u0E35\u0E48 1">\n                            <input type="text" class="item-dropdown" style="width: 100%; border:0" placeholder="\u0E17\u0E35\u0E48 2">\n                            <input type="text" class="item-dropdown" style="width: 100%; border:0" placeholder="\u0E17\u0E35\u0E48 3">\n                        </div>\n                    </div>\n                    <span class="glyphicon glyphicon-remove" onclick="removeHand(this)" style="margin:9px; color:red; cursor:pointer"></span>\n                </div>\n        ';

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
                
        `
        $('#account').append(text);
    });

    var removeAccount = (function(ele) {
        $(ele).parents('.account').remove();
    });

    var toggleDropdown = (function (ele) {
        $(ele).next().toggleClass('show');
    });
</script>
@endsection