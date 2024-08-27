<!DOCTYPE html>
<html>
  <head> 
    @include('admin.head')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px
        }
        label {
            width: 250px;
            font-size: 15px;
            display: inline-block;
            color: white
        }
        .input_deg {
            padding: 15px
        }
        textarea {
            width: 400px;
            height: 100px
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
       <h1>Update Product</h1>

       <div class="div_deg">
        <form action="{{url('update_product', $product->id)}}" method="post" enctype="multipart/form-data">
             @csrf
            <div class="input_deg">
                <label>Product Title</label>
                <input type="text" name="title" value="{{$product->title}}" required>
            </div>
            <div class="input_deg">
                <label>Description</label>
                <textarea name="description" required>{{$product->description}}</textarea>
            </div>
            <div class="input_deg">
                <label>Price</label>
                <input type="text" name="price" value="{{$product->price}}" required>
            </div>
            <div class="input_deg">
                <label>Quantity</label>
                <input type="number" name="quantity" value="{{$product->quantity}}" required>
            </div>
            <div class="input_deg">
                <label>Product Category</label>
                <select name="category" required>
                    <option value="">Select an Option</option>
                    @foreach($categories as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input_deg">
                <label>Current Image</label>
                <img src="productsImages" alt="Logo" width="150" height="150">
            </div>
            <div class="input_deg">
                <label>New Image</label>
                <input type="file" name="image">
            </div>
            <div class="input_deg">
                <input type="submit" value="Update Product" class="btn btn-success">
            </div>
        </form>
       </div>
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