@extends('layouts.default')

@section('style')

@endsection


@section('content')
<div class="container">

    <div class="row pt-4">
        @foreach ($exams as $exam)
            <div class="col-md-3 border p-1">
                <h3 class='toggle-detail'>Đề thi cho {{$exam->staff->name}}</h3>
                <a href="/test/{{$exam->id}}" class="btn btn-success">
                    <i class="fas fa-sign-in-alt"></i> Đi đến
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection


@section('js-content')

@endsection
