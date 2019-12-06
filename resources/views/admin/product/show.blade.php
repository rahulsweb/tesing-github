@extends('theme.layout')

@section('content')

@push('scripts') 

<!-- jQuery 3 -->

<script>
  $(function () {
    $('#example2').DataTable();
   
  });
</script>

@endpush


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 
  <section class="content-header">
      <h1 class="text-center alert alert-success">
     Product Detail
      </h1>
    
    </section>
  <!-- Main content -->
  <section class="content container-fluid">

        <!-- /.content-wrapper -->

       
            <div class="row">
       
    
                <div class="col-md-12 ">
                <div class="card">
                  
                    <div class="card-body ">

                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                     
                        <br/>
                        <br/>

                        <div class="table-responsive box">
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th class="list-group-item-info"><td class="list-group-item">{{ $product->id }}</td>
                                    </tr>
                                    <tr><th class="list-group-item-danger"> Name </th><td class="list-group-item" > {{ $product->name }} </td></tr>
                                    <tr><th class="list-group-item-success"> Rate </th><td class="list-group-item"> {{ $product->rate }} </td></tr>
                                    <tr><th class="list-group-item-warning"> image </th>
                                        @foreach ($product->product_image as $image )
                                        <td > <img src= " {{ asset($image->name) }}" width=50 heigth=50 ></td> 
                                        @endforeach
                                      
                                      
                                    </tr>

                   
                                     @foreach ($product->categories as $products )
                                  @endforeach
                                                                      <tr><th class="list-group-item-info"> Category Name </th><td class="list-group-item"> {{ $products->name }} </td></tr>

                              <tr><th class="list-group-item-warning"> Quantity </th><td class="list-group-item"> {{ $product->product_attribute->quantity }} </td></tr>
                                    <tr><th class="list-group-item-success"> Color </th><td class="list-group-item"> {{ $product->product_attribute->color }} </td></tr>
                                </tbody>
                            </table>
                        </div>
    
               
                                       
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>

@endsection
