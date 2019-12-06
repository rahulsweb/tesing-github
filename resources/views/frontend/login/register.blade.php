@extends('frontend_theme.frontend_layout') 
@push('styles')

<style>
  .header
   {
       font-size: 20px;
       text-align: center !important;
   }
</style>

@endpush
@section('content')
<section id="form">
   <!--form-->
   <div class="container">
       <div class="row">
           <div class="col-sm-4 col-sm-offset-4">
               <div class="login-form">
                   <!--login form-->
                   
                   <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <h2 class="text-success header">Register Your ACCOUNT</h2>
                    </div>
                  
                   <form class="form-horizontal" method="POST" action="{{ url('register') }}">
                    {{ csrf_field() }}







                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                            
                            <input class="form-control" name="first_name"  placeholder="First Name" type="text" id="first_name" value="{{ isset($adminuser->first_name) ? $adminuser->first_name : ''}}" >
                            {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
              
                            <input class="form-control" name="last_name" type="text" placeholder="Last Name" id="last_name" value="{{ isset($adminuser->last_name) ? $adminuser->last_name : ''}}" >
                            {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                        </div>
                        
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                           
                            <input class="form-control" name="email" placeholder="Email-Id" type="text" id="email" value="{{ isset($adminuser->email) ? $adminuser->email : ''}}" >
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                           
                            <input class="form-control" name="password" type="text" id="password" placeholder="Password" value="{{ isset($adminuser->password) ? $adminuser->password : ''}}" >
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
                               
                                <input class="form-control" name="confirm_password" placeholder="Confirm Password" type="text" id="confirm_password" value="{{ isset($adminuser->confirm_password) ? $adminuser->confirm_password : ''}}" >
                                {!! $errors->first('confirm_password', '<p class="help-block">:message</p>') !!}
                            </div>


                            <div class="form-group">
                                    <input class="btn-lg btn-success text-muted" style="background-color:orange;" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                                </div>
                               

            </form>
                 
               </div>
               <!--/login form-->
           </div>
        
          
       </div>
   </div>
</section>
<!--/form-->


@endsection

@push('scripts') 


@endpush