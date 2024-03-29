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
                    <h2 class="title">Reservations</h2>

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
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Guests</th>
                                <th>Message</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                    <td>{{ $reservation->email }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
                                    <td>{{ $reservation->no_people }}</td>
                                    <td>{{ $reservation->comment }}</td>
                                    <td>
                                        <a href="{{ url("/reservations/delete/$reservation->id") }}"
                                            onclick="return confirm('Are you sure to Delete?')"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        @if ($reservation->reservation == false)
                                            <a href="{{ url("/reservations/confirm/$reservation->id") }}"
                                                class="btn btn-success">Confirm</a>
                                        @else
                                            <span>Confirmed</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </table>

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
