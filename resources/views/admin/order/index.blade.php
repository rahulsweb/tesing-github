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
            <strong style="font-size:30px;" class="box-title text-success ">order Managment</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
         
            
                                <a href="{{ url('/admin/order/create') }}" class="btn btn-success btn-md" title="Add New AdminUser">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
  

                                {{--  <form method="GET" action="{{ url('/admin/admin-user') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" order="search">
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
                                        <th>Order Code</th><th>name</th><th>Status</th><th>Qty</th><th>total</th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        
                        
                                        <td> {{ $item->order_code }}</td>
                                        <td> {{ $item->users->first_name." ".$item->users->last_name }}</td>
                                        <td>  {{ $item->orderPayment[0]->status }}</td>
                                        <td>   {{ $item->order_carts[0]->pivot->qty }} </td>
                                        <td> {{ $item->order_carts[0]->pivot->total }}</td>
                                        <td>
                                                <a href="{{ url('/admin/order/' . $item->id) }}" title="View Coupon"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/admin/order/' . $item->id . '/edit') }}" title="Edit Coupon"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    
                                              
                                     
                                            </td>
                                    </tr>
                                    
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    
    
    </section>
    </div>


@endsection

