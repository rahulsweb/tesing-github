@extends('theme.layout')



@push('styles') 


@push('scripts') 




@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="text-center alert alert-info">
     Coupon Detail
    </h1>
  
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

        <!-- /.content-wrapper -->

        <div class="container">
            <div class="row">
       
    
                <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/coupon') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                     
                        <br/>
                        <br/>

                        <div class="table-responsive">
                                
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th class="list-group-item-info">ID</th><td class="list-group-item">{{ $coupon->id }}</td>
                                    </tr>
                                    <tr><th class="list-group-item-danger"> Title </th><td class="list-group-item"> {{ $coupon->title }} </td></tr>
                                    <tr><th class="list-group-item-warning"> Code </th><td class="list-group-item"> {{ $coupon->code }} </td></tr>
                                    <tr><th class="list-group-item-success"> Type </th><td class="list-group-item"> {{ $coupon->type }} </td></tr>
                                    <tr><th class="list-group-item-info"> Discount </th><td class="list-group-item"> {{ $coupon->discount }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>

@endsection
