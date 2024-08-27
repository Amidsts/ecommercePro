<!DOCTYPE html>
<html>
  <head> 
    @include('admin.head')
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        .table_deg {
            border: 2px solid greenyellow
        }
        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px
        }
        td {
            border: 1px solid skyblue;
            text-align: center;
            padding: 10px;
            color: white
        }
    </style>
  </head>
  <body>
    <header class="header">   
      @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        @include('admin.sidebar')
      </nav>
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <form action="{{url('product_search')}}" method="GET">
            @csrf
            <input type="search" name="search">
            <input type="submit" value="Search" class="btn btn-secondary">
        </form>

        <div class="div_deg">
            <table class="table_ddeg">
                <tr>
                    <th>Product Title</th>
                    <th>Product Description</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{!!Str::limit($product->description, 5)!!}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <img src="productsImages/{{$product->image}}" alt="Logo" height="120" width="120">
                        </td>
                        <td>
                            <a href="{{url('edit_product', $product->id)}}" class="btn btn-success">Update</a>
                        </td>
                        <td>
                            <a href="{{url('delete_product', $product->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="div_deg">{{$products->onEachSide(1)->links()}}</div>
      </div>
    </div>
    
    <!-- JavaScript files-->
    <script src="{{asset('/adminTemplate/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/adminTemplate/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/adminTemplate/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/adminTemplate/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/adminTemplate/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/adminTemplate/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/adminTemplate/js/charts-home.js')}}"></script>
    <script src="{{asset('/adminTemplate/js/front.js')}}"></script>
  </body>
</html>