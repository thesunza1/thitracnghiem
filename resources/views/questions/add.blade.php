@extends('layouts.default')

@section('content')
<!-- Setup question -->
<form action="/question/create" method="post" id="create_form">
    @csrf
    <div class="container">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="topic">Chủ đề</label>
                <select name="topic" id="topic" class="form-control">
                    <option value="1">Toán</option>
                    <option value="2">Hóa</option>
                    <option value="3">Sinh</option>
                    <option value="4">Lý</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="topic">Độ khó</label>
                <select name="level" id="topic" class="form-control">
                    <option value="1">Khó</option>
                    <option value="2">Trung bình</option>
                    <option value="3">Dễ</option>
                    <option value="4">Úi giời ơi</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="quantity">Số lượng câu hỏi</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="0" max="5" placeholder="Số lượng từ 1 - 5">
            </div>
            <div class="form-group col-md-3">
                <label for="quantity">Generate</label>
                <button class="btn btn-info d-block" id="question_generator" style="height:38px;" onclick="event.preventDefault();"><i class="fas fa-plus"></i> Add Question</button>
            </div>
        </div>

    </div>

    <!-- Add question -->
    <div class="container" id="generated_question">
        <div id="order_questions"></div>
    </div>
</form>

<!-- Submit -->
<div class="container mt-3">
    <button class="btn btn-success" id="submit_question">Submit</button>
</div>
@endsection

@section('js-content')
<script>
    $(document).ready(function(){
        var max_questions = 5;
        var questions = 0;
        var i = 1;
        var arr = ['0','A','B','C','D','E','F','G','H','I','J','K','L','M','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        //Set limit Number of questions for Generator
        var min = 1;
        var max = 10;
        $("#quantity").change(function(){
            if($("#quantity").val() < min)
                $("#quantity").val(min);
            else if($("#quantity").val() > max)
                $("#quantity").val(max);
        });

        //Setup questions base on the input of number of questions
        $("#question_generator").click(function(){
            let quantity = parseInt($("#quantity").val());
            if(questions < max_questions && (questions + quantity <= max_questions)){
                questions += quantity;
                for(i; i <= questions; i++){
                    //button for each collapse
                    $("<button></button>")
                    .addClass("btn btn-primary mr-3 btn-question")
                    .attr("data-toggle","collapse")
                    .attr("data-target","#my-collapse-"+i)
                    .attr("aria-expanded","true")
                    .attr("aria-controls","my-collapse")
                    .html("Câu " + i).appendTo("#order_questions");

                    //collapse part
                    let div = $("<div></div>").addClass("collapse p-3 mt-3 container").attr("id","my-collapse-"+i).css("box-shadow","0px 0px 3px grey").css("border-radius","3px");
                    let div2 = $("<div></div>").attr("id","question_"+i);
                    let tit = $("<h3><b>Câu " +i+ "</b></h3>");
                    // let form = $("<form></form>").attr("method","post").attr("action","#").attr("id","form_question_" +i).addClass("row").append('@csrf');
                    let b_div = $("<div></div>").addClass("row").attr({id: "b_div"});
                    let button = $("<div>").addClass("pp").append($("<button></button>").addClass("btn btn-info btn-add").attr({id:'more_answer_'+ i}).html("Thêm đáp án"));
                    let question = $("<div></div>").addClass("form-group col-md-12").append($("<input>").attr("type","text").attr("name","question["+i+ "]").attr("id","question"+i).attr("placeholder","Câu hỏi").addClass("form-control").css("background-color","#cfd4ff8f").css("border-color","#629bd4")).appendTo($(b_div));

                    // generate 4 default question
                    var default_number = 4;
                    for(var j = 1; j <= default_number; j++)
                    {
                        let answer = $("<div></div>").addClass("form-group col-md-5");
                        let input = $("<input/>").attr("type","text").attr("name","answer["+i+"]["+j+"]").addClass("answer_"+i+" form-control answer").attr("id","answer_"+i+"_"+j).attr("placeholder","Đáp án "+ arr[j]).css("background-color","#a58f8f0a").css("border-color","#629bd4");
                        let checkbox = $("<input/>").attr("type","checkbox").attr({name:"iscorrect["+i+"]["+j+"]", value:"true"}).css({width:"20px", height:"20px", margin:"10px"});
                        let label = $("<label/>").attr({for:"iscorrect_"+j}).html("Đúng").addClass("mb-3");
                        $(answer).append(input, checkbox, label).appendTo($(b_div));
                    }

                    $(div).append($(div2).append(tit, b_div, button)).appendTo("#create_form");
                }
            }

            // Add more answer for each question
            $(document).on('click','.btn-add', function(){
                let a = $(this).closest(".collapse").find(".answer");
                let length = a.length + 1;
                let id = $(a).attr("name");
                id = id.substr(0,id.length-2) + length + "]";
                console.log(id);
                let input = $("<input>").attr("type","text").attr("name", id).attr("id",id).attr("placeholder","Đáp án "+arr[length]).addClass("answer_"+length + " form-control answer");
                let b = length - 1;
                let checkbox = $("<input/>").attr("type","checkbox").attr({name:"iscorrect["+i+"]["+length+"]", value:"true"}).css({width:"20px", height:"20px", margin:"10px"});
                let label = $("<label/>").attr({for:"iscorrect_"+j}).html("Đúng").addClass("mb-3");
                let div = $("<div></div>").addClass("form-group col-md-5").append(input, checkbox, label);
                console.log($(this).closest("div").siblings("#b_div").append($(div)));
            });
        });

        //Submit forms of questions
        $("#submit_question").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("form").submit();
        });

        $(document).on('click','.btn-add',function(e){
            e.preventDefault();
        });
        $(document).on('click','.btn-question',function(e){
            e.preventDefault();
        });
    });
</script>
@endsection
