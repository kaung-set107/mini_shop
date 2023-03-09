@extends('backend.layout.master') @section('content')
@section('item-active','active')
<a href="{{ route('items.create') }}">Item List</a>
<a href="{{ route('items.create') }}" class="btn btn-sm add rounded item-btn mt-3">+&nbsp;Add Items</a>
<div class="container">
    <table class="table table-border">
        <thead>
            <tr>
                <th>Action</th>
                <th>No</th>
                <th>Item</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Owner</th>
                <th>Public</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($item as $i)
             
            <tr>
                <td>
                    <a href="{{ route('items.edit',$i->id) }}" class="badge badge-success"><i
                            class="bi bi-pencil"></i></a>



                    <form action="{{ route('items.destroy',$i->id) }}" method="get" id="delete" class="d-inline">
                        @csrf @method('DELETE')

                        <button type="submit" onclick="return confirm('Do you want to delete this Category?')"
                            class="badge badge-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                </td>

                <td>
                    
                    {{ $i->id }}
                     </td>
                <td>{{ $i->name }}</td>
                <td>{{ $i->category->name}}</td>
                <td>{{ $i->description }}</td>
                <td>{{ $i->price }}</td>
                <td>{{ $i->ownername }}</td>
                <td>
                    @if($i->status == 'public')
                    <label class="switch">
                        <input type="checkbox" checked />
                        <span class="slider round"></span>
                    </label>
                    @else

                    <label class="switch">
                        <input type="checkbox" />
                        <span class="slider round"></span>
                    </label>
                    @endif
                </td>
            </tr>
            
            @endforeach
            
        </tbody>
    </table>
</div>
<div class="mt-3">
    {{ $item->links() }}
</div>
@endsection