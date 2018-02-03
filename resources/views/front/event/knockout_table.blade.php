<div class="row">
    <div class="col-xs-12">
    @if(count($knock_match) !== 0)
        <?php

            function checkTeamWin($match, $round_match, $team) {
                $score_team_1 = 0;
                $score_team_2 = 0;
                $score_diff;
                $team_win;

                if($round_match['match_status'] === 'NOT START')
                    return false;

                foreach ($round_match['score'] as $score) {
                    $score_team_1 += (int)$score['set_score_team_1'];
                    $score_team_2 += (int)$score['set_score_team_2'];
                }
                $score_diff = $score_team_1 - $score_team_2;
                if($score_diff < 0)
                    $team_win = $round_match['match_team_2'];
                else if($score_diff > 0)
                    $team_win = $round_match['match_team_1'];
                else
                    return false;

                return $match['match_team_'. $team] === $team_win;
            }

            if($number_match_knockout[0] === 4) {
                $slice_item = array_slice($knock_match, 0, $number_match_knockout[0]);
                $slice_item2 = [];
            }
            else if($number_match_knockout[0] === 8) {
                $slice_item = array_slice($knock_match, 0, $number_match_knockout[0]/2);
                $slice_item2 = array_slice($knock_match, $number_match_knockout[0]/2, $number_match_knockout[0]/2);
            }
        ?>
        <div class="top">
            @foreach($slice_item as $key => $match)
            @php
                if($key % 2 === 0 && $key !== 0)
                    $match_num++;
            @endphp
                <div class="team">
                    <div class="members">
                        <span class="name">@if($match['match_team_1'])
                            @foreach($all_team[$match['match_team_1']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_1_name']}}
                        @endif</span>
                        <div class="round {{ checkTeamWin($match, $match, '1') ? 'border-active' : '' }}">
                            <span class="time-play start">
                                {{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}
                                
                            </span>
                            <div class="line-pass">
                                <span class="time-play match">
                                    @if($number_match_knockout[0] === 4)
                                    <img src="/images/events/cup_third.png" width="20">
                                    @endif
                                    {{ $round[0][$match_num]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[0][$match_num]['time_stamp'] }}
                                </span>  
                                <div class="final {{ checkTeamWin($match, $round[0][$match_num], '1') ? 'border-active' : '' }}">
                                    @if(count($slice_item2) === 0)
                                        <span class="time-play finals"><img src="/images/events/cup_second.png" width="30">{{ $round[1][0]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[1][0]['time_stamp'] }}</span>
                                        <div class="cup {{ checkTeamWin($match, $round[1][0], '1') ? 'border-active' : '' }}">
                                                <img class="first" src="/images/events/cup_first.png">
                                        </div>
                                    @else
                                        <span class="time-play finals">
                                             <img src="/images/events/cup_third.png" width="20">
                                        {{ $round[1][0]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[1][0]['time_stamp'] }}
                                        </span>
                                        <div class="cup {{ checkTeamWin($match, $round[1][0], '1') ? 'border-active' : '' }}">
                                            <span class="time-play silver"><img src="/images/events/cup_second.png" width="30">{{ $round[2][0]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[2][0]['time_stamp'] }}</span>
                                            <div class="finish {{ checkTeamWin($match, $round[2][0], '1') ? 'border-active' : '' }}">
                                                <img class="first" src="/images/events/cup_first.png">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="members two">
                        <span class="name">@if($match['match_team_2'])
                            @foreach($all_team[$match['match_team_2']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_2_name']}}
                        @endif</span>
                        <div class="round-bottom {{ checkTeamWin($match, $match, '2') ? 'border-active' : '' }}">
                            <div class="line-pass">
                                <div class="final {{ checkTeamWin($match, $round[0][$match_num], '2') ? 'border-active' : '' }}">
                                    @if(count($slice_item2) === 0)
                                        <div class="cup {{ checkTeamWin($match, $round[1][0], '2') ? 'border-active' : '' }}">
                                            <img class="first" src="/images/events/cup_first.png">
                                        </div>
                                    @else
                                        <div class="cup {{ checkTeamWin($match, $round[1][0], '2') ? 'border-active' : '' }}">
                                            <div class="finish {{ checkTeamWin($match, $round[2][0], '2') ? 'border-active' : '' }}">
                                                
                                            </div>
                                        </div>
                                    @endif
                                </div> 
                            </div> 
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>

        <div class="bottom">
            @php
                $match_num++;
            @endphp
            @foreach($slice_item2 as $key => $match)
            @php
                if($key % 2 === 0 && $key !== 0)
                    $match_num++;
            @endphp
                <div class="team">
                    <div class="members">
                        <span class="name">@if($match['match_team_1'])
                            @foreach($all_team[$match['match_team_1']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_1_name']}}
                        @endif</span>
                        <div class="round {{ checkTeamWin($match, $match, '1') ? 'border-active' : '' }}">
                            <span class="time-play start">
                                {{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}
                                
                            </span>
                            <div class="line-pass">
                                <span class="time-play match">
                                    @if($number_match_knockout[0] === 4)
                                    <img src="/images/events/cup_third.png" width="20">
                                    @endif
                                    {{ $round[0][$match_num]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[0][$match_num]['time_stamp'] }}
                                </span>  
                                <div class="final {{ checkTeamWin($match, $round[0][$match_num], '1') ? 'border-active' : '' }}">
                                    <span class="time-play finals"><img src="/images/events/cup_third.png" width="20">{{ $round[1][1]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[1][1]['time_stamp'] }}</span>
                                    <div class="cup {{ checkTeamWin($match, $round[1][0], '1') ? 'border-active' : '' }}">
                                        <div class="finish {{ checkTeamWin($match, $round[2][0], '1') ? 'border-active' : '' }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="members two">
                        <span class="name">@if($match['match_team_2'])
                            @foreach($all_team[$match['match_team_2']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_2_name']}}
                        @endif</span>
                        <div class="round-bottom {{ checkTeamWin($match, $match, '2') ? 'border-active' : '' }}">
                            <div class="line-pass">
                                <div class="final {{ checkTeamWin($match, $round[0][$match_num], '2') ? 'border-active' : '' }}">
                                    <div class="cup {{ checkTeamWin($match, $round[1][0], '2') ? 'border-active' : '' }}">
                                        <div class="finish {{ checkTeamWin($match, $round[2][0], '2') ? 'border-active' : '' }}"></div>
                                    </div>
                            </div> 
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
            <div align="center" style="height: 300px">
                <div class="absolute middle">
                    ยังไม่มีการแบ่งตารางแข่งรอบ Knockout
                </div>
            </div>
    @endif
    </div>
</div>
                    
            