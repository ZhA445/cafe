<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .title {
            font-size: 32px;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold
        }

        table {
            width: 50%;
            margin: 40px auto;
        }

        table tr th {
            font-weight: bold;
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
                    <h2 class="title">Users</h2>
                    @if (session('message'))
                        <div class="alert alert-success mt-5">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session('message')}}
                        </div>
                    @endif
                    <div>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->user_type == '1')
                                        <td>Admin</td>
                                    @else
                                        <td>User</td>
                                    @endif
                                    @if ($user->user_type == '0')
                                        <td>
                                            <a href="{{ url("/users/delete/$user->id") }}"
                                                class="btn btn-danger" onclick="return confirm('Are you sure to Delete!')">Delete</a>
                                        </td>
                                    @endif
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
