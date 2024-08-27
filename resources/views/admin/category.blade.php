<!DOCTYPE html>
<html>
  <head> 
    @include('admin.head')
    <style type="text/css">
      .table_deg {
        text-align: center;
        margin: auto;
        margin-top: 30px;
        border: 2px solid green
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
        <h1>Add Category</h1>
        <div>
            <form action="{{url('add_category')}}" method="post">
                @csrf
    
                <div>
                    <input type="text" name="category">
                    <input class="btn btn-primary" type="submit" value="Add Aategory">
                </div>
            </form>
        </div>
        <div class="table_deg">
          <table>
            <tr>
              <th>Category Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($datas as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td>
                  <a href="{{url('edit_category', $data->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                  <a href="{{url('delete_category', $data->id)}}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <div>
            
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