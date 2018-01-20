@section('css')
<style>
    .pre{
        white-space: pre;
    }
</style>
@endsection
<br>
<div class="detail-container">
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
        @foreach($event_description->bookbank_organizers as $bank)
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
                            {{$bank->name}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        เลขที่บัญชี: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$bank->account}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        หรือ PromptPay: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$bank->prompypay}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        ธนาคาร: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$bank->bank}}<br>
                        </strong>
                    </div>         
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">วัตถุประสงค์</span><br>    
                
                <p class="detail-content pre">{{$event_description->objective}}
                </p>
                
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">{{$event_description->event_type->type}}</span><br>    
                @foreach($event_description->event_type->detail as $detail)
                <p class="detail-content">{{ $detail }}
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ระยะเวลาในการสมัคร</span><br>    
                
                <p class="detail-content pre">{{$event_description->detail}}
                </p>
                
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">รางวัลการแข่งขัน</span>
                @foreach($event_description->rewards as $reward)
                <p class="detail-content">{{$reward}}
                </p>
                @endforeach
                <br>
            </div>
        </div>
        @if($event_description->special_rewards)
        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head-special">รางวัลพิเศษ</span>

                <p class="detail-content pre">{{$event_description->special_rewards}}
                </p>

                <br>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">กติกาการแข่งขัน</span>
                
                <p class="detail-content pre">{{$event_description->rule}}
                </p>
                
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">การพิจารณามือนักกีฬา</span>
               
                <p class="detail-content pre">{{$event_description->consideration}}
                </p>
                
                <br>
            </div>
        </div>

        @if($event_description->accessory)
        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ลูกแบตที่ใช้ในการแข่ง</span>
                <p class="detail-content pre">{{$event_description->accessory}}
                </p>
                <br>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ประเมินมือ</span>
                @foreach($event_description->screening_person as $screening_person)
                <p class="detail-content">{{$screening_person}}</p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ค่าใช้จ่าย</span>
                
                <p class="detail-content pre">{{$event_description->expenses}}<br></p>
                <br>
                <p class="detail-content pre">{{$event_description->postscript}}</p>
                
                <br>
            </div>
        </div>
</div>    