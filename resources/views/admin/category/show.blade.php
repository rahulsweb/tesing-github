@extends('theme.layout')
@push('scripts') 

<!-- jQuery 3 -->

<script>
  $(function () {
    $('#example2').DataTable();
   
  });
</script>

@endpush

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1 class="text-center alert alert-success">
       Category  Detail
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

                        <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">

                            <tbody>
                                    <tr>
                                        <th class="list-group-item-info">ID</th><td class="list-group-item">{{ $category->id }}</td>
                                    </tr>
                                    <tr><th class="list-group-item-danger"> Name </th><td class="list-group-item"> {{ $category->name }} </td></tr><tr>
                                      <th class="list-group-item-success"> Parent Category </th><td class="list-group-item"><strong class="text-danger"> {{ $category->parent_id ? $category->parent['name']:'N/A' }}</strong> </td></tr>
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
