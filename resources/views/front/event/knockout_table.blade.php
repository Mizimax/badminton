<div class="row">
    <div class="col-xs-12">
        <?php
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
                        @if($match['match_team_1'])
                            @foreach($all_team[$match['match_team_1']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_1_name']}}
                        @endif
                        <div class="round">
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
                                <div class="final">
                                    @if(count($slice_item2) === 0)
                                        <span class="time-play finals"><img src="/images/events/cup_second.png" width="20">{{ $round[1][0]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[1][0]['time_stamp'] }}</span>
                                        <div class="cup">
                                                <img class="first" src="/images/events/cup_first.png">
                                        </div>
                                    @else
                                        <span class="time-play finals">
                                             <img src="/images/events/cup_third.png" width="20">
                                        {{ $round[1][$match_num]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[1][$match_num]['time_stamp'] }}
                                        </span>
                                        <div class="cup">
                                            <span class="time-play silver"><img src="/images/events/cup_second.png" width="20">{{ $round[2][0]['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $round[2][0]['time_stamp'] }}</span>
                                            <div class="finish">
                                                <img class="first" src="/images/events/cup_first.png">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="members two">
                        @if($match['match_team_2'])
                            @foreach($all_team[$match['match_team_2']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_2_name']}}
                        @endif
                        <div class="round-bottom border-active">
                            <div class="line-pass">
                                <div class="final">
                                    @if(count($slice_item2) === 0)
                                        <span class="time-play"><img src="/images/events/cup_second.png" width="20">{{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}</span>
                                        <div class="cup">
                                            <img class="first" src="/images/events/cup_first.png">
                                        </div>
                                    @else
                                        <span class="time-play"><img src="/images/events/cup_third.png" width="20">{{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}</span>
                                        <div class="cup">
                                            <div class="finish">
                                                
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
            @foreach($slice_item2 as $key => $match)
            @php
                if($key % 2 === 0 && $key !== 0)
                    $match_num++;
            @endphp
                <div class="team">
                    <div class="members">
                        @if($match['match_team_1'])
                            @foreach($all_team[$match['match_team_1']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_1_name']}}
                        @endif
                        <div class="round">
                            <span class="time-play start">
                                {{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}
                                
                            </span>
                            <div class="line-pass">
                                <span class="time-play match">
                                    @if($number_match_knockout[0] === 4)
                                    <img src="/images/events/cup_third.png" width="20">
                                    @endif
                                    {{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}
                                </span>  
                                <div class="final">
                                    <span class="time-play finals"><img src="/images/events/cup_third.png" width="20">{{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}</span>
                                    <div class="cup">
                                        <div class="finish"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="members two">
                        @if($match['match_team_2'])
                            @foreach($all_team[$match['match_team_2']] as $member)
                                {{$member->name}}<br>
                            @endforeach
                        @else
                            {{$match['match_team_2_name']}}
                        @endif
                        <div class="round-bottom">
                            <div class="line-pass">
                                <div class="final">
                                    <span class="time-play"><img src="/images/events/cup_third.png" width="20">{{ $match['time_stamp'] === '-'? 'ยังไม่กำหนดเวลา': $match['time_stamp'] }}</span>
                                    <div class="cup">
                                        <div class="finish"></div>
                                    </div>
                            </div> 
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</div>
                    
            