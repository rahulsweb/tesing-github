@extends('theme.layout')






@push('styles') 
<style>
  
</style>


@endpush 
       


@push('scripts') 


<script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


@endpush




@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                <h1 class="text-center alert alert-info">
               Banner Detail
                </h1>
              
              </section>
      
        <!-- Main content -->
        <section class="content container-fluid">
      
              <!-- /.content-wrapper -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
            
                    <div class="card-body">

                        <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="list-group-item-info">ID</th><td class="list-group-item">{{ $banner->id }}</td>
                                    </tr>
                                    <tr><th class="list-group-item-danger"> Name </th><td class="list-group-item"><strong class="text-success"> {{ $banner->name }} </strong></td></tr><tr><th class="list-group-item-warning"> Image </th><td class="list-group-item"><img src= "{{ asset('/images/'.$banner->image) }}" > </td></tr><tr><th class="list-group-item-success"> Description </th><td class="list-group-item"> {{ $banner->description }} </td></tr>
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
