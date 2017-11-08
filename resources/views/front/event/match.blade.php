<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-3">
        <select id="race_math" name="race_math" class="form-control">
            @foreach ($list_race as $race)
                <option value="{{$race->race_id}}">{{$race->race_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xs-6">
    <a href="#group" id="group_tab" type="button" class="btn btn-tab active" aria-controls="group" role="tab" data-toggle="tab" onclick="clickminitab('group')">
        แบ่งกลุ่ม
    </a>
    <a href="#knockout" id="knockout_tab" type="button" class="btn btn-tab" aria-controls="knockout" role="tab" data-toggle="tab" onclick="clickminitab('knockout')">
        Knockout
    </a>
    </div>
    <div class="col-xs-1"></div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="group">
                @include('front/event/match_table')
            </div>
            <div role="tabpanel" class="tab-pane" id="knockout">
                @include('front/event/knockout_table')
            </div>
        </div>
    </div>
</div>