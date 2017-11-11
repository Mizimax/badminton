

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Support wezync</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!--font-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    {{--import css--}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/lightbox.css') }}" />


    {{--</style>--}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Mitr');

        .col-centered{
            float: none;
            margin: 0 auto;
        }

        .wrapper {
            display: table;
            height: 100%;
            width: 100%;
        }

        .container-fostrap {
            display: table-cell;
            padding: 1em;
            text-align: center;
            vertical-align: middle;
        }
        h1.heading {
            color: #fff;
            font-size: 1.15em;
            font-weight: 900;
            margin: 0 0 0.5em;
            color: #505050;
        }
        @media (min-width: 450px) {
            h1.heading {
                font-size: 3.55em;
            }
        }
        @media (min-width: 760px) {
            h1.heading {
                font-size: 3.05em;
            }
        }
        @media (min-width: 900px) {
            h1.heading {
                font-size: 3.25em;
                margin: 0 0 0.3em;
            }
        }
        .card {
            display: block;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
            transition: box-shadow .25s;
        }
        .card:hover {
            box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }
        .img-card {
            width: 100%;
            height:200px;
            border-top-left-radius:2px;
            border-top-right-radius:2px;
            display:block;
            overflow: hidden;
        }
        .img-card img{
            width:100%;
            height:100%;
            object-fit:fill;
            transition: all .25s ease;
        }
        .card-content {
            padding:15px;
            text-align:left;
            font-size: 12px;
        }
        .card-title {
            margin-top:0px;
            font-weight: 700;
            font-size: 1.65em;
        }
        .card-title a {
            color: #000;
            text-decoration: none !important;
        }
        .card-read-more a {
            text-decoration: none !important;
            padding:10px;
            font-weight:600;
            text-transform: uppercase
        }

        .text-list{
            /*width: 940px;*/
            /*background-color: red;*/
            /*padding: 10px;*/
            text-align: left;
            font-size: 30px;
            margin-left: auto;
            margin-right: auto;
            line-height: 24px;
        }
        .text-list p span{
            text-align: left;
            font-size: 12px;
            color: #cccccc;

        }

        /*placeholder center*/
        ::-webkit-input-placeholder {
            text-align: left;
        }

        :-moz-placeholder { /* Firefox 18- */
            text-align: left;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            text-align: left;
        }

        :-ms-input-placeholder {
            text-align: left;
        }

        /*image_gallery*/
        .image_gallery{
            display: inline-block;
            margin-top: 20px;
        }
        @media (min-width: 1200px){
            .col-lg-3 {
                width: 33%;
            }
        }
        @media (min-width: 992px){
            .col-md-3 {
                width: 33%;
            }
        }
        .download_image_gallery{
            position: absolute;
            right: 12px;
            bottom: 12px;
            left: 12px;
            z-index: 2;
        }
        .close_image_gallery{
            position: absolute;
            right: 12px;
            top: 12px;
            z-index: 2;
        }
        .share_image_gallery{
            position: absolute;
            right: 12px;
            bottom: 12px;
            z-index: 2;
        }

        /*lightbox2*/
        .thumbnail{

            border: none !important;
        }
        .img-thumbnail, .thumbnail{
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }

    </style>
    <!--sidemenu-->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Kanit');
        @import url(http://fonts.googleapis.com/css?family=Lato);

        .container
        {
            width:800px;
            overflow:hidden;
            display:inline-block;
        }
        .side-bar
        {
            background:#4d4d4d;
            position:fixed;
            height:100%;
            width:200px;
            color:#fff;
            z-index: 1000;
            transition: margin-left 0.5s;

        }

        .side-bar ul
        {
            list-style:none;
            padding:0px;

        }

        .side-bar ul li.menu-head
        {
            font-family: 'Lato', sans-serif;
            padding:20px;
        }


        .side-bar ul li.menu-head a
        {
            color:#fff;
            text-decoration:none;
            height:50px;
        }


        .side-bar ul .menu-head  a
        {
            color:#fff;
            text-decoration:none;
            height:50px;
        }

        .side-bar ul .menu li  a
        {
            color:#fff;
            text-decoration:none;
            display:inline-table;
            width:100%;
            padding-left:20px;
            padding-right:20px;
            padding-top:10px;
            padding-bottom:10px;
            text-align: left;
        }

        .side-bar ul .menu li  a:hover
        {
            border-left:3px solid #ECECEA;
            padding-left:17px;
        }

        .side-bar ul .menu li  a.active
        {
            padding-left:17px;
            background:#343434;
            border-left:3px solid #343434;
        }

        .side-bar ul .menu li  a#active_2.active:before {
            content: "";
            position: fixed;
            width: 0;
            height: 0;
            border-top: 21px solid transparent;
            border-bottom: 21px solid transparent;
            border-left: 21px solid #343434;
            margin-top: -10px;
            margin-left: 162px;
        }

        .side-bar ul .menu li  a#active_3.active:before {
            content: "";
            position: fixed;
            width: 0;
            height: 0;
            border-top: 21px solid transparent;
            border-bottom: 21px solid transparent;
            border-left: 21px solid #343434;
            margin-top: -10px;
            margin-left: 163px;
        }

        .side-bar ul .menu li  a#active_4.active:before {
            content: "";
            position: fixed;
            width: 0;
            height: 0;
            border-top: 21px solid transparent;
            border-bottom: 21px solid transparent;
            border-left: 21px solid #343434;
            margin-top: -10px;
            margin-left: 163px;
        }

        .side-bar ul .menu li  a#active_5.active:before {
            content: "";
            position: fixed;
            width: 0;
            height: 0;
            border-top: 21px solid transparent;
            border-bottom: 21px solid transparent;
            border-left: 21px solid #343434;
            margin-top: -10px;
            margin-left: 165px;
        }

        .side-bar ul .menu li  a#active_6.active:before {
            content: "";
            position: fixed;
            width: 0;
            height: 0;
            border-top: 21px solid transparent;
            border-bottom: 21px solid transparent;
            border-left: 21px solid #343434;
            margin-top: -10px;
            margin-left: 162px;
        }

        .side-bar ul .menu li  a#active_7.active:before {
            content: "";
            position: fixed;
            width: 0;
            height: 0;
            border-top: 21px solid transparent;
            border-bottom: 21px solid transparent;
            border-left: 21px solid #343434;
            margin-top: -10px;
            margin-left: 160px;
        }

        .side-bar ul .menu li  a#active_8.active:before {
            content: "";
            position: fixed;
            width: 0;
            height: 0;
            border-top: 21px solid transparent;
            border-bottom: 21px solid transparent;
            border-left: 21px solid #343434;
            margin-top: -10px;
            margin-left: 161px;
        }
        .content
        {
            padding-left: 200px;
            transition: padding-left 0.5s;
        }

        .active > .side-bar
        {
            margin-left:-150px;
            transition: margin-left 0.5s;
        }

        .active > .content
        {
            padding-left:50px;
            transition: padding-left 0.5s;
        }

        .flex-center{
            display: flex; /* not use in time */
            justify-content: center;

        }
        .topbar{
            background-color: rgba(0, 0, 0,0.1);
        }
        .screen_blur{
            /*position: absolute;*/
            /*top: 0px;*/
            /*left: 0px;*/

            background-color: silver;
            height: 250px;
            width: 100%;
            object-fit: fill;

            -webkit-filter: blur(10px) brightness(1);
            -moz-filter: blur(10px) brightness(1);
            -o-filter: blur(10px) brightness(1);
            -ms-filter: blur(10px) brightness(1);
            opacity: 0.6;
            transform: scale(1.2);
            /*z-index: 2;*/
        }
        .img_blur{

            height: 250px;
            width: 100%;
        }
        .img_topbar{
            height: 250px;
            position: absolute;
            top: 0;
        }
        .section2{

            margin: auto;
            max-width: 800px;
            padding: 20px;
            font-size: 17px;
            background-color: #ffffff;
        }

        .section2 .space{
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .table-title-text{
            font-size: 50px;
        }
        .table-title-text span{
            padding-left: 50px;
        }
        .table_1{
            padding: 25px;
        }
        /*print button*/
        .print_button{
            position: fixed;
            top:400px;
            right: 90px;
            z-index: 99;
        }
        .print_button img{
            width: 100px;
            height: 100px;
        }
        /*table*/
        .table_1 , .table_1 tr:nth-child(n){
            background-color: #f2f2f2;
        }
        .tr_table_1 , .tr_table_2{
            text-align: center;background-color: transparent;color: black;border: none;
        }
        .table_2 {
            background-color: white;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        th {
            border: 1px solid white;
            text-align: center;
            padding: 8px;
            color: white;
            background-color: black;
        }
        td{
            border: 1px solid #8f8f8f;
            text-align: center;
        }
        td:nth-child(1) {
            width: 101px;
            color: #afafaf;
        }
        td:nth-child(2) {
            width: 124px;
        }
        td:nth-child(3) {
            width: 157px;
        }
        td:nth-child(4) {
            width: 158px;
        }
        td:nth-child(5) {
            width: 67px;
        }
        td:nth-child(6) {
            width: 67px;
        }
        td:nth-child(7) {
            width: 67px;
        }

        /*close tv*/
        .close_tv{
            position: absolute;
            top: 9%;
            left: 81%;
            z-index: 2;
        }

        .add_tv{
            position: absolute;
            top: 30%;
            left: 40%;
            z-index: 2;
        }
        .text_ontv{
            position: absolute;
            top: 20%;
            left: 44%;
            z-index: 2;
        }
        .add_another{
            position: absolute;
            top: 22%;
            left: 31%;
            z-index: 2;
            color: #51A9CE;
            font-size: 25px;
        }
        .add_tv_another{
            position: absolute;
            top: 42%;
            left: 37%;
            z-index: 2;
        }
        .thumbnail{
            padding: 0px;
            border: none;
        }


        /*search*/
        .search-form {
            position: relative;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 40px;
            border-radius: 5px;
            border: 2px solid black;

            /*box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);*/
            /*-webkit-transform: translate(-50%, -50%);*/
            /*transform: translate(-50%, -50%);*/
            background: #fff;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        .search-form.focus {
            box-shadow: 0 3px 4px rgba(0, 0, 0, 0.15);
        }

        .search-input {
            position: absolute;
            top: 8px;
            left: 38px;
            font-size: 15px;
            background: none;
            color: #5a6674;
            width: 195px;
            height: 20px;
            border: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
        }
        .search-input::-webkit-search-cancel-button {
            -webkit-appearance: none;
            appearance: none;
        }

        .search-button {
            position: absolute;
            top: 6px;
            left: 15px;
            height: 20px;
            width: 20px;
            padding: 0;
            margin: 0;
            border: none;
            background: none;
            outline: none !important;
            cursor: pointer;
        }
        .search-button svg {
            width: 20px;
            height: 20px;
            fill: #5a6674;
        }

        .search-option {
            position: absolute;
            text-align: right;
            top: 10px;
            right: 15px;
        }
        .search-option div {
            position: relative;
            display: inline-block;
            margin: 0 1px;
            cursor: pointer;
        }
        .search-option div input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.01;
            cursor: pointer;
        }
        .search-option div span {
            position: absolute;
            display: block;
            text-align: center;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            opacity: 0;
            background: #929AA3;
            color: #fff;
            font-size: 9px;
            letter-spacing: 1px;
            line-height: 1;
            text-transform: uppercase;
            padding: 4px 7px;
            border-radius: 12px;
            top: -18px;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        .search-option div span::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            border-top: 4px solid #929AA3;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        .search-option div:hover span {
            opacity: 1;
            top: -21px;
        }
        .search-option div label {
            display: block;
            cursor: pointer;
        }
        .search-option div svg {
            height: 20px;
            width: 20px;
            fill: #5a6674;
            opacity: 0.6;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            pointer-events: none;
        }
        .search-option div:hover svg {
            opacity: 1;
        }
        .search-option div input:checked + label svg {
            fill: #e24040;
            opacity: .9;
        }
        .search-option div input:checked + label span {
            background: #e24040;
        }
        .search-option div input:checked + label span::after {
            border-top-color: #e24040;
        }
        /*hr style*/
        hr{
            border: 1px solid #da7a7c;

        }
        /*round image*/
        .img_zone img {
            border-radius: 50%;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            width: 100px;
            height: 100px;


            border: solid 1px #dddddd;
            padding: 5px;
            background-clip: content-box; /* support: IE9+ */
            background-color: #dddddd;
        }
    </style>
    <!-- dropdown menu-->
    <style>
        .flex-center{
            margin-top: -14px;
        }
        ul{
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            color: black;
        }

        .dropdown.open .option:hover{
            color: white;

        }

        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block }

        /*body { line-height: 1 }*/

        ol, ul { list-style: none }

        blockquote, q { quotes: none }

        blockquote:before, blockquote:after, q:before, q:after {
            content: '';
            content: none
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        select { display: none; }

        .dropdown {
            color: #fff;
            background: #2f66cd;
            background: linear-gradient(90deg,#2f66cd,#4db0db 75%,#5ab6de);
            border: none;
            background-repeat: repeat-x;
            background-color: #2f66cd;

            /*background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0) 100%);*/
            /*background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0) 100%);*/
            /*background-repeat: repeat-x;*/
            /*filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40FFFFFF', endColorstr='#00FFFFFF', GradientType=0);*/
            /*background-color: #f6f6f6;*/
            border-radius: 6px;
            /*border: solid 1px #eee;*/
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.0075);
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            float: left;
            font-size: 14px;
            font-weight: normal;
            height: 42px;
            line-height: 40px;
            outline: none;
            padding-left: 18px;
            padding-right: 30px;
            position: relative;
            text-align: left !important;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            white-space: nowrap;
            width: 100%;
            margin-bottom: 5px;
        }

        .dropdown:focus { background-color: #f1f1f1; }

        .dropdown:hover { background-color: #f3f3f3; }

        .dropdown:active, .dropdown.open {
            background-color: white !important;
            border-color: white;
            box-shadow: 0 1px 4px rgba(255, 255, 255, 0.05) inset;
        }

        .dropdown:after {
            height: 0;
            width: 0;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-top: 4px solid white;
            -webkit-transform: origin(50% 20%);
            -ms-transform: origin(50% 20%);
            transform: origin(50% 20%);
            -webkit-transition: all 0.125s ease-in-out;
            transition: all 0.125s ease-in-out;
            content: '';
            display: block;
            margin-top: -2px;
            pointer-events: none;
            position: absolute;
            right: 10px;
            top: 50%;
        }

        .dropdown.open:after {
            -webkit-transform: rotate(-180deg);
            -ms-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }

        .dropdown.open .list {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            opacity: 1;
            pointer-events: auto;
            width: 100%;
        }

        .dropdown.open .option { cursor: pointer; }

        .dropdown.wide { width: 100%; }

        .dropdown.wide .list {
            left: 0 !important;
            right: 0 !important;
        }

        .dropdown .list {
            box-sizing: border-box;
            -webkit-transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;
            transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;
            -webkit-transform: scale(0.75);
            -ms-transform: scale(0.75);
            transform: scale(0.75);
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.09);
            background-color: #fff;
            border-radius: 6px;
            margin-top: 4px;
            padding: 3px 0;
            opacity: 0;
            overflow: hidden;
            pointer-events: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 999;
        }

        .dropdown .list:hover .option:not(:hover) { background-color: transparent !important; }

        .dropdown .option {
            cursor: default;
            font-weight: 400;
            line-height: 40px;
            outline: none;
            padding-left: 18px;
            padding-right: 29px;
            text-align: left;
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        .dropdown .option:hover, .dropdown .option:focus { background-color: #4d4d4d !important; }

        .dropdown .option.selected { font-weight: 600; }

        .dropdown .option.selected:focus { background: #4d4d4d; }


        .by {
            bottom: 12px;
            color: #aaa;
            font-size: 12px;
            left: 0;
            position: absolute;
            right: 0;
            text-align: center;
        }

        .by a {
            color: #fff;
            text-decoration: none;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        .by a:hover { color: #666; }
        <!--</style>
    {{--bootstrap config--}}
    <style>
        .btn{
            height:42px !important;
        }
        .btn-info{
            background-color: #4EAADD;
        }
    </style>

    {{--coin only--}}
    <style>
        body{
            background-color: #f5f8fd;
        }
        .section3{
            margin: auto;
            max-width: 900px;
            padding: 5px;
            font-size: 17px;
            background-color: #ffffff;
        }
        .section_main{
            margin: auto;
            max-width: 900px;
            max-height: 900px;
            padding: 5px;
            font-size: 17px;
            background-color: #ffffff;
        }
        .main_content{
            display: inline-flex;
        }
        .content_1{
            width: 60%;
            padding: 10px;
            /*background-color: #2ab27b;*/
        }
        .content_2{
            width: 40%;
            padding: 10px;
            /*background-color: #0d3625;*/
        }
        @media screen and (max-width: 768px) {
            .main_content{
                display: inline;
            }
            .content_1{
                width: 100%;
            }
            .content_2,img{
                width: 100%;
            }
        }
    </style>

</head>
<body>

{{--coin--}}

<!--title 1 menu-->
<div class="section_main section3" style="background-color: transparent;font-size: 30px;padding: 15px">

        <div style="color: #f8931f">
            <b>Coin Shop</b>
        </div>


    <button type="button" class="btn btn-default">Default</button>
    <div class="btn-group">
        <button type="button" class="btn btn-info">Apple</button>
        <button type="button" class="btn btn-default">Samsung</button>
        <button type="button" class="btn btn-default">Sony</button>
    </div>
    <button type="button" class="btn btn-default">Default</button>

</div>

<div class="section_main" >
    <div class="main_content">
        <div class="content_1" >Hot promotion
            <img style="padding-bottom: 10px;height: 500px" src="https://emages.eventshigh.com/2017/1/16/img_7faee67d0933d91f2a9f09f3cfbd3942_1484539671575_processed_original.png" alt="" class="img-responsive">
            <button type="button" class="btn btn-default">Default</button>
            <button type="button" class="btn btn-info">Default</button>
        </div>
        <div class="content_2">
            <div >Sale itemp</div>
            <div style="padding-bottom: 10px;">
                <img style="padding-bottom: 10px;height: 224px" src="https://calendar.fiu.edu/wp-content/uploads/2016/02/Badminton.jpg" alt="" class="img-responsive">
                <button type="button" class="btn btn-default">Default</button>
                <button type="button" class="btn btn-info">Default</button>
            </div>
            <div style="padding-bottom: 10px;">
                <img style="padding-bottom: 10px;height: 224px" src="https://calendar.fiu.edu/wp-content/uploads/2016/02/Badminton.jpg" alt="" class="img-responsive">
                <button type="button" class="btn btn-default">Default</button>
                <button type="button" class="btn btn-info">Default</button>
            </div>
        </div>
    </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/app.js') }}"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!--sidemenu-->
<script>
    $('.menu-pic').hover(function(){
        $('.gn-menu-wrapper').toggleClass('gn-open-part');
    });

    $('.gn-menu-wrapper').hover(function(){
        $(this).toggleClass('gn-open-all');
    })

</script>
<!--search-->
<script>
    $('.search-input').focus(function(){
        $(this).parent().addClass('focus');
    }).blur(function(){
        $(this).parent().removeClass('focus');
    })
</script>
<!--menu-->
<script>
    function create_custom_dropdowns() {
        $('select').each(function(i, select) {
            if (!$(this).next().hasClass('dropdown')) {
                $(this).after('<div class="dropdown ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected');
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function(j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
            }
        });
    }

    // Event listeners

    // Open/close
    $(document).on('click', '.dropdown', function(event) {
        $('.dropdown').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });
    // Close when clicking outside
    $(document).on('click', function(event) {
        if ($(event.target).closest('.dropdown').length === 0) {
            $('.dropdown').removeClass('open');
            $('.dropdown .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });
    // Option click
    $(document).on('click', '.dropdown .option', function(event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown').find('.current').text(text);
        $(this).closest('.dropdown').prev('select').val($(this).data('value')).trigger('change');
    });

    // Keyboard events
    $(document).on('keydown', '.dropdown', function(event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
        // Space or Enter
        if (event.keyCode == 32 || event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function() {
        create_custom_dropdowns();
    });
</script>
<!--lightbox2-->
<script src="{{ URL::asset('js/lightbox.js') }}"></script>
<!--image gallery-->
<script src="{{ URL::asset('js/jquery.fancybox.min.js') }}"></script>

{{--sidebar--}}
<script>
    //    $(document).ready(function(){
    //        $(".push_menu").click(function(){
    //            $(".wrapper").toggleClass("active");
    //        });
    //    });
</script>

</html>
