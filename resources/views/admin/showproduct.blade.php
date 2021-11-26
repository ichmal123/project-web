<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
      <!-- partial:partials/_sidebar.html -->
      	@include('admin.sidebar')
      	<!-- partial -->
      	@include('admin.navbar')
        <!-- partial -->
        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">
          <div class="container" align="center">
            @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                  {{session()->get('message')}}
              </div>
            @endif
            <table>
              <tr style="background-color: grey">
                <td style="padding: 20px">Title</td>
                <td style="padding: 20px">Description</td>
                <td style="padding: 20px">Quantity</td>
                <td style="padding: 20px">Price</td>
                <td style="padding: 20px">Image</td>
                <td style="padding: 20px">Update</td>
                <td style="padding: 20px">Delete</td>
              </tr>
              @foreach($data as $product)
              <tr style="background-color: black;">
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td align="center">{{$product->quantity}}</td>
                <td align="center">{{$product->price}}</td>
                <td align="center">
                  <img height="50" width="50" src="/productimage/{{$product->image}}">
                </td>
                <td><a class="btn btn-primary" href="">Update</a></td>
                <td><a class="btn btn-danger" href="{{url('deleteproduct',$product->id)}}">Delete</a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
          <!-- partial -->
        @include('admin.script')
  </body>
</html>