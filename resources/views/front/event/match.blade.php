
@if ($team_math !=[] && ((($event->event_user_id === Auth::id() || isAdmin()) && $line_type === 1) || $line_type === 0))
@if($event->event_user_id === Auth::id() || isAdmin())
<!-- manager -->
<div class="nav-manage" id="manager_2" align="center">

        <div class="manager fixed">
            <div class="circle shadow-black" style="background-image: url({{ Auth::user()->user_profile }})">
            </div>
            <div style="color:#888; margin-top:10px">แก้ไขสถานะโดย</div>
            <b class="color-black">{{ Auth::user()->name }}</b>
            <div>
                <div class="circle inline" style="width: 10px; height: 10px; background:#7EE08D"></div> <span style="color:#999">Online/Editable</span>
            </div>
            <br>
            <span class="normal" style="background:#FBB03B">Premium</span>
            <br>
            <img src="/images/events/manage.svg" width="50">
            <span class="left-txt">เพิ่มและแก้ไขคะแนนได้ระหว่างการแข่งรองรับใน <span class="red-txt">"คอม"</span> และใน <span class="red-txt">"มือถือ"</span></span>
            <img src="/images/events/knockout.svg" width="50">
            <span class="left-txt">แสดงรายชื่อถึงใบสาย <br><span class="red-txt">Knock out อัตโนมัติ</span></span>
            <img src="/images/events/mobile.svg" width="50">
            <span class="left-txt">แสดงบนมือถือทุกคน</span>
        </div>
        <div class="manager-right fixed" align="center">
            <span class="normal">Normal</span>
            @if(!isset($line_type) || $line_type === 1)
            <img class="dice" src="/images/events/dice.svg" style="margin-top:25px;" onclick="judsaiEiei()">
            <div class="dice-txt">สุ่มรายชื่อใบสาย แบ่งกลุ่ม<br>(จัดทีละมือและแยกชื่อทีม)</div>
            <img class="confirm" src="/images/events/confirm.svg" style="margin-top:10px;" onclick="judsaiConfirm()">
            <div class="confirm-txt">ยืนยันและประกาศ<br>การจัดสาย</div>
            @endif
            <div class="nav-bottom {{ $line_type === 0 ? 'toTop': '' }}">
                <div class="print"><img src="/images/events/print.svg"></div>
                <div class="excel"><img src="/images/events/excel.svg"></div>
            </div>
        </div>

</div>

<div class="nav-manage-mobile">
    <div class="left">
        <div class="hide">
        </div>
        <span class="premium relative" onclick="menuToggle(this)">
            <span class="absolute middle">Premium</span>
            <span class="glyphicon glyphicon-remove absolute middle hide" style="font-size:18px;"></span>
        </span>
    </div>
    <div class="right">
        <div class="hide">
            @if(!isset($line_type) || $line_type === 1)
            <img class="menu-mobile" src="/images/events/confirm.svg" onclick="judsaiConfirm()">
            <img class="menu-mobile" src="/images/events/dice.svg" onclick="judsaiEiei()">>
            @endif
            <img class="menu-mobile" src="/images/events/print.svg">
            <img class="menu-mobile" src="/images/events/excel.svg">
        </div>
        <span class="menu-btn" onclick="menuToggle(this)">
            <span class="absolute middle">Menu</span>
            <span class="glyphicon glyphicon-remove absolute middle hide" style="font-size:18px;"></span>
        </span>
    </div>
</div>
@endif
<hr style="margin: 10px 0">
            
        <div class="match-container">
            <div class="col-xs-12" align="center" style="display: flex; flex-wrap: wrap;justify-content: flex-start;">
                <div class="center dropdown-match" align="left">
                    <p class="font-med color-black font-bold">อันดับมือ</p>
                    <div class="hide">
                        <input type="text" name="hand_dropdown" id="hand_dropdown" value="{{ $list_race[0]->race_id }}">
                    </div>
                    <div class="input" style="margin:0 auto;max-width: 100%; width: 170px;transform: translateY(-10%); font-size: 15px"><span class="display" id="match" style="text-align: center">{{ $list_race[0]->race_name }}</span> <span class="icon dropdown">▼</span>
                    
                    </div>
                    <div class="input-dropdown event shadow-black">
                        @foreach ($list_race as $race)
                        <div class="item-dropdown" value="{{$race->race_id}}" onclick="selectDropdown(this);search_match({{$race->race_id}})"><div class="item">{{$race->race_name}}</div></div>
                        @endforeach
                    </div>
                
                </div>
                <div class="center button-select">
            <a href="#all" id="all_tab" type="button" class="button is-info is-active font-meder is-outlined max" aria-controls="all" role="tab" data-toggle="tab">
            ภาพรวม
            </a>
           <a href="#group" id="group_tab" type="button" class="button is-info font-meder is-outlined max" aria-controls="group" role="tab" data-toggle="tab">
                แบ่งกลุ่ม
            </a>
            <a href="#knockout" id="knockout_tab" type="button" class="button is-info font-meder is-outlined max" aria-controls="knockout" role="tab" data-toggle="tab">
                Knockout
            </a>
        </div>
            </div>
            </div>

            
<div class="row">
    <div class="col-xs-12">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="group">
                @include('front/event/match_table')
            </div>
            <div role="tabpanel" class="tab-pane fade" id="knockout">
                @include('front/event/knockout_table')
            </div>
            <div role="tabpanel" class="tab-pane fade in active" id="all">
                @include('front/event/all')
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-xs-12" align="center" style="height: 200px">
        <span class="absolute middle">ตารางแบ่งสายจะขึ้นวันที่ {{$event->event_end}}</span>
    </div>
</div>
@endif