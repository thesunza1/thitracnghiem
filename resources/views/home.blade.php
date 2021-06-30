@extends('layouts.default')

@section('style')
    <style>
        .box-hover:hover{
            cursor: pointer !important;
            box-shadow: 0px 0px 4px rgba(59, 45, 45, 0.377) !important;
            opacity : 0.8 !important;
        }
        .middle {
            border-radius: 4px;
            background-color: #1e63f7;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 16px;
            transition: all 0.5s;
            cursor: pointer;
        }
        .middle span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        .middle span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        .box-hover:hover .middle span {
            padding-right: 25px;
        }

        .box-hover:hover span:after {
            opacity: 1;
            right: 0;
        }
        .box-hover:hover .middle{
            background-color : #00f100;
            border-color : #00f100;
        }
        body{
            background-image : url('https://www.geeklawblog.com/wp-content/uploads/sites/528/2018/12/liprofile-656x369.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
<div class="container" style="background-color: ghostwhite;">
    @section('content')
    <div class="mt-2">
        <div class="container rounded" >
            <div>
                <h2 class="text-center text-white" style="font-weight: 700;">Welcome, {{Auth::user()->name}}</h2>
                <div class="row m-0">
                    <?php for($i=0;$i< 6;$i++): ?>
                        <div class="col-md-3 p-1 rounded">
                            <div class="rounded box-hover" style="background-color: white; box-shadow: 0 0 3px rgba(59, 45, 45, 0.377); position: relative;">
                                <div class="px-3 pt-1">
                                    <h4 class="m-0" style="font-weight:700;">Tên khóa học</h4>
                                    <span style="font-size: 10px;">Ngày bắt đầu : 13/10/2020</span>
                                    <span class="d-block">Thời gian : 60 phút</span>
                                    <span class="d-block">Mã kì thi : F345#</span>
                                    <span class="d-block">
                                    <strong>Ghi chú </strong>
                                    : Một cây làm chẳng lên non, 3 cây chụm lại làm bài dễ hơn</span>
                                </div>
                                <span style="" class="">
                                    <a href="#" class="middle btn btn-success d-block text-decation-none border-top text-center"><span>Đi đến bài thi</span></a>
                                </span>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
@endsection
