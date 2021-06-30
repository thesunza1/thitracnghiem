@extends('layouts.default')

@section('content')
<div class="container">
    <div>
        <h3 class="text-center">Danh sách câu hỏi</h3>
    </div>
        <a href="/question/add" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Add Question</a>
        <div>
            <table class="table table-striped table-bordered table-hover" id="question_list">
                <thead class="">
                    <tr>
                        <th>id</th>
                        <th>Nội dung</th>
                        <th>Mức độ</th>
                        <th>Chủ đề</th>
                        <th>Người tạo</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->content}}</td>
                        <td>{{$question->level->difficult}}</td>
                        <td>{{$question->theme_id}}</td>
                        <td>{{$question->staffcreated_id}}</td>
                        <td>{{$question->created_at}}</td>
                        <td class="d-flex">
                            <a href="/question/delete/{{$question->id}}"
                                class="btn btn-danger mr-1 delete" id="{{$question->id}}">
                                <i class="fas fa-trash-alt"></i></a>
                            <a href="/question/detail/{{$question->id}}"
                                class="btn btn-info mr-1 detail" id="{{$question->id}}">
                                <i class="fas fa-info-circle"></i></a>
                            <a href="/question/edit/{{$question->id}}"
                                class="btn btn-warning mr-1 edit" target="_blank" id="{{$question->id}}">
                                <i class="fas fa-cog"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div id="question_delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <div id="question_detail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <div>

    </div>
</div>
@endsection

@section('js-content')

<script>
    $(document).ready(function(){
        $("#question_list").DataTable();

        //delete button interaction
        $(".delete").click(function(e){
            e.preventDefault();
            let id = $(this).attr("id");
            let form = $("<form></form>").attr({action: "/question/delete/"+ id, method: "POST"});
            let content = $(form).append($("<a/>").attr({href: "/question/delete/"+ id}).addClass("btn btn-danger modal-delete").html('Xóa'));
            $("#question_delete").find(".modal-body").append($("<p>Bạn có chắc muốn xoá câu hỏi này ?</p>"), content);
            $("#question_delete").modal("show");
        });
        $(document).on('click','.modal-delete', function(e){
            e.preventDefault();
            $(this).closest('form').submit();
        });
        $("#question_delete").on('hide.bs.modal', function (){
            $("#question_delete").find(".modal-body").html('');
        });

        //info button interaction
        $(".detail").click(function(e){
            e.preventDefault();
            let id = $(this).attr("id");
            // console.log(id);
            $.ajax({
                method: "GET",
                url: "/question/detail/"+id,
                dataType: 'json',
                success: function(msg){
                    let arr = [];
                    for(var j in msg){
                        arr.push(msg[j]);
                    }
                    console.log(arr);
                    let div = $("<div></div>").append(
                        $("<lable></lable>").html('Id'),
                        $("<div></div>").html(arr[0]).addClass('border border-dark rounded form-control'),
                        $("<lable></lable>").html('Content'),
                        $("<div></div>").html(arr[1]).addClass('border border-dark rounded form-control'),
                        $("<lable></lable>").html('Mức độ'),
                        $("<div></div>").html(arr[2]).addClass('border border-dark rounded form-control'),
                        $("<lable></lable>").html('Chủ đề'),
                        $("<div></div>").html(arr[3]).addClass('border border-dark rounded form-control'),
                        $("<lable></lable>").html('Người tạo'),
                        $("<div></div>").html(arr[4]).addClass('border border-dark rounded form-control'),
                        $("<lable></lable>").html('Ngày tạo'),
                        $("<div></div>").html(arr[5]).addClass('border border-dark rounded form-control'),
                    );
                    $("#question_detail").find('.modal-body').append($(div));
                    $("#question_detail").modal('show');
                }
            });
        });
        $("#question_detail").on('hide.bs.modal', function (){
            $("#question_detail").find(".modal-body").html('');
        });

        //edit button interaction
        // $(".edit").click(function (e){
        //     e.preventDefault();
        //     let id = $(this).attr("id");
        //     $.ajax({
        //         method: "GET",
        //         url: "/question/detail/"+id,
        //         dataType: 'json',
        //         success: function(msg){
        //             let arr = [];
        //             for(var j in msg){
        //                 arr.push(msg[j]);
        //             }
        //             console.log(arr);
        //         }
        //     })
        // });
    });
</script>
@endsection
