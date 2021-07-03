@extends('layouts.default')

@section('style')
@endsection

@section('content')
    <div class="container py-3">
        <form action="/contest/update/{{$contest->id}}" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="contest">Tên kì thi</label>
                        <input id="contest" class="form-control border" type="text" name="contest" value="{{$contest->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="begintime_at">Thời gian bắt đầu</label>
                        <input id="begintime_at" class="form-control border" type="datetime-local" name="begintime_at" value="{{date("Y-m-d\TH:i", $contest->begintime_at)}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="test_maker_id">Người ra đề</label>
                        <select name="test_maker_id" id="test_maker_id" class="form-control">
                            @foreach ($staffs as $staff)
                                @if ($contest->testmaker_id == $staff->id)
                                <option value="{{ $staff->id}}" selected>{{$staff->name }}</option>
                                @else
                                <option value="{{ $staff->id}}">{{$staff->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="branch">Chi nhánh</label>
                        <select name="branch" id="branch" class="form-control">
                            @foreach ($branchs as $branch)
                                @if ($contest->branchcontest_id == $branch->id)
                                    <option value="{{$branch->id}}" selected>{{$branch->name }}</option>
                                @else
                                    <option value="{{$branch->id}}">{{$branch->name }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="content">Text</label>
                <textarea name="content" id="content" cols="10" rows="10">{{$contest->content}}</textarea>
            </div>
            <div>
                <button class="btn btn-primary form-control">Thay đổi</button>
            </div>
        </form>
    </div>
@endsection

@section('js-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js" integrity="sha512-laacsEF5jvAJew9boBITeLkwD47dpMnERAtn4WCzWu/Pur9IkF0ZpVTcWRT/FUCaaf7ZwyzMY5c9vCcbAAuAbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        tinymce.init({
            selector: '#content'
        });
    });
</script>
@endsection
