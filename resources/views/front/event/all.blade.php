<table class="allTable" cellpadding="0" border="0" cellspacing="0">
  <tr>
    <th align="center" style="width:50px">เวลา</th>
    <th align="center">อันดับมือ</th>
    <th align="center" style="width:53px">Match No.</th>
    <th align="center" colspan="2">รายชื่อ</th>
  </tr>
  @php
  $prev['match_time_id'] = 5;
  $prev['match_line_id'] = 'Z';
  $round = 0;
  $i = 0;
  $loop = 0;
  for($i = 0; $i < count($groupLine)/2; $i++){
    $loop += $groupLine[$i]->count;
  }
  @endphp
  @for($i = 0; $i < $loop; $i++)
  <tr class="{{ $prev['match_time_id'] == $matchs[$i]['match_time_id'] ? '': 'tr-margin' }}">
    <td class="{{ $prev['match_time_id'] == $matchs[$i]['match_time_id'] ? 'hide': '' }} borderTime" rowspan="{{ $prev['match_time_id'] != $matchs[$i]['match_time_id'] ? $groupLine[$round]->count: '' }}"><span class="font-bold font-small">{{ $matchs[$i]['time_stamp']}}</span></td>
    <td style="background-color: {{$matchs[$i]['race_color']}}; color: white; border-bottom: 2px solid #fff" class="{{ $prev['match_line_id'] == $matchs[$i]['match_line_id'] ? 'hide': '' }}" rowspan="{{ $prev['match_line_id'] != $matchs[$i]['match_line_id'] ? 2: '' }}">
      <span class="font-bold font-bigger">{{$matchs[$i]['race_name']}}</span><br>
      กลุ่ม {{ $matchs[$i]['match_line_id']}}
    </td>
    <td class="bordertd">{{ $matchs[$i]['match_number'] }}</td>
    <td class="paddingtd bordertd">{{ $matchs[$i]['team_1_member_1'] }}<br>{{ $matchs[$i]['team_1_member_2'] }}</td>
    <td class="paddingtd bordertd">{{ $matchs[$i]['team_2_member_1'] }}<br>{{ $matchs[$i]['team_2_member_2'] }}</td>
  </tr>
  @php
  $prev = $matchs[$i];
  if($prev['match_time_id'] != $matchs[$i]['match_time_id'])
    $round++;
  @endphp
  @endfor
</table>

<table class="allTable" cellpadding="0" border="0" cellspacing="0">
  <tr>
    <th align="center" style="width:50px">เวลา</th>
    <th align="center">อันดับมือ</th>
    <th align="center" style="width:53px">Match No.</th>
    <th align="center" colspan="2">รายชื่อ</th>
  </tr>
  @php
  $round = 0;
  $i = 0;
  $loopi = 0;
  for($i = 0; $i < count($groupLine); $i++){
    $loopi += $groupLine[$i]->count;
  }
  @endphp
  @for($i = $loop; $i < $loopi; $i++)
  <tr class="{{ $prev['match_time_id'] == $matchs[$i]['match_time_id'] ? '': 'tr-margin' }}">
    <td class="{{ $prev['match_time_id'] == $matchs[$i]['match_time_id'] ? 'hide': '' }} borderTime" rowspan="{{ $prev['match_time_id'] != $matchs[$i]['match_time_id'] ? $groupLine[$round]->count: '' }}"><span class="font-bold font-small">{{ $matchs[$i]['time_stamp']}}</span></td>
    <td style="background-color: {{$matchs[$i]['race_color']}}; color: white; border-bottom: 2px solid #fff" class="{{ $prev['match_line_id'] == $matchs[$i]['match_line_id'] ? 'hide': '' }}" rowspan="{{ $prev['match_line_id'] != $matchs[$i]['match_line_id'] ? 2: '' }}">
      <span class="font-bold font-bigger">{{$matchs[$i]['race_name']}}</span><br>
      กลุ่ม {{ $matchs[$i]['match_line_id']}}
    </td>
    <td class="{{ ($prev['match_line_id'] == $matchs[$i]['match_line_id']) && $i == $loop ? '': 'hide' }}" style="background-color: {{$matchs[$i]['race_color']}};border-bottom: 2px solid #fff"></td>
    <td class="bordertd">{{ $matchs[$i]['match_number'] }}</td>
    <td class="paddingtd bordertd">{{ $matchs[$i]['team_1_member_1'] }}<br>{{ $matchs[$i]['team_1_member_2'] }}</td>
    <td class="paddingtd bordertd">{{ $matchs[$i]['team_2_member_1'] }}<br>{{ $matchs[$i]['team_2_member_2'] }}</td>
  </tr>
  @php
  $prev = $matchs[$i];
  if($prev['match_time_id'] != $matchs[$i]['match_time_id'])
    $round++;
  @endphp
  @endfor
</table>