@extends('layouts.default')

@section('style')

@endsection

@section('content')
<div class="container">
    <h2 class="text-center my-3">Tạo kì thi</h2>
    <div class="d-flex">
        <div class="col-md-3 p-0 mb-5">
        <a href="{{route('contests')}}" class="btn btn-success form-control">Danh sách kì thi</a></div>
    </div>
    <form action="/contest/create" method="post" id="create_form">
        <div class="row">
            @csrf
            <div class="form-group col-md-4">
                <label for="contest">Kì thi</label>
                <input type="text" name="contest" id="contest" class="form-control border" placeholder="Tên kì thi..." >
            </div>
            <div class="form-group col-md-4">
                <label for="shuffle_question">Chi nhánh thi</label>
                <select name="branch" id="branch" class="form-control">
                    @foreach ($branchs as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="begin_time">Thời gian bắt đầu</label>
                <input type="datetime-local" name="begin_time" id="begin_time" class="form-control border">
            </div>
            <div class="form-group col-md-12">
                <label for="content">Thời gian bắt đầu</label>
                <textarea name="content" id="content" cols="10" rows="10" class="form-control"></textarea>
            </div>
        </div>
    </form>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-2 my-4">
            <button class="btn btn-primary form-control" id="contest_create">Tạo</button>
        </div>
    </div>
</div>
@endsection

@section('js-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js" integrity="sha512-laacsEF5jvAJew9boBITeLkwD47dpMnERAtn4WCzWu/Pur9IkF0ZpVTcWRT/FUCaaf7ZwyzMY5c9vCcbAAuAbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            //set min of begin_date as today
            function set_today_as_min(){
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                var h = today.getHours();
                var m = today.getMinutes();
                if(dd<10){
                        dd='0'+dd
                    }
                    if(mm<10){
                        mm='0'+mm
                    }

                today = yyyy+'-'+mm+'-'+dd+'T00:00';
                $("#begin_time").attr("min", today);
                console.log(today);
            }
            set_today_as_min();

            $("#contest_create").click(function(){
                $("#create_form").submit();
            });

            tinymce.init({
                selector: '#content'
            });
        });
    </script>
@endsection
