<!DOCTYPE html>
<html>
  <head> 
    @include('admin.head')
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
        <h1>Update  Category</h1>

        <form action="{{url('update_category', $data->id)}}" method="post">
            @csrf

            <input type="text" name="category" value="{{$data->category_name}}">
            <input type="submit" class="btn btn-primary" value="Update Category">
        </form>
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