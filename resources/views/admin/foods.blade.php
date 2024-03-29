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

        .menu-btn {
            text-align: center;
            font-size: 18px;
        }

        .category {
            color: #000;
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
                        <h2 class="title">Products</h2>

                        @if (session('message'))
                            <div class="alert alert-success mt-5">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ url('/foods/add') }}" class="menu-form" method="POST">
                            @csrf

                            <div class="menu-items">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Name" required>
                            </div>

                            <div class="menu-items">
                                <label for="">Description</label>
                                <input type="text" name="description" placeholder="description">
                            </div>

                            <div class="menu-items">
                                <label for="">Price</label>
                                <input type="number" name="price" placeholder="Price" required step="0.01">
                            </div>

                            <div class="menu-items">
                                <label for="">Discount</label>
                                <input type="number" name="dis_price" placeholder="Discount Price" step="0.01">
                            </div>

                            <div class="menu-items">
                                <label for="">Category</label>
                                <select name="category" required class="category">
                                    <option value="" selected>Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="menu-items">
                                <label for="">Suggestion</label>
                                <input type="text" name="suggestion" placeholder="Eg. Recommend">
                            </div>

                            <div class="menu-btn">
                                <input type="submit" value="Submit" class="btn btn-primary">
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
