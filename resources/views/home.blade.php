@extends('layouts.default')


@section('style')
    <link rel="stylesheet" href=" {{ asset('css/contests/home.css') }}">
@endsection

@section('content')
    <div class="container">
        <br>
        <div class="header">
            <h1> danh sách cuộc thi </h1>
        </div>
        <br>
        <div class="row">
            @foreach ($contests as $contest)
                <div class="col-md-1"></div>
                <div class="container-ct col-md-5">

                    <div class="container__text">
                        <h1>{{ $contest->name }}</h1>
                        <div class="container__text__timing">
                            <div class="container__text__timing_time">
                                <h2>mã dề thi </h2>
                                <p>{{ $contest->id }}</p>
                            </div>
                            <div class="container__text__timing_time">
                                <h2>ngày thi</h2>
                                <p> {{ $contest->begintime_at }}</p>
                            </div>
                            <div class="container__text__timing_time">
                                <h2>người tạo </h2>
                                <p>{{ $contest->staff->name }}</p>
                            </div>
                        </div>

                        <p>
                            {!! $contest->content !!}
                        </p>
                        <div class="container__text__timing">

                            <div class="container__text__timing_time">
                                <h2>ngày tạo</h2>
                                <p>{{ $contest->created_at }}</p>
                            </div>
                            <div class="container__text__timing_time">
                                <h2>chi nhánh thi</h2>
                                <p>{{ $contest->branch->name }}</p>
                            </div>

                        </div>
                        <a class="btn"> xem các bài thi </a>
                    </div>

                </div>


            @endforeach

        </div>



    </div>




@endsection

@section('js-content')



@endsection
