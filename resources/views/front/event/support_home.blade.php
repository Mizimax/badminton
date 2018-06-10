<div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 20px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">สมัครแข่งขัน</h4>
            </div>
            <form class="form-horizontal" onSubmit="return check_gender({{$number_of_team[0]}})" id="register_event" action="/register_event" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                    <input class="hidden" id="number_of_team" name="number_of_team" value="{{$number_of_team[0]}}">
                    <input class="hidden" id="event_id" name="event_id" value="{{ $event->event_id }}">

                    @if($number_of_team[0] == 1)
                        <div class="form-group hidden">
                            <div class="col-sm-2 control-label">
                                ชื่อทีม
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" id="team_name" name="team_name" value="" type="text" autocomplete="off" >
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ชื่อทีม
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" required id="team_name" name="team_name" value="" type="text" autocomplete="off" >
                            </div>
                        </div>
                    @endif
                    @if (Auth::guest())
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ชื่อผู้จัดการ
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" required id="team_manager" name="team_manager" value="" type="text" autocomplete="off" >
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control hidden" id="team_manager_id" name="team_manager_id" value="0" type="text" autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                เบอร์โทรศัพท์
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" required id="team_phone" name="team_phone" value="" type="text" autocomplete="off" >
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ชื่อผู้จัดการ
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" required id="team_manager" name="team_manager" value="{{ Auth::user()->name }}" type="text" autocomplete="off" >
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control hidden" id="team_manager_id" name="team_manager_id" value="{{ Auth::user()->id }}" type="text" autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                เบอร์โทรศัพท์
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" required id="team_phone" name="team_phone" value="{{ Auth::user()->user_phone }}" type="text" autocomplete="off" >
                            </div>
                        </div>
                    @endif
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ประเภทลงแข่ง
                            </div>
                            <div class="col-sm-10">
                                <select id="race" name="race" class="form-control" onchange="changeMemberNo(this)">
                                @php
                                $list_races = collect($list_race)->filter(function ($value, $key) {
                                    return $value['status'] == 0 && $value['can_register'] > 0;
                                })->toArray();
                                $list_races = array_values($list_races);
                                @endphp
                                    @foreach ($list_races as $key => $race)

                                        <option key="{{ $number_of_team[$key] }}" value="{{$race['race_id']}}">{{$race['race_name']}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                    @for( $order = 1; $order <= 2; $order++)
                    <div id="player-{{$order}}" class="{{ (!$list_races || $list_races[0]['can_register'] <= 0 || $list_race[0]['status'] === 1 || ($order === 2 && $number_of_team[0] === 1))? 'hide':''}}">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <h4 style="color:black">ชื่อผู้เล่น คนที่ {{$order}}</h4>
                            </div>
                        </div>
                        @if($number_of_team[0] == 1)

                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    ชื่อ
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" onkeyup="createTeamName()" required id="first_name{{$order}}" name="first_name{{$order}}" value="" type="text" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    นามสกุล
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" onkeyup="createTeamName()" required id="last_name{{$order}}" name="last_name{{$order}}" value="" type="text" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    ชื่อเล่น
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" onkeyup="createTeamName()" required id="nickname{{$order}}" name="nickname{{$order}}" value="" type="text" autocomplete="off" >
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    ชื่อ
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" required id="first_name{{$order}}" name="first_name{{$order}}" value="" type="text" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    นามสกุล
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" required id="last_name{{$order}}" name="last_name{{$order}}" value="" type="text" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    ชื่อเล่น
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" required id="nickname{{$order}}" name="nickname{{$order}}" value="" type="text" autocomplete="off" >
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                อันดับของผู้เล่น
                            </div>
                            <div class="col-sm-10">
                                <select id="rank{{$order}}" name="rank{{$order}}" class="form-control">
                                    @foreach ($list_rank as $rank)
                                        <option value="{{$rank['rank_id']}}">{{$rank['rank_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                เพศ
                            </div>
                            <div class="col-sm-10">
                                <input class="gender hidden" type="radio" id="radio_male{{$order}}" name="gender{{$order}}" value="m">
                                <input class="gender hidden" type="radio" id="radio_female{{$order}}" name="gender{{$order}}" value="f">
                                <button onclick="selected_sex('male', {{$order}})" id="button_male{{$order}}" type="button" class="btn btn-default">ชาย</button>
                                <button onclick="selected_sex('female', {{$order}})" id="button_female{{$order}}" type="button" class="btn btn-default">หญิง</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                อายุ
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" required id="age{{$order}}" name="age{{$order}}" value="" type="text" autocomplete="off" maxlength="2">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                เบอร์โทรศัพท์
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" required id="phone{{$order}}" name="phone{{$order}}" value="" type="text" autocomplete="off" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                รางวัลที่เคยได้รับ
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" id="prize{{$order}}" name="prize{{$order}}" value="" type="text" autocomplete="off" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                อัพโหลดภาพผู้เเข่งขัน(ถ้ามี)
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" id="pic{{$order}}" name="pic{{$order}}" type="file" />
                            </div>
                        </div>


                    </div>
                    @endfor



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
            </div>
            </form>
        </div>
    </div>
