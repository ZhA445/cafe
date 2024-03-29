<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .title {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .menu-div {
            width: 90%;
            margin: auto;
        }

        .menu-table {
            width: 100%;
        }

        table,
        table tr th,
        table tr td {
            border: 1px solid #fff;
            padding: 10px 15px;
            text-align: center;
        }

        .menu-add {
            margin-top: 20px;
            text-align: end;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h2 class="title">Menu</h2>

                    @if (session('message'))
                        <div class="alert alert-success mt-5">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="menu-div">
                        <table class="menu-table">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Dis Price</th>
                                <th>Category</th>
                                <th>Suggestion</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($breakfasts as $food)
                                <tr>
                                    <td>{{ $food->name }}</td>
                                    <td>{{ $food->description }}</td>
                                    <td>${{ $food->price }}</td>
                                    @if (!$food->discount_price)
                                        <td>-</td>
                                    @else
                                        <td>${{ $food->discount_price }}</td>
                                    @endif
                                    <td>{{ $food->category }}</td>
                                    @if (!$food->suggestion)
                                        <td>-</td>
                                    @else
                                        <td>{{ $food->suggestion }}</td>
                                    @endif

                                    <td>
                                        <a href="{{url("/food/edit/$food->id")}}" class="btn btn-warning">Edit</a>
                                        <a href="{{ url("/foods/delete/$food->id") }}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            @foreach ($coffees as $food)
                                <tr>
                                    <td>{{ $food->name }}</td>
                                    <td>{{ $food->description }}</td>
                                    <td>${{ $food->price }}</td>
                                    @if (!$food->discount_price)
                                        <td>-</td>
                                    @else
                                        <td>${{ $food->discount_price }}</td>
                                    @endif
                                    <td>{{ $food->category }}</td>
                                    @if (!$food->suggestion)
                                        <td>-</td>
                                    @else
                                        <td>{{ $food->suggestion }}</td>
                                    @endif

                                    <td>
                                        <a href="{{url("/food/edit/$food->id")}}" class="btn btn-warning">Edit</a>
                                        <a href="{{ url("/foods/delete/$food->id") }}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <div class="menu-add">
                            <a href="{{ url('/foods/add') }}" class="btn btn-secondary">Add Food</a>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
