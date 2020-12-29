@extends('control.layout._layout')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
        	<i class="fa fa-list"></i>
    		All Categoreis
        </h3>
    </div>
    <div class="panel-body">
    	<table class="table table-bordered">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Category Name </th>
                    <th> Language </th>
                    <th> Options </th>                    
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['language'] }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('category.edit', ['id' => $category['id']]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('category.delete', ['id' => $category['id']]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection