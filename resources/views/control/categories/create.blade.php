@extends('control.layout._layout')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
        	<i class="fa fa-plus"></i>
    		Create New Category
        </h3>
    </div>
    <div class="panel-body">
    	<form action="{{route('category.store')}}" method="POST">
    		@csrf

    		<div class="form-group">
    			<label>Category Name <span class="required">*</span></label>
    			<input type="text" name="name" value="{{ request()->old('name') }}" class="form-control" placeholder="Category Name">
    			<label class="error">{{ $errors->first('name') }}</label>
    		</div>

    		<div class="form-group">
    			<label>Category Language <span class="required">*</span></label>
    			<select name="language" class="form-control">
    				<option value="en">English</option>
    				<option value="ar">Arabic</option>
    			</select>
    			<label class="error">{{ $errors->first('language') }}</label>

    		</div>

    		<div class="form-group">
    			<button type="submit" class="btn btn-primary">Save</button>
    			<button type="reset" class="btn btn-default">Reset</button>
    		</div>
    	</form>
    </div>
</div>
@endsection