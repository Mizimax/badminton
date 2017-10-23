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
    {{--<div style="margin: auto; max-width: 450px;padding: 20px;">--}}
            <div class="section2">
                <div style="margin: auto; max-width: 360px;">
                    <div style="width: 90px;">
                        <select name="Mix" >
                            <option value="Mix p-">Mix p-</option>
                            <option value="Mix p-">Mix p-</option>
                            <option value="Mix p-">Mix p-</option>
                            <option value="Mix p-">Mix p-</option>
                        </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div style="position: relative;display: inline-block;vertical-align: middle;padding-left: 20px;border-left: 1px solid #4d4d4d">
                        <a href="#" class="btn btn-info">รอบแบ่งกลุ่ม</a>
                        <a href="#" class="btn btn-default">รอบ knock out</a>
                    </div>

                </div>
            </div>
    {{--</div>--}}

    <!--table from title-->
    <div class="section2">
        <div class="row">
            <div class="col-md-10 col-xs-10" style="padding-bottom: 20px;">
                <div class="table-title-text" style="padding-left: 8px;">
                    <b>Mix P -</b>
                    <span>รอบแบ่งกลุ่ม</span>
                </div>
            </div>
            <div>
                <!--table-->
                <table>
                    <tr>
                        <th>กลุ่ม</th>
                        <th>Team</th>
                        <th>Name 1</th>
                        <th>Name 2</th>
                        <th>Match No.</th>
                    </tr>
                </table>
                <table class="table_1">
                    <tr>
                        <th class="tr_table_1">A</th>
                    </tr>
                    <tr>
                        <td>A1</td>
                        <td>AAAAA</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>A2</td>
                        <td>AAAAA</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>A3</td>
                        <td>AAAAA</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>A4</td>
                        <td>AAAAA</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                </table>
                <table class="table_2">
                    <tr>
                        <th class="tr_table_2">B</th>
                    </tr>
                    <tr>
                        <td>B1</td>
                        <td>BBBBB</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>B2</td>
                        <td>BBBBB</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>B3</td>
                        <td>BBBBB</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>B4</td>
                        <td>BBBBB</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>ธนมงคล แย้มเดช</td>
                        <td>1</td>
                        <td>39</td>
                        <td>70</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!--button print-->
    <div class="print_button">
        <img src="http://3.bp.blogspot.com/-W3mGn7FPg2c/VLsnm026nBI/AAAAAAAACzo/MFfA2Qh-ZoU/s1600/print-button.png" alt="">
    </div>
@endsection
