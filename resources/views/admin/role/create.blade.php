@extends('theme.layout')



@push('styles') 

<style>
.text-large
{
  font-size: 2em;
  text-align:center !important;
}

ul , li
{
  
  color:green;
}



</style>

@endpush 
       
@push('scripts') 
 

@endpush


@section('content')




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <strong class="text-success text-large">
   Create User
     
    </strong>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content ">

        <div class="container">
                <div class="row">
        
        
                    <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New order</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/order') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/order') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.order.form', ['formMode' => 'create'])

                          </form>

                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    
        </section>
    
        </div>
    @endsection
    