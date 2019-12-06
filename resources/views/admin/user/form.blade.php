<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="first_name" type="text" id="first_name" value="{{ isset($adminuser->first_name) ? $adminuser->first_name : ''}}" >
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" name="last_name" type="text" id="last_name" value="{{ isset($adminuser->last_name) ? $adminuser->last_name : ''}}" >
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($adminuser->email) ? $adminuser->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control" name="password" type="text" id="password" }"    >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
        <label for="confirm_password" class="control-label">{{ 'Confirm Password' }}</label>
        <input class="form-control" name="confirm_password" type="text" id="confirm_password" value="{{ isset($adminuser->confirm_password) ? $adminuser->confirm_password : ''}}" >
        {!! $errors->first('confirm_password', '<p class="help-block">:message</p>') !!}
    </div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">


     <label for="status" class="control-label">Status</label>

                  <div class="checkbox">
                    <strong class="text-success active">
    <input    name="status" type="radio" id="status" value="{{ isset($adminuser->status) ? $adminuser->status : 'Active'}}"     checked>

                     Active
                    </strong>
                  </div>

                  <div class="checkbox">
                    <strong class="text-danger">

    <input   name="status" type="radio" id="status" value="{{ isset($adminuser->status) ? $adminuser->status : 'InActive'}}"     >
                InActive
                    </strong>
                  </div>

                  
           
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


 <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
      <strong>Roles</strong>
                  <select class="form-control" name="roles">
                      @if(isset($adminuser->roles ))
                        @foreach ($adminuser->roles as $value)
                        <option value="{{ $value->name }}">{{ isset($value->name) ? $value->name : 'Select Roles' }}</option>
                        @endforeach
                        @else
                         <option value=" ">{{ 'Select Roles' }}</option>
                        @endif 
                  @foreach ($roles as $role )
                      <option value="{{ $role->name}}">{{ $role->name}}</option>
                  @endforeach
                    
                    
                  </select>
                 {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
                </div>

<div class="form-group">
    <input class="btn-lg btn-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

