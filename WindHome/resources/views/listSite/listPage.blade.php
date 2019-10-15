@extends('layout.home')

@section('sideBar')
    @include('listSite.filterSideBar')
@endsection
@section('content')

    <!-- Page Content  -->
    <div id="content">
        <div class="row">
            <div class="col-md-4">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left"></i>
                    <span>Lọc</span>
                </button>
            </div>
        </div>

        <div class="card-deck pt-5 row">

            {{--            bat dau FOR--}}
            <div class="card ">
                <img class="card-img-top"
                     src="{{asset('storage/img/home/a4.jpg')}}"
                     alt="Card image cap">
                <div class="card-body">
                    <a href="#"><h5 class="card-title">Phòng Chử Đồng Tử</h5></a>
                    <p class="blockquote-footer">Còn Phòng </p>

                    <div class="row">
                        <div class="wrapper col-md-6">
                            <div class=""><i class="fas fa-user"></i></div>
                            <div class="pl-2">3</div> {{--Số người--}}
                        </div>
                        <div class="wrapper col-md-6">
                            <div class=""><i class="fas fa-star"></i></div>
                            <div class="pl-2">4</div> {{--rating--}}
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <a href="#" class="btn btn-outline-primary btn-sm">Chi Tiết</a>
                    <label class="float-right mt-1 font-weight-bold text-success"> 10000 </label>
                </div>
            </div>

            {{--            ket thuc FOR--}}
            <div class="card">
                <img class="card-img-top"
                     src="{{asset('storage/img/home/a3.jpg')}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Phòng Tiên Dung</h5>
                    <p class="blockquote-footer"> Cùng phòng Chử Đồng Tử</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-outline-primary">Chi Tiết</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top"
                     src="{{asset('storage/img/home/a2.jpg')}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Phòng Hồng Vân</h5>
                    <p class="blockquote-footer">Vợ hai của Chử Đồng Tử</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-outline-primary">Chi Tiết</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top"
                     src="{{ asset('storage/img/home/a4.jpg') }}"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Phòng Hùng Vương</h5>
                    <p class="blockquote-footer">To gấp chục lần 3 phòng trên công lại</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-outline-primary">Chi Tiết</a>
                </div>
            </div>
        </div>
        <div class="card-deck pt-5 row">

            {{--            bat dau FOR--}}
            <div class="card ">
                <img class="card-img-top"
                     src="{{asset('storage/img/home/a4.jpg')}}"
                     alt="Card image cap">
                <div class="card-body">
                    <a href="#"><h5 class="card-title">Phòng Chử Đồng Tử</h5></a>
                    <p class="blockquote-footer">Sát bãi cát Sông Hồng </p>
                    <div class="row">
                        <div class="wrapper col-md-5">
                            <div class=""><i class="fas fa-male"></i></div>
                            <div class="pl-2">3</div> {{--Số người--}}
                        </div>
                        <div class="col-md-7">
                            <div class="pl-2 float-right">Còn phòng</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <a href="#" class="btn btn-outline-primary btn-sm">Chi Tiết</a>
                    <label class="float-right mt-1 font-weight-bold text-success"> 10000 </label>
                </div>
            </div>

            {{--            ket thuc FOR--}}
            <div class="card">
                <img class="card-img-top"
                     src="{{asset('storage/img/home/a3.jpg')}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Phòng Tiên Dung</h5>
                    <p class="blockquote-footer"> Cùng phòng Chử Đồng Tử</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-outline-primary">Chi Tiết</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top"
                     src="{{asset('storage/img/home/a2.jpg')}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Phòng Hồng Vân</h5>
                    <p class="blockquote-footer">Vợ hai của Chử Đồng Tử</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-outline-primary">Chi Tiết</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top"
                     src="{{ asset('storage/img/home/a4.jpg') }}"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Phòng Hùng Vương</h5>
                    <p class="blockquote-footer">To gấp chục lần 3 phòng trên công lại</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-outline-primary">Chi Tiết</a>
                </div>
            </div>
        </div>

    </div>





@endsection
