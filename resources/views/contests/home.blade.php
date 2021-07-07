@extends('layouts.default')

@section('style')

@endsection

@section('content')
<div class="">
    <div>
        <h3 class="text-center">Danh sách kì thi</h3>
    </div>
    <a href="{{route('contest.add')}}" class="btn btn-success mb-3 offset-md-2"><i class="fas fa-plus"></i> Add Contest</a>
    {{-- <div>
        <table class="table" id="contest_list">
            <thead class="">
                <tr>
                    <th>id</th>
                    <th>Tên kì thi</th>
                    <th>Người ra đề</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Chi nhánh thi</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($contests as $contest)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$contest->name}}</td>
                    <td>{{$contest->testmaker_id}}</td>
                    <td>{{$contest->begintime_at}}</td>
                    <td>{{$contest->branchcontest_id}}</td>
                    <td>{{$contest->created_at}}</td>
                    <td class="d-flex">
                    <a href="#" class="btn btn-danger mr-1"><i class="fas fa-trash-alt"></i></a>
                    <a href="#" class="btn btn-info mr-1"><i class="fas fa-info-circle"></i></a>
                    <a href="#" class="btn btn-warning mr-1"><i class="fas fa-cog"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    <div class="limiter">
		<div class="container-table100 bg-white">
			<div class="table100 ver2 m-b-110 container">
                <table data-vertable="ver2" id="contest_list">
                    <thead>
                        <tr class="row100 head">
                            <th class="column100 column1 pl-4" data-column="column1">Id</th>
                            <th class="column100 column2 pl-4" data-column="column2">Tên kì thi</th>
                            <th class="column100 column3 pl-4" data-column="column3">Người ra đề</th>
                            <th class="column100 column4 pl-4" data-column="column4">Thời gian bắt đầu</th>
                            <th class="column100 column5 pl-4" data-column="column5">Chi nhánh thi</th>
                            <th class="column100 column6 pl-4" data-column="column6">Ngày tạo</th>
                            <th class="column100 column7 pl-4" data-column="column7">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($contests as $contest)
                            <tr class="row100">
                                <td class="column100 column1" data-column="column1">{{$i++}}</td>
                                <td class="column100 column2" data-column="column2">{{$contest->name}}</td>
                                <td class="column100 column3" data-column="column3">{{$contest->staff->name}}</td>
                                <td class="column100 column4" data-column="column4">{{date('d-m-Y H:i:s',$contest->begintime_at)}}</td>
                                <td class="column100 column5" data-column="column5">{{$contest->branch->name}}</td>
                                <td class="column100 column6" data-column="column6">{{$contest->created_at}}</td>
                                <td class="column100 column7 px-2" data-column="column7">
                                    <div class="d-flex">
                                        <a href="/contest/delete/{{$contest->id}}" class="btn btn-danger mr-1 btn-delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="/contest/detail/{{$contest->id}}" class="btn btn-info mr-1"><i class="fas fa-info-circle"></i></a>
                                        <a href="/contest/edit/{{$contest->id}}" class="btn btn-warning mr-1"><i class="fas fa-cog"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
			</div>
		</div>
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Xác nhận xóa !!!</h3>
                        <p>Bạn có chắc muốn xóa kì thi này ?</p>
                        <form action="" method="post">
                            @csrf
                            <button class="btn btn-danger form-control confirm-delete">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection

@section('js-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $("#contest_list").DataTable();

        $(".btn-delete").click(function(e){
            e.preventDefault();
            // $(this).find("#delete-modal").modal("show");
            let url = $(this).attr("href");
            $("#delete-modal").find("form").attr("action", url);
            $("#delete-modal").modal("show");
        });

        $(".confirm-delete").click(function(){
            $(this).parents("form").submit();
        });
    });
</script>
@endsection
