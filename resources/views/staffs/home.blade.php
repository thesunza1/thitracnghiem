@extends('layouts.default')

@section('style')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/staffs/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="limiter">
        <br>
        <div class="header-text">
            <h1>nhân viên</h1>
        </div>
        <div class="container-table100">

            <div class="table100 ver2 m-b-110">
                <table id="tablelayout" data-vertable="ver2">
                    <thead>
                        <tr class="row100 head">
                            <th class="column100 column1" data-column="column1">id</th>
                            <th class="column100 column2" data-column="column2">email</th>
                            <th class="column100 column3" data-column="column3">name</th>
                            <th class="column100 column4" data-column="column4">phone number</th>
                            <th class="column100 column5" data-column="column5">address</th>
                            <th class="column100 column6" data-column="column6">branch</th>
                            <th class="column100 column7" data-column="column7">role</th>
                            <th class="column100 column8" data-column="column8">action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr class="row100">
                                <td class="column100 column1" data-column="column1"><b>{{ $staff->id }}</b></td>
                                <td class="column100 column2" data-column="column2"><b>{{ $staff->email }}</b></td>
                                <td class="column100 column3" data-column="column3">{{ $staff->name }}</td>
                                <td class="column100 column4" data-column="column4">{{ $staff->sdt }}</td>
                                <td class="column100 column5" data-column="column5">{{ $staff->address }}</td>
                                <td class="column100 column6" data-column="column6">{{ $staff->branch->name }}</td>
                                <td class="column100 column7" data-column="column7">
                                    @if ($staff->role == 0)
                                        staff
                                    @elseif($staff->role == 1)
                                        issuer
                                    @else
                                        admin
                                    @endif
                                </td>
                                <td class="column100 column8 " data-column="column8">

                                    <button class="btn btn-danger mr-1 " data-toggle='modal' data-target='#dl-modal'
                                        name="id" value='{{ $staff->id }}'>
                                        <i class="fas fa-trash-alt"></i></button>
                                    <button class="btn btn-warning mr-1 " data-toggle="modal" data-target='#if-modal'
                                        name="id" value='{{ $staff->id }}'>
                                        <i class="fas fa-cog"></i></button>
                                </td>
                            </tr>

                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>
        <div id="dl-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading"> delete</h4>
                            <br>
                            <h5 class="ct-dl">you would delete staff it ?</h5>
                        </div>

                        <a href="#" class="btn btn-danger float-right" type="button">delete</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="if-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="if-modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered if-ct-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="if-modal-title">staff information </h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputAddress">name</label>
                                    <input name="name" type="text" class="form-control" id="inputAddress" placeholder="tran manh quynh">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="inputAddress">number phone</label>
                                    <input name="sdt" type="text" class="form-control" id="inputAddress" placeholder="0123645349">
                                </div>
                                <div class="form-group col-md-5">

                                    <label for="inputAddress">address</label>
                                    <input name="address" type="text" class="form-control" id="inputAddress"
                                        placeholder="long phuoc , vinh long">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">branch</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">role</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-21"></div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right mr-5">Sign in</button>


                        </form>
                    </div>
                    <div class="modal-footer">
                        Footer
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection


@section('js-content')

@endsection
