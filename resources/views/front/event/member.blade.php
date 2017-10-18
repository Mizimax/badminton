<table id="table-member" class="table table-hover">
    <thead>
        <tr>
            <th class="col-xs-2" style="text-align:center">ทีม</th>
            @for( $order = 1; $order <= $number_of_team; $order++)
            <th class="col-xs-2" style="text-align:center"><strong>ผู้เล่น {{$order}}</strong></th>
            @endfor
            <th class="col-xs-2" style="text-align:center"><strong>อันดับมือ</strong></th>
            <th class="col-xs-2" style="text-align:center"><strong>สถานะประเมิน</strong></th>
            <th class="col-xs-2" style="text-align:center"><strong>ชำระเงิน</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $key=>$data)
        <tr>
            <td style="text-align:center">
                {{$data['team_name']}}
            </td>
            @for( $order = 0; $order < $number_of_team; $order++)
            <td style="text-align:center">{{$data['member'][$order]->name}}</td>
            @endfor
            <td style="text-align:center">
                <span class="label label-info">{{$data['rank_name']}}</span></td>
            <td style="text-align:center">
            @if ($data['team_status'] == 1)
            <span class="label label-success">{{$data['team_status_name']}}</span>
            @elseif ($data['team_status'] == 2)
            <span class="label label-danger">{{$data['team_status_name']}}</span>
            @elseif ($data['team_status'] == 3)
            <span class="label label-info">{{$data['team_status_name']}}</span>
            @endif
            @if($data['team_comment'])
            <a class="badge badge-white" data-toggle="tooltip" data-placement="top" title="{{$data['team_comment']}}" data-original-title="">!</a>
            @endif
            
            </td>
            <td style="text-align:center">
            @if($data['team_payment'] == 1)
                <span class="glyphicon glyphicon-ok-sign" style="color:#d9e047"></span>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>