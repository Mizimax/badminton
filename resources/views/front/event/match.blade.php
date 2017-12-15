@if ($team_math !=[])
<hr style="margin: 10px 0">
            
            <div style="padding: 10px 20px; width:90%; margin: 0 auto;">

            <div class="col-xs-12" align="center" style="display: flex; flex-wrap: wrap;justify-content: flex-start;">
                <div class="center dropdown-match" align="left">
                    <p class="font-med color-black font-bold">อันดับมือ</p>
                    <div class="input" style="margin:0 auto;max-width: 100%; width: 170px;transform: translateY(-10%); font-size: 15px"><span class="display" id="match" style="text-align: center">C</span> <span class="icon dropdown">▼</span>
                    
                    </div>
                    <div class="input-dropdown event shadow-black">
                        @foreach ($list_race as $race)
                        <div class="item-dropdown" value="{{$race->race_id}}" onclick="search_match(this)"><div class="item">{{$race->race_name}}</div></div>
                        @endforeach
                    </div>
                
                </div>
                <div class="center button-select">

           <a href="#group" id="group_tab" type="button" class="button is-info is-active font-meder is-outlined max" aria-controls="group" role="tab" data-toggle="tab" onclick="clickminitab('group')">
                แบ่งกลุ่ม
            </a>
            <a href="#knockout" id="knockout_tab" type="button" class="button is-info font-meder is-outlined max" aria-controls="knockout" role="tab" data-toggle="tab" onclick="clickminitab('knockout')">
                Knockout
            </a>
        </div>
            </div>

            
<div class="row">
    <div class="col-xs-12">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="group">
                @include('front/event/match_table')
            </div>
            <div role="tabpanel" class="tab-pane" id="knockout">
                @include('front/event/knockout_table')
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