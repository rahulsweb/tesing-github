<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label text-danger">{{ 'name' }}</label>
    <input class="form-control " name="name" type="text" id="name" value="{{ isset($order->name) ? $order->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('') ? 'has-error' : ''}}">



    {!! $errors->first('', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">


   
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
