@extends('theme.layout')



@push('styles') 


@push('scripts') 




@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1 class="text-center alert alert-info">
         order Detail
        </h1>
      
      </section>

  <!-- Main content -->
  <section class="content container-fluid">

        <!-- /.content-wrapper -->

        <div class="box">
            <div class="row">
       
    
                <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <a href="{{ url('/admin/order') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       
                        <br/>
                        <br/>
                        {{ $orders }}
                        <div class="table-responsive">
                                
                            <table id="example2" class="table table-bordered ">
                                <tbody>
                                        <tr>
                                                <th class="list-group-item-info">ID</th><td class="list-group-item">{{ $orders->id }}</td>
                                            </tr>
                                            <tr>
                                                    <th class="list-group-item-info">Order Code</th><td class="list-group-item">{{ $orders->order_code }}</td>
                                                </tr>
                                                <tr>
                                                        <th class="list-group-item-info">Name</th><td class="list-group-item">{{ $orders->users->first_name." ".$orders->users->last_name  }}</td>
                                                    </tr>
                                            <tr><th class="list-group-item-danger">  Name </th><td class="list-group-item">  </td></tr>
    
                                            <tr><th class="list-group-item-success"> Email </th><td class="list-group-item"></td></tr>
                                            <tr><th class="list-group-item-info"> Status </th><td class="list-group-item-danger">  </td></tr>
                                           
                                                
                                      
                                            </td></tr>
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
