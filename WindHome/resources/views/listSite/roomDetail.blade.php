@extends('layout.home')

@section('content')

    <div class="container">
        <div class="row pt-5">
            <div class="col-md-7">


                <img src="https://img.kpopmap.com/2019/10/blackpink-o-lens-cover.jpg" class="img-fluid" alt="Responsive image">
            </div>

            <div class="col-md-5">


                <form class="bg-white p-3">
                    <div>
                        <h2 class="font-weight-bold text-success"> Phong A24</h2>
                        <label> Số 15, TT04, Hàm Nghi, Hà Nội, Việt Nam</label>
                        <hr>
                    </div>
                    <div>
                        <label> pricePerMonth </label><br>
                        <label> area </label><br>
                        <label> minRentTime </label><br>
                        <label> status </label><br>

                        <hr>
                    </div>

                    <div class="row pt-2">
                        <div class="wrapper col-md-4">
                            <i class="fas fa-bath fa-1x"></i>
                            <div class="pl-2"> Có </div> {{--bathRoom--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <div class=""><i class="fas fa-user"></i></div>
                            <div class="pl-2">4</div> {{--guest--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <i class="fas fa-parking"></i>
                            <div class="pl-2">4</div> {{--parking--}}
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="wrapper col-md-4">
                            <i class="fas fa-wifi"></i>
                            <div class="pl-2">3</div> {{--wifi--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <i class="fas fa-utensil-spoon"></i>
                            <div class="pl-2">4</div> {{--cooking--}}
                        </div>


                        <div class="wrapper col-md-4">
                            <i class="fas fa-snowflake"></i>
                            <div class="pl-2">4</div> {{--airCondition--}}
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="wrapper col-md-4">
                            <div class=""><i class="fas fa-user"></i></div>
                            <div class="pl-2">3</div> {{--Số người--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <div class=""><i class="fas fa-star"></i></div>
                            <div class="pl-2">4</div> {{--rating--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <div class=""><i class="fas fa-star"></i></div>
                            <div class="pl-2">4</div> {{--rating--}}
                        </div>
                    </div>
                    <hr>
                    <div class="pt-2">
                        <label>Thời Gian Thuê</label>
                        <div class="input-group input-group-sm mb-3">
                            <input type="number" class="form-control"  aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="pt-2">
                        <button type="button" class="btn btn-success btn-lg btn-block">BOOK EM ĐI ANH</button>
                    </div>

                </form>
            </div>

        </div>

    </div>

@endsection
