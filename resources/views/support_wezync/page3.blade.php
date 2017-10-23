@extends('support_wezync.home')

@section('content')
    <!--topbar-->
    <div class="topbar">
        <div class="flex-center" style="overflow:hidden;margin-top: 0px;">
            <img class="img_blur screen_blur" src="https://wezync.com/images/event/event1.png" alt="" >
        </div>
        <div class="flex-center" style="margin-top: 0px">
            <img class="img_topbar" src="https://wezync.com/images/event/event1.png" alt="" >
        </div>
    </div>

    <!--title 1 menu-->
    <div class="section2" style="background-color: transparent;font-size: 30px;padding-left: 0px">
        <div class="row">
            <div class="col-md-10 col-xs-10">
                <b>กรอกคะแนนผู้เล่น</b>
            </div>
        </div>
    </div>

    <!--table from title-->
    <div class="section2">
        <div class="row">
            <div class="col-md-10 col-xs-10 col-centered space">
                <b>ค้นหาชื่อ หรือเลข Match</b>
            </div>
            <div class="col-md-10 col-xs-10 col-centered space">
                <form class="search-form">
                    <input type="search" value="" placeholder="Search" class="search-input" style="margin-left: 0px; }">
                    <button type="submit" class="search-button">
                        <svg class="submit-button">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
                        </svg>
                    </button>
                </form>
                <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
                    <symbol id="search" viewBox="0 0 32 32">
                        <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
                    </symbol>
                </svg>
            </div>
            <div class="col-md-10 col-xs-10 col-centered space">
                <hr>
            </div>
            <div class="col-md-10 col-xs-10 col-centered space">
                <div style="display:flex;height:160px;">
                    <div style="width: 40%;">
                        <div class="img_zone" style="text-align: center">
                            <img src="http://www.fillmurray.com/300/300" />
                            <img src="http://www.fillmurray.com/300/300" />
                        </div>
                        <div class="text_zone" style="padding-top: 10px;padding-bottom:10px;padding-left: 30px;line-height: 10px;">
                            <p>asfasfasasf</p>
                            <p>asfasfasf</p>
                        </div>
                    </div>
                    <div style="width: 20%;font-size: 70px;text-align: center;vertical-align: middle;line-height: 160px;">
                        VS
                    </div>
                    <div style="width: 40%;">
                        <div class="img_zone" style="text-align: center">
                            <img src="http://www.fillmurray.com/300/300" />
                            <img src="http://www.fillmurray.com/300/300" />
                        </div>
                        <div class="text_zone" style="padding-top: 10px;padding-bottom:10px;padding-left: 30px;line-height: 10px;">
                            <p>asfasfasasf</p>
                            <p>asfasfasf</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-4 col-centered text-center space" style="border: 1px solid #4d4d4d;padding: 5px;">

                <p>rank : <span style="color: #f7921d">C+</span></p>
                <p>Match No. : <span style="color: #f7921d">201</span></p>

            </div>
            <div class="col-md-10 col-xs-10 col-centered text-center space">
                <form class="form-inline">
                    <!--set 1-->
                    <div class="form-group">
                        <label for="exampleInputName2">set 1 : </label>
                        <input type="text" class="form-control" id="exampleInputName2" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2"> ต่อ </label>
                        <input type="email" class="form-control" id="exampleInputEmail2">
                    </div>
                    <!--set 2-->
                    <div class="form-group">
                        <label for="exampleInputName2">set 2 : </label>
                        <input type="text" class="form-control" id="exampleInputName2" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2"> ต่อ </label>
                        <input type="email" class="form-control" id="exampleInputEmail2">
                    </div>
                    <!--set 3-->
                    <div class="form-group">
                        <label for="exampleInputName2">set 3 : </label>
                        <input type="text" class="form-control" id="exampleInputName2" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2"> ต่อ </label>
                        <input type="email" class="form-control" id="exampleInputEmail2">
                    </div>
                </form>
            </div>
            <div class="col-md-10 col-xs-10 col-centered text-center space">
                <button type="button" class="btn btn-info" style="padding-top: 10px;padding-bottom: 10px;width: 170px;font-size: 20px;">ส่ง</button>
            </div>
        </div>
    </div>

@endsection
