<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($product->name) ? $product->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
    <label for="rate" class="control-label">{{ 'rate' }}</label>
    <input class="form-control" name="rate" type="text" id="rate" value="{{ isset($product->rate) ? $product->rate : ''}}" >
    {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($product->product_attribute->color) ? $product->product_attribute->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="text" id="quantity" value="{{ isset($product->product_attribute->quantity) ? $product->product_attribute->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image[]" type="file" id="image" multiple=true value="{{ isset($product->product_image->name) ? $product->product_image->name : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    @if(isset($product->product_image))
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">  
        <div class="row">
            		
   @foreach ( $product->product_image as $image )
   <div class="col-md-2" style="margin:20px;">
     
       <a href="{{ url('/image/delete',$image->id) }}">  <button type="button" class="close"  > ×</button>	</a>
   <img src="{{ asset($image->name) }}" width=100 height=50>    
          </div>
   @endforeach
 
</div>
    @endif

</div>
<div class="form-group">
    <label> Category Name</label>

    <select class="form-control" name="category" id="category">
      <option value="{{ isset($product->categories[0]->parent->name) ? $product->categories[0]->parent->id : ''}}">{{ isset($product->categories[0]->parent->name) ? $product->categories[0]->parent->name : 'Select Category'}}</option>
      @foreach ($categories as $item )
      
  @if(!$item->parent)
     <option value="{{ $item->id }}">{{ $item->name }}</option>
     @endif

     @endforeach
    </select>
</div>
<div class="form-group">

        <label> Sub Category Name</label>
        <select class="form-control" name="subcategory" id="subcategory">
          <option value="{{ isset($product->categories[0]->id) ? $product->categories[0]->id : ''}}">{{ isset($product->categories[0]->parent->name) ? $product->categories[0]->name : 'Select Sub Category'}}</option>
           @if(isset($item->parent) && $item->parent)
          @foreach ($categories as $item )
    
         <option value="{{ $item->id }}">{{ $item->name }}</option>
     
    
         @endforeach
             @endif
    </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
