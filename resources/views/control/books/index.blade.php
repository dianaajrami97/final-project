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
                    <th> Name </th>
                    <th> ISBN </th>
                    <th> Author </th>
                    <th> Publisher </th>                    
                    <th> Publish Year </th>                    
                    <th> Category </th>                    
                    <th> Options </th>                    
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $book['name'] }}</td>
                        <td>{{ $book['isbn'] }}</td>
                        <td>{{ $book['author'] }}</td>
                        <td>{{ $book['publisher'] }}</td>
                        <td>{{ $book['publish_year'] }}</td>
                        <td>{{ $book->category['name'] }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('book.edit', ['id' => $book['id']]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('book.delete', ['id' => $book['id']]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection