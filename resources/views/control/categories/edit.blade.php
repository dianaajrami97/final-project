@extends('control.layout._layout')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
        	<i class="fa fa-edit"></i>
    		Edit {{ $category['name'] }} Category
        </h3>
    </div>
    <div class="panel-body">
    	<form action="{{route('category.update', ['id' => $category['id']])}}" method="POST">
    		@csrf
            {{ method_field('PUT') }}
    		<div class="form-group">
    			<label>Category Name <span class="required">*</span></label>
    			<input type="text" name="name" value="{{ $category['name'] }}" class="form-control" placeholder="Category Name">
    			<label class="error">{{ $errors->first('name') }}</label>
    		</div>

    		<div class="form-group">
    			<label>Category Language <span class="required">*</span></label>
    			<select name="language" class="form-control">
    				<option value="en" {{ $category['language'] == 'en' ? 'selected' : '' }}>English</option>
    				<option value="ar" {{ $category['language'] == 'ar' ? 'selected' : '' }}>Arabic</option>
    			</select>
    			<label class="error">{{ $errors->first('language') }}</label>

    		</div>

    		<div class="form-group">
    			<button type="submit" class="btn btn-primary">Update</button>
    			<button type="reset" class="btn btn-default">Reset</button>
    		</div>
    	</form>
    </div>
</div>
@endsection