@extends('theme.layout')



@push('styles') 


@push('scripts') 




@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1 class="text-center alert alert-info">
         Role Detail
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

                        <a href="{{ url('/admin/role') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       
                        <br/>
                        <br/>

                        <div class="table-responsive">
                                
                            <table id="example2" class="table table-bordered ">
                                <tbody>
                                    <tr>
                                        <th class="text-danger">ID</th><td>{{ $role->id }}</td>
                                    </tr>
                                    <tr><th class="text-muted"> Title </th><td> <strong class="text-info">{{ $role->name }} </strong></td></tr>
                                    <tr><th class="text-info"> Permissions </th>
                                        
                                    @foreach ($role->permissions as $permission )
                                    <td colspan="2" class="list-group-item" >  <strong class="text-success">{{ $permission->name }} </strong> </td>
                                    @endforeach
                                    <td></td>
                                    </tr>
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
