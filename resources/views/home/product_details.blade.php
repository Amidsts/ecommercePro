<!DOCTYPE html>
<html>
<head>
    @include('home.head')
    <style>
      .div_centre {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
      }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

  </div>
  <!-- product details starts-->
<section class="shop_section layout_padding">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
            <div class="box">
                <div class="div_centre">
                  <img width="400" src="/productsImages/{{$product->image}}" alt="Logo">
                </div>
                <div class="detail-box">
                  <h6>  {{$product->title}} </h6>
                  <h6> Price <span> ${{$product->price}} </span> </h6>
                </div>
                <div class="detail-box">
                  <h6> Category: {{$product->category}} </h6>
                  <h6> Available Quantity: <span> {{$product->quantity}} </span> </h6>
                </div>
                <div class="detail-box">
                  <p> {{$product->description}} </p>
                </div>
            </div>
          </div> 
      </div>
    </div>
  </section>
  <!--  product details ends -->
  @include('home.footer')

</body>

</html>