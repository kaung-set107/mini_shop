@extends('backend.layout.master') @section('content')
@section('cat-active','active')
<a href="{{ route('category.create') }}">Categories</a>
<a
    href="{{ route('category.create') }}"
    class="btn btn-sm add rounded item-btn"
    >+&nbsp;Add Categories</a
>
<div class="container">
    <table class="table table-border">
        <thead>
            <tr>
                <th>Action</th>
                <th>No</th>
                <th>Category</th>
                <th>Public</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $c)
            <tr>
                <td><a
                href="{{ route('category.edit',$c->id) }}"
                class="badge badge-success"
                ><i class="bi bi-pencil"></i
                    ></a
            >

            

            <form
                action="{{ route('category.destroy',$c->id) }}"
                method="POST"
                id="delete"
                class="d-inline"
            >
                @csrf @method('DELETE')
                <!-- <a
                    href="#"
                    onclick="confirm('Delete?') ? document.getElementById('delete').submit() :false "
                    class="badge badge-danger"
                    >Delete</a
                > -->
                <button
                    type="submit"
                    onclick="return confirm('Do you want to delete this Category?')"
                    class="badge badge-danger"
                >
                    <i class="bi bi-trash"></i>
                </button></td>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>
                    @if($c->status == 'public')
                            <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                            </label>
                    @else
                    
                    <label class="switch">
  <input type="checkbox">
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
    {{ $category->links() }}
</div>
@endsection
