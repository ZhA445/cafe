<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .title {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
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

        table tr td img {
            width: 100px;
            height: 150px;
            margin: auto;
        }

        .menu-add {
            margin-top: 20px;
            text-align: end;
        }

        .menu-form {
            width: 25%;
            margin: auto;
        }

        .menu-items {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            align-items: center;
        }

        .menu-items label {
            font-size: 18px;
        }

        .menu-items input {
            border-radius: 5px;
            color: #000;
        }

        .img {
            width: 150px;
        }

        .menu-btn {
            text-align: center;
            font-size: 18px;
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

                    <div>
                        <h2 class="title">Add Chef</h2>

                        @if (session('message'))
                            <div class="alert alert-success mt-5">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ url("/chef/edit/$chef->id") }}" class="menu-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="menu-items">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$chef->name}}" placeholder="Name" required>
                            </div>

                            <div class="menu-items">
                                <label for="">Position</label>
                                <input type="text" name="position" value="{{$chef->position}}" placeholder="Position" required>
                            </div>

                            <div class="menu-items">
                                <label for="">Description</label>
                                <input type="text" name="description" value="{{$chef->description}}" placeholder="description">
                            </div>

                            <div class="menu-items">
                                <label for="">Image</label>
                                <img src="/chefsimage/{{$chef->img}}" alt="{{$chef->img}}">
                                <div>
                                    <input type="file" name="img" class="img">
                                </div>
                            </div>

                            <div class="menu-btn">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>
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
