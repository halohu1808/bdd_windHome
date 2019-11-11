@extends('layout.home')

{{--@section('sideBar')--}}
{{--    @include('listSite.filterSideBar')--}}
{{--@endsection--}}

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
            </div>


            <div class="row pt-5">
            </div>
            <div class="row pt-5 col-md-12" style="background: white">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">

                    <form method="post" action="{{route('user.updatePassword',$user->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                            <div class="col-sm-9">
                                <input type="password" name="passwordOld" class="form-control"
                                       placeholder="">
                            </div>
                            <label for="inputPassword" class="col-sm-3 col-form-label"></label>

                            <div class="col-sm-9">
                                @error('passwordOld')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                            <div class="col-sm-9">
                                <input type="password" name="passwordNew" class="form-control"
                                       placeholder="">
                            </div>
                            <label for="inputPassword" class="col-sm-3 col-form-label"></label>

                            <div class="col-sm-9">
                                @error('passwordNew')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Nhập lại mật khẩu mới</label>
                            <div class="col-sm-9">
                                <input type="password" name="passwordConfirm" class="form-control"
                                       placeholder="">
                            </div>
                            <label for="inputPassword" class="col-sm-3 col-form-label"></label>

                            <div class="col-sm-9">
                                @error('passwordConfirm')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" type="button" class="btn btn-outline-primary">Đồng ý</button>
                                <button class="btn btn-outline-secondary"
                                        onclick="window.history.go(-1); return false;">Hủy
                                </button>

                            </div>
                        </div>

                    </form>

                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>

    </div>

@endsection
