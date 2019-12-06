@extends('frontend_theme.frontend_layout') 
@push('styles')



@endpush

@section('content')
   <div class="container">
       <div class="row">
       {{ $orders }}

           <div class="col-md-12 ">
               <div class="card">
                   <div class="alert alert-info"><h2 class="text-center text-success"> Order</h2></div>
                   <div class="card-body">
                     
          
                       <br/>
                       <br/>
                     <div class="table-responsive">
                               
                                   <table id="example2" class="table table-bordered table-hover">
                               <thead>
                                   <tr>
                                       <th>Order Id</th><th>Order Product</th><th>Payment Type</th><th>Total</th> <th>Date</th><th>Action</th>
                                   </tr>
                                  
                               </thead>
                               <tbody>
                                    @foreach($orders as $item)
                               
                                    <tr>
                                         <td>{{ $item->id }}</td><td>{{ $item->order_code }}</td><td>{{ $item->orderPayment[0]->payment_type }}</td><td>{{ $item->order_carts  }}</td><td>{{ $item->created_at }}</td> <td>View Detail</td>
                                     </tr>
                                    
                                    @endforeach

                               </tbody>
                           </table>
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
@push('scripts') 

<!-- jQuery 3 -->

<script>
 $(function () {
   $('#example2').DataTable();
  
 });
</script>

@endpush
