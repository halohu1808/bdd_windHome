<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wind Home</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    {{--    <link rel="stylesheet" href="../css/style.css">--}}
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <!-- Styles -->

</head>
<body>

<div class="container-fluid img-fluid"
     style="background-image: url('http://travelhdwallpapers.com/wp-content/uploads/2014/05/Sydney-Harbour-Bridge-11.jpg');background-repeat: no-repeat; max-width: 100% ; height: 800px ">
    {{--    <div class="container-fluid img-fluid" style="background-image: url('http://travelhdwallpapers.com/wp-content/uploads/2014/05/Sydney-Harbour-Bridge-11.jpg');background-repeat: no-repeat; max-width: 100% ; height: 800px ">--}}
    {{--    <img src="https://wallpaperaccess.com/full/819798.jpg" class="img-fluid" alt="Responsive image">--}}

    <div class="row pt-5 ">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 bg-light border rounded">

            <form class="p-3 rounded" action="{{route('room.searchAdvanceGo')}}" method="post">
                <div class="form-group">
                    <label>Địa điểm</label>
                    <input type="text" class="form-control" name="where" placeholder="">
                    <small class="form-text text-muted">Bạn muốn thuê nhà ở đâu?</small>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Số người</label>
                    <select class="form-control" name="guest">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                {{--                <button type="submit" class="btn btn-outline-secondary">Tìm</button>--}}
                <div>
                    <button class="btn btn-outline-primary" type="submit"> Tìm Kiếm</button>
                    <div style="float: right">
                        <a class="btn btn-outline-secondary" href="{{route("room.list")}}"> Quay Lại</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</body>
</html>
