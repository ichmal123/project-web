<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                  {{session()->get('message')}}
              </div>
            @endif
            <form action="{{url('updateproduct', $data->id)}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="productTitle">
              <label>Product Title</label>
              <input class="teks" type="text" name="title" value="{{$data->title}}" required="">
            </div>
            <div class="productTitle">
              <label>Price</label>
              <input class="teks" type="number" name="price" value="{{$data->price}}" required="">
            </div>
            <div class="productTitle">
              <label>Description</label>
              <input class="teks" type="text" name="des" value="{{$data->description}}" required="">
            </div>
            <div class="productTitle">
              <label>Quantity</label>
              <input class="teks" type="text" name="quantity" value="{{$data->quantity}}" required="">
            </div>
            <div class="productTitle">
              <label>Old Image</label>
              <img height="75" width="75" src="/productimage/{{$data->image}}">
            </div>
            <div class="productTitle">
              <label>Change Image</label>
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