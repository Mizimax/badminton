@extends('support_wezync.home')

@section('content')

    {{--special set css only page--}}
    <style>
        /*placeholder center*/
        ::-webkit-input-placeholder {
            text-align: center;
        }

        :-moz-placeholder { /* Firefox 18- */
            text-align: center;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            text-align: center;
        }

        :-ms-input-placeholder {
            text-align: center;
        }
        input{display:inline-block;text-align: center}
    </style>

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
                <b>TV</b>
            </div>
        </div>
    </div>

    <!--table from title-->
    <div class="section2">

        <div class="row">



            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">

                    <div style="height: 25px;">
                        slide 1
                    </div>

                    <div class="close_tv">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png" alt="" width="30px" height="30px">
                    </div>
                    <div class="add_tv">
                        <img src="https://cdn1.iconfinder.com/data/icons/general-9/500/add-128.png " alt="" width="60px" height="60px">
                    </div>
                    <div class="text_ontv">
                        เพิ่มรูป
                    </div>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="https://i.pinimg.com/736x/db/86/62/db866210b8672eaa145fe4b740b7ed4c.jpg">
                    </a>

                    <div style="width: 100%">
                        <select class="" >
                            <option value="" data-display-text="เมนูแสดงหน้าจอ"> ไม่เลือก</option>
                            <option value="ในสายแบ่งกลุ่ม">ในสายแบ่งกลุ่ม</option>
                            <option value="ใบสาย Knock out">ใบสาย Knock out</option>
                            <option value="ผลคะแนน LIVE">ผลคะแนน LIVE</option>
                            <option value="ตารางการแข่งขัน">ตารางการแข่งขัน</option>
                            <option value="ผลกิจกรรม">ผลกิจกรรม</option>
                            <option value="ตารางกิจกรรม">ตารางกิจกรรม</option>
                        </select>
                    </div>


                    <input type="text" class="form-control" placeholder="แสดงทุกกี่วินาที" align="center">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">

                    <div style="height: 25px;">
                        slide 2
                    </div>

                    <div class="close_tv">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png" alt="" width="30px" height="30px">
                    </div>
                    <div class="add_tv">
                        <img src="https://cdn1.iconfinder.com/data/icons/general-9/500/add-128.png " alt="" width="60px" height="60px">
                    </div>
                    <div class="text_ontv">
                        เพิ่มรูป
                    </div>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="https://i.pinimg.com/736x/db/86/62/db866210b8672eaa145fe4b740b7ed4c.jpg">
                    </a>

                    <div style="width: 100%">
                        <select class="" >
                            <option value="" data-display-text="เมนูแสดงหน้าจอ"> ไม่เลือก</option>
                            <option value="ในสายแบ่งกลุ่ม">ในสายแบ่งกลุ่ม</option>
                            <option value="ใบสาย Knock out">ใบสาย Knock out</option>
                            <option value="ผลคะแนน LIVE">ผลคะแนน LIVE</option>
                            <option value="ตารางการแข่งขัน">ตารางการแข่งขัน</option>
                            <option value="ผลกิจกรรม">ผลกิจกรรม</option>
                            <option value="ตารางกิจกรรม">ตารางกิจกรรม</option>
                        </select>
                    </div>


                    <input type="text" class="form-control" placeholder="แสดงทุกกี่วินาที">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">

                    <div style="height: 25px;">
                        slide 3
                    </div>

                    <div class="close_tv">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png" alt="" width="30px" height="30px">
                    </div>
                    <div class="add_tv">
                        <img src="https://cdn1.iconfinder.com/data/icons/general-9/500/add-128.png " alt="" width="60px" height="60px">
                    </div>
                    <div class="text_ontv">
                        เพิ่มรูป
                    </div>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="https://i.pinimg.com/736x/db/86/62/db866210b8672eaa145fe4b740b7ed4c.jpg">
                    </a>

                    <div style="width: 100%">
                        <select class="" >
                            <option value="" data-display-text="เมนูแสดงหน้าจอ"> ไม่เลือก</option>
                            <option value="ในสายแบ่งกลุ่ม">ในสายแบ่งกลุ่ม</option>
                            <option value="ใบสาย Knock out">ใบสาย Knock out</option>
                            <option value="ผลคะแนน LIVE">ผลคะแนน LIVE</option>
                            <option value="ตารางการแข่งขัน">ตารางการแข่งขัน</option>
                            <option value="ผลกิจกรรม">ผลกิจกรรม</option>
                            <option value="ตารางกิจกรรม">ตารางกิจกรรม</option>
                        </select>
                    </div>


                    <input type="text" class="form-control" placeholder="แสดงทุกกี่วินาที">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">

                    <div style="height: 25px;">
                        slide 4
                    </div>

                    <div class="close_tv">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png" alt="" width="30px" height="30px">
                    </div>
                    <div class="add_tv">
                        <img src="https://cdn1.iconfinder.com/data/icons/general-9/500/add-128.png " alt="" width="60px" height="60px">
                    </div>
                    <div class="text_ontv">
                        เพิ่มรูป
                    </div>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="https://i.pinimg.com/736x/db/86/62/db866210b8672eaa145fe4b740b7ed4c.jpg">
                    </a>

                    <div style="width: 100%">
                        <select class="" >
                            <option value="" data-display-text="เมนูแสดงหน้าจอ"> ไม่เลือก</option>
                            <option value="ในสายแบ่งกลุ่ม">ในสายแบ่งกลุ่ม</option>
                            <option value="ใบสาย Knock out">ใบสาย Knock out</option>
                            <option value="ผลคะแนน LIVE">ผลคะแนน LIVE</option>
                            <option value="ตารางการแข่งขัน">ตารางการแข่งขัน</option>
                            <option value="ผลกิจกรรม">ผลกิจกรรม</option>
                            <option value="ตารางกิจกรรม">ตารางกิจกรรม</option>
                        </select>
                    </div>


                    <input type="text" class="form-control" placeholder="แสดงทุกกี่วินาที">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">

                    <div style="height: 25px;">
                        slide 5
                    </div>

                    <div class="close_tv">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png" alt="" width="30px" height="30px">
                    </div>
                    <div class="add_tv">
                        <img src="https://cdn1.iconfinder.com/data/icons/general-9/500/add-128.png " alt="" width="60px" height="60px">
                    </div>
                    <div class="text_ontv">
                        เพิ่มรูป
                    </div>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="https://i.pinimg.com/736x/db/86/62/db866210b8672eaa145fe4b740b7ed4c.jpg">
                    </a>

                    <div style="width: 100%">
                        <select class="" >
                            <option value="" data-display-text="เมนูแสดงหน้าจอ"> ไม่เลือก</option>
                            <option value="ในสายแบ่งกลุ่ม">ในสายแบ่งกลุ่ม</option>
                            <option value="ใบสาย Knock out">ใบสาย Knock out</option>
                            <option value="ผลคะแนน LIVE">ผลคะแนน LIVE</option>
                            <option value="ตารางการแข่งขัน">ตารางการแข่งขัน</option>
                            <option value="ผลกิจกรรม">ผลกิจกรรม</option>
                            <option value="ตารางกิจกรรม">ตารางกิจกรรม</option>
                        </select>
                    </div>


                    <input type="text" class="form-control" placeholder="แสดงทุกกี่วินาที">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">

                    <div style="height: 25px;">
                        slide 6
                    </div>

                    <div class="close_tv">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png" alt="" width="30px" height="30px">
                    </div>
                    <div class="add_tv">
                        <img src="https://cdn1.iconfinder.com/data/icons/general-9/500/add-128.png " alt="" width="60px" height="60px">
                    </div>
                    <div class="text_ontv">
                        เพิ่มรูป
                    </div>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="https://i.pinimg.com/736x/db/86/62/db866210b8672eaa145fe4b740b7ed4c.jpg">
                    </a>

                    <div style="width: 100%">
                        <select class="" >
                            <option value="" data-display-text="เมนูแสดงหน้าจอ"> ไม่เลือก</option>
                            <option value="ในสายแบ่งกลุ่ม">ในสายแบ่งกลุ่ม</option>
                            <option value="ใบสาย Knock out">ใบสาย Knock out</option>
                            <option value="ผลคะแนน LIVE">ผลคะแนน LIVE</option>
                            <option value="ตารางการแข่งขัน">ตารางการแข่งขัน</option>
                            <option value="ผลกิจกรรม">ผลกิจกรรม</option>
                            <option value="ตารางกิจกรรม">ตารางกิจกรรม</option>
                        </select>
                    </div>


                    <input type="text" class="form-control" placeholder="แสดงทุกกี่วินาที">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="form-group">

                    <div style="height: 25px;">
                        slide 7
                    </div>

                    <div class="close_tv">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/55049-200.png" alt="" width="30px" height="30px">
                    </div>
                    <div class="add_tv">
                        <img src="https://cdn1.iconfinder.com/data/icons/general-9/500/add-128.png " alt="" width="60px" height="60px">
                    </div>
                    <div class="text_ontv">
                        เพิ่มรูป
                    </div>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="https://i.pinimg.com/736x/db/86/62/db866210b8672eaa145fe4b740b7ed4c.jpg">
                    </a>

                    <div style="width: 100%">
                        <select class="" >
                            <option value="" data-display-text="เมนูแสดงหน้าจอ"> ไม่เลือก</option>
                            <option value="ในสายแบ่งกลุ่ม">ในสายแบ่งกลุ่ม</option>
                            <option value="ใบสาย Knock out">ใบสาย Knock out</option>
                            <option value="ผลคะแนน LIVE">ผลคะแนน LIVE</option>
                            <option value="ตารางการแข่งขัน">ตารางการแข่งขัน</option>
                            <option value="ผลกิจกรรม">ผลกิจกรรม</option>
                            <option value="ตารางกิจกรรม">ตารางกิจกรรม</option>
                        </select>
                    </div>


                    <input type="text" class="form-control" placeholder="แสดงทุกกี่วินาที">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div style="padding-top: 25px;"></div>
                <div class="add_another" style="color: #2aabd2;">
                    เพิ่มหน้า
                </div>

                <div class="add_tv_another">
                    <img src="https://cdn4.iconfinder.com/data/icons/meBaze-Freebies/128/add.png" alt="" width="60px" height="60px">
                </div>
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="img/white_picture.jpg">
                </a>
            </div>

        </div>


        <!-- /.container -->
    </div>
@endsection
