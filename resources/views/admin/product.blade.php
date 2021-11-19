<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
      .title{
        color: white; 
        padding-top: 25px; 
        font-size: 25px;
      }
      .productTitle{
        padding: 15px
      }
      .teks{
        color: black;
      }
      label{
        display: inline-block;
        width: 200px;
      }
    </style>
  </head>
  <body>
      <!-- partial:partials/_sidebar.html -->
      	@include('admin.sidebar')
      	<!-- partial -->
      	@include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">
            <h1 class="title">Add Product</h1>
            @if(session()->has('message'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                  <STRONG>{{session()->get('message')}}</STRONG>
              </div>
            @endif
            <form action="{{url('uploadProduct')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="productTitle">
              <label>Product Title</label>
              <input class="teks" type="text" name="title" placeholder="Give a Product title" required="">
            </div>
            <div class="productTitle">
              <label>Price</label>
              <input class="teks" type="number" name="price" placeholder="Give a price" required="">
            </div>
            <div class="productTitle">
              <label>Description</label>
              <input class="teks" type="text" name="des" placeholder="Give a description" required="">
            </div>
            <div class="productTitle">
              <label>Quantity</label>
              <input class="teks" type="text" name="quantity" placeholder="Product quantity" required="">
            </div>
            <div class="productTitle">
              <input type="file" name="file">
            </div>
            <div class="productTitle">
              <input class="btn btn-success" type="submit">
            </div>
          </form>
          </div>
        </div>
          <!-- partial -->
        @include('admin.script')
  </body>
</html>