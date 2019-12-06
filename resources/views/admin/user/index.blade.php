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
 
  <!-- Main content -->
  <section class="content ">

 
                <div class="row">
          
        
                    <div class="col-md-12 ">
   
   
   <div class="box">
            <div class="box-header">
            <strong style="font-size:30px;" class="box-title text-success ">User Managment</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
         
            
                                <a href="{{ url('/admin/user/create') }}" class="btn btn-success btn-md" title="Add New AdminUser">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
  

                                {{--  <form method="GET" action="{{ url('/admin/user') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                  
                                    </div>
                                          <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                </form>  --}}
                  

                              <br>
                              <br>
                           
@if ($message = Session::get('flash_message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong class="text-center">{{ $message }}</strong>
</div>
@endif
                                <div class="table-responsive">
                                
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="alert alert-info">
                                                <th>#</th><th> Name</th><th>Email</th><th>Roles</th><th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($adminuser as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong class="text-success">{{ ucfirst($item->first_name)." ".ucfirst($item->last_name) }}</strong></td><td><strong class="text-info">{{ $item->email }}</strong></td>
                                                <td>
                                             
                                                @foreach ($item->getRoleNames() as $role  )
                                                   @if(!empty($role))  
                                                     <a href="{{ url('/admin/user/' . $item->id) }}" title="View AdminUser"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"> {{$role}}</i></button></a>
                                                 @else
                                               <strong class="text-danger">Role Not Define </strong>
                                                @endif
                                                @endforeach
                                               
                                               
                                               
                                                </td>
                                      
    

                                               @role('admin')
                                                <td>
                                                   
                                                    <a href="{{ url('/admin/user/' . $item->id) }}" title="View AdminUser"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                    <a href="{{ url('/admin/user/' . $item->id . '/edit') }}" title="Edit AdminUser"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                             @can('user-edit')
                                                    <form method="POST" action="{{ url('/admin/user' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete AdminUser" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                </td>
                                               @endcan
                                                @endrole
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> {!! $adminuser->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                 </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->









    
@endsection
