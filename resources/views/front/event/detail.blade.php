@if($event->event_user_id === Auth::id() || isAdmin())
<div class="relative">
    <div class="OrgMenu">
        <div class="edit">
            <a class="btn editbtn" href="/event/{{ $event_id }}/edit">
                <span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล
            </a>
        </div>
    </div>
</div>
@endif
<div class="detail-container">
    <br>
        <div class="row">
            <div class="col-md-12 description">
                <span class="glyphicon glyphicon-map-marker" style="color:#ee5b36"></span>
                <a target="_blank" href="{{$event_description->location->position}}"> 
                    <strong>{{$event_description->location->name}}</strong>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <span class="glyphicon glyphicon-calendar" style="color:#43abe2"></span>
                {{$event_description->date}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <span class="glyphicon glyphicon-certificate" style="color:#d9e047"></span>
                <strong>{{$event_description->expenses}}</strong>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                @foreach($list_race as $race)
                    <span class="badge badge-orange">{{$race['race_name']}}</span>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <div class="row square-empty">
                    <div class="col-md-12" align="center">
                        <span style="color:#d0c0ad" align="center"><strong>การโอนเงิน</strong></span>
                    </div>
                    <div class="col-xs-6">
                        ชื่อบัญชี: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->name}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        เลขที่บัญชี: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->account}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        หรือ PromptPay: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->prompypay}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        ธนาคาร: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->bank}}<br>
                        </strong>
                    </div>         
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">วัตถุประสงค์</span><br>    
                @foreach($event_description->objective as $objective)
                <p class="detail-content">
                    
                    {{$objective}}<br>
                    
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">{{$event_description->event_type->type}}</span><br>    
                @foreach($event_description->event_type->detail as $detail)
                <p class="detail-content">
                    
                    {{$detail}}<br>
                    
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ระยะเวลาในการสมัคร</span><br>    
                @foreach($event_description->detail as $detail)
                <p class="detail-content">
                    {{$detail}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">รางวัลการแข่งขัน</span>
                @foreach($event_description->rewards as $reward)
                <p class="detail-content">
                    {{$reward}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head-special">รางวัลพิเศษ</span>
                @foreach($event_description->special_rewards as $reward)
                <p class="detail-content">
                    {{$reward}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">กติกาการแข่งขัน</span>
                @foreach($event_description->rule as $rule)
                <p class="detail-content">
                    {{$rule}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">การพิจารณามือนักกีฬา</span>
                @foreach($event_description->consideration as $consideration)
                <p class="detail-content">
                    {{$consideration}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ลูกแบตที่ใช้ในการแข่ง</span>
                @foreach($event_description->accessory as $accessory)
                <p class="detail-content">
                    {{$accessory}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ประเมินมือ</span>
                @foreach($event_description->screening_person as $screening_person)
                <p class="detail-content">
                    {{$screening_person}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ค่าใช้จ่าย</span>
                @foreach($event_description->expenses_detail as $expenses_detail)
                <p class="detail-content">
                    {{$expenses_detail}}<br>
                </p>
                @endforeach
                @foreach($event_description->postscript as $postscript)
                <p class="detail-content">
                    {{$postscript}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>
</div>    