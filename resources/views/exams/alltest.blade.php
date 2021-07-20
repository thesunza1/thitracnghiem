@extends('layouts.default')

@section('style')

@endsection


@section('content')
<div class="container">
    <br>
    @foreach ($exams as $exam)
        <h1>Đề thi cho {{$exam->staff->name}}</h1>
        <br>
        <?php
            $order = 0;
            $arr = ['0','A','B','C','D','E','F','G','H','I','J','K','L','M','O'];
        ?>
        @foreach (App\Models\ExamQueRel::where('exam_staff_id', $exam->id)->orderBy('order_question')->orderBy('order_relies')->get() as $data)
            <?php $temp = $data->order_question;?>
            <?php if($order != $temp):$order = $temp;$question_id = $data->question_id ;$j = 1;?>
                <br>
                <h5>Câu {{$order}} : {{$data->question->content}}</h5>
            <?php endif; ?>
            <p style='padding-left :50px'>{{$arr[$j++] .". ". $data->relies->noidung}}</p>
        @endforeach
    @endforeach
</div>
@endsection


@section('js-content')

@endsection
