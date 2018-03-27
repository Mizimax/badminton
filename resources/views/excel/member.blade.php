<BODY>

<TABLE  x:str BORDER=”1″>

<TR>
    <TD>ประทับเวลา</TD>
    <TD>สมัครแข่งขัน</TD>
    <TD>ชื่อทีม</TD>
    <TD>ชื่อผู้จัดการทีม</TD>
    <TD>เบอร์โทรติดต่อ / Line</TD>
    <TD>ชื่อ - นามสกุล นักกีฬา คนที่1 *</TD>
    <TD>ชื่อเล่น</TD>
    <TD>เพศ</TD>
    <TD>อายุ</TD>
    <TD>เบอร์ติดต่อ</TD>
    <TD>ผลงานที่ดีที่สุดใน2ปีที่ผ่านมา (ห้ามระบุว่าไม่เคยคู่กัน)</TD>
    <TD>ชื่อ - นามสกุล นักกีฬา คนที่2*</TD>
    <TD>ชื่อเล่น</TD>
    <TD>เพศ</TD>
    <TD>อายุ</TD>
    <TD>เบอร์ติดต่อ</TD>
    <TD>ผลงานที่ดีที่สุดใน2ปีที่ผ่านมา (ห้ามระบุว่าไม่เคยคู่กัน)</TD>
    <TD>ข้อตกลงร่วมกัน</TD>
</TR>

@foreach($members as $data)
<TR style="{{$data['team_status'] === 3 ? 'background: #F4CCCC; color:red' : ( $data['team_status'] === 2 ? 'background: #D9EAD3' : 'background: white' ) }}">

<TD>
{{$data['team_status_name']}}
</TD>

<TD>
{{$data['race_name']}}
</TD>

<TD>
{{$data['team_name']}}
</TD>

<TD>
{{$data['team_manager'] ? $data['team_manager']: '-'}}
</TD>

<TD>
{{$data['team_manager_phone'] ? $data['team_manager_phone']: '-'}}
</TD>

@for($i=0; $i<=1; $i++)
<TD>{{ json_decode($data['team_member_firstname'])[$i] }} {{ json_decode($data['team_member_lastname'])[$i] }}</TD>
<TD>{{ json_decode($data['team_member_nickname'])[$i] }}</TD>
<TD>{{ json_decode($data['team_member_gender'])[$i] === 'm' ? 'ชาย' : 'หญิง' }}</TD>
<TD>{{ json_decode($data['team_member_age'])[$i] }}</TD>
<TD>{{ json_decode($data['team_member_phone'])[$i] }}</TD>
<TD>{{ isset(json_decode($data['team_member_prize'])[$i]) ? json_decode($data['team_member_prize'])[$i] : '-' }}</TD>

@endfor
<TD>ยอมรับ</TD>


</TR>
@endforeach

</TABLE>

</BODY>

</HTML>