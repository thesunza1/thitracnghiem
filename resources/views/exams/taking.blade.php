@extends('layouts.default')

@section('style')
    <style>
        .answer-field:hover{
            background-color: rgb(91, 255, 132);
        }
    </style>
@endsection

@section('content')
<div class="container">
    <!-- question tracker and timer -->
    <div class="col-md-3 border border-dark fixed-top ml-5" style="margin-top:85px;">
        <h4 class="py-2">Thời gian : <span id="timer"></span></h4>
        <div class="row p-1">
            <?php for($i = 1; $i <= $exam->questionnum; $i++): ?>
                <span class="col-md-1 p-1 border border-dark"><a href="#question_<?php echo $i ?>"><?php echo $i ?></a></span>
            <?php endfor;?>
        </div>
    </div>
    <!-- questions -->
    <div class="offset-md-4 col-md-8">
        <div class="bg-question bd p-2">
            <?php
                $order = 0;
                $arr = ['0','A','B','C','D','E','F','G','H','I','J','K','L','M','O'];
                $questions = App\Models\ExamQueRel::where('exam_staff_id', $exam_staff[0]->id)->get();
            ?>
            @foreach ($questions as $question)
                <?php $temp = $question->order_question;?>
                <div class="question_{{$question->order_question}}">
                    <?php if($order != $temp):$order = $temp;$question_id = $question->question_id ;$j = 1;?>
                        <h3 id="question_{{$question->order_question}}">Câu {{$question->order_question}}</h3>
                        <div class="question border border-dark p-2 bg-white mb-3">{{$question->question->content}}</div>
                    <?php endif; ?>
                    <div class="answer-field" >
                        <span class="answer border p-2 mb-1" style="display:flex;align-items: center">
                            <input type="radio" name="answer[{{$temp}}]" class="mr-1" id="{{$question->relies_id}}">
                            <label for="{{$question->relies_id}}" class="m-0">{{$arr[$j++] . ". " .$question->relies->noidung}}</label>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js-content')
<script>
    $(document).ready(function(){
        $(".answer-field").click(function(){
            let name = $(this).find('input').attr('name');
            $('input[name="'+name+'"]').attr("checked",false);
            $(this).find('input').attr("checked",true);
        });

        // timer
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        //time
        var time = 60*10;
        // $("#timer").html("10:00");
        display = document.querySelector('#timer');
        console.log(display);
        startTimer(time, display);

    });
</script>
@endsection
