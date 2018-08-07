
<div class="modal fade" id="event_modal_desc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 20px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">รายละเอียดผู้เข้าแข่งขัน</h4>
            </div>
            <form class="form-horizontal" id="register_event" action="/register_event" method="post" enctype="multipart/form-data">
            <div class="modal-body">

                    <div class="form-group">
                        <div class="col-sm-2 control-label">
                            ชื่อทีม
                        </div>
                        <div class="col-sm-10">
                            {{ $teams[0]->team_name }}
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ชื่อผู้จัดการ
                            </div>
                            <div class="col-sm-10">
                                {{ $teams[0]->team_manager_name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                เบอร์โทรศัพท์
                            </div>
                            <div class="col-sm-10">
                                {{ $teams[0]->team_manager_phone }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ประเภทลงแข่ง
                            </div>
                            <div class="col-sm-10">
                                {{ $teams[0]->race_name }}
                            </div>
                        </div>

                    @foreach($teams as $key => $team)
                    <div id="player-{{$key+1}}">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <h4 style="color:black">ชื่อผู้เล่น คนที่ {{$key+1}}</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ชื่อ
                            </div>
                            <div class="col-sm-10">
                                {{ $team->team_member_firstname }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                นามสกุล
                            </div>
                            <div class="col-sm-10">
                                {{ $team->team_member_lastname }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ชื่อเล่น
                            </div>
                            <div class="col-sm-10">
                                {{ $team->team_member_nickname }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                เพศ
                            </div>
                            <div class="col-sm-10">
                                {{ $team->team_member_gender }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                อายุ
                            </div>
                            <div class="col-sm-10">
                                {{ $team->team_member_age }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                เบอร์โทรศัพท์
                            </div>
                            <div class="col-sm-10">
                                {{ $team->team_member_phone }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                รางวัลที่เคยได้รับ
                            </div>
                            <div class="col-sm-10">
                                {{ $team->team_member_prize }}
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <div class="col-sm-2 control-label">
                                ภาพผู้เเข่งขัน
                            </div>
                            <div class="col-sm-10">
                                <img src="team_member_pic">
                            </div>
                        </div> -->


                    </div>
                    @endforeach



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
            </form>
        </div>
    </div>
</div>
