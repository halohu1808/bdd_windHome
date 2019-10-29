@extends('layout.home')

@section('sideBar')
    @include('listSite.filterSideBar')
@endsection

@section('content')

    <div class="container" xmlns="http://www.w3.org/1999/html">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row pt-5">

            <div class="col-md-0">

            </div>



            <div class="col-md-10">

                <form method="post" action="{{route('user.updatePassword',$user->id)}}">
                    @csrf

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                        <div class="col-sm-9">
                            <input type="password" name="passwordOld" class="form-control" id="inputPassword"
                                   placeholder="Old Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                        <div class="col-sm-9">
                            <input type="password" name="passwordNew" class="form-control" id="inputPassword"
                                   placeholder="New password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Nhập lại mật khẩu mới</label>
                        <div class="col-sm-9">
                            <input type="password" name="passwordConfirm" class="form-control" id="inputPassword"
                                   placeholder="Confirm password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" type="button" class="btn btn-success">Đồng ý</button>
                            <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Hủy</button>

                        </div>
                    </div>

                </form>


            </div>

        </div>

    </div>

@endsection
