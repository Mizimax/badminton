@extends('layouts.app')

@section('content')
<br><br>
<div id="content" class="container pad">
    <div class="box">
        <h2>รายชื่อผู้สมัครเป็น Organizer</h2>
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach($orgs as $org)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-9" style="margin-top:5px">
                                <span>คุณ {{ $org->org_firstname }} {{ $org->org_lastname }} ({{$org->org_nickname}})</span>
                            </div>
                            <div class="col-sm-3" align="right">
                                <a href="/org/check/{{ $org->org_id }}" class="btn input login show">
                                    ตรวจ
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection