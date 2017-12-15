<?php 
    $start_key = 0;
    $start_match = 0;
?>
@foreach ($round_knockout as $number_round => $round)
<div class="row">
    
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <h2>{{$round}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                
                <table class="table table-bordered">
                    <tr>
                        <td align="center" class="col-xs-4">ทีม</td>
                        <td align="center" class="col-xs-4">ทีม</td>
                        <td align="center" class="col-xs-2">เวลา</td>
                        <td align="center" class="col-xs-2">ผลการแข่ง</td>
                    </tr>
                    <?php
                        $slice_item = array_slice($knock_match, $start_match, $number_match_knockout[$number_round]);
                    ?>
                    
                    @foreach($slice_item as $match)
                        @if($match['match_status'] == "NOT START")
                            <tr>
                                <td>
                                    @if($match['match_team_1'])
                                        @foreach($all_team[$match['match_team_1']] as $member)
                                            {{$member->name}}<br>
                                        @endforeach
                                    @else
                                        {{$match['match_team_1_name']}}
                                    @endif
                                </td>
                                <td>
                                    @if($match['match_team_2'])
                                        @foreach($all_team[$match['match_team_2']] as $member)
                                            {{$member->name}}<br>
                                        @endforeach
                                    @else
                                        {{$match['match_team_2_name']}}
                                    @endif
                                </td>
                                <td align="center" >{{$match['time_stamp']}}</td>
                                <td align="center" >{{$match['match_status']}}</td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    @if($match['match_team_1'])
                                        @foreach($all_team[$match['match_team_1']] as $member)
                                            {{$member->name}}<br>
                                        @endforeach
                                    @else
                                        {{$match['match_team_1_name']}}
                                    @endif
                                </td>
                                <td>
                                    @if($match['match_team_2'])
                                        @foreach($all_team[$match['match_team_2']] as $member)
                                            {{$member->name}}<br>
                                        @endforeach
                                    @else
                                        {{$match['match_team_2_name']}}
                                    @endif
                                </td>
                                <td align="center" >{{$match['time_stamp']}}</td>
                                <td align="center" >
                                    @foreach($match['score'] as $score)
                                        {{$score['set_score_team_1']}} - {{$score['set_score_team_2']}}<br>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                    
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
</div>
    <?php $start_match += $number_match_knockout[$number_round];?>
@endforeach

