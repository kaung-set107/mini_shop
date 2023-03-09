@extends('backend.layout.master') @section('content')
@section('cat-active','active')

<div class="container">
        <div class="d-flex">
        <a href="{{ route('category.index') }}" class="text-muted mb-0 hover-cursor">
            &nbsp;Category
        </a>
        &nbsp;<i class="bi bi-chevron-right"></i>&nbsp;
        <p class="text-primary mb-0 hover-cursor">Add Category</p>
    </div>
    <div class="title mt-5 rounded">
        <h5 class="px-2 py-2">Add Categories</h5>
    </div>
    <div class="row px-2 py-2 d-flex justify-content-between">
        <div class="col-md-8">
            <form
                action="{{ route('category.store') }}"
                method="post"
                class="mt-3"
                enctype="multipart/form-data"
            >
            @csrf
                <div class="form-group">
                    <p>Category</p>
                        <input
                            type="text"
                            name="name"
                            id=""
                            class="form-control"
                            placeholder="Input Name"
                    />
                </div>
                <div class="form-group">
                    <label for=""
                        >Category Photo</label>
                        <input
                            type="file"
                            name="image"
                            class="form-control"
                    />
                </div>
                <div class="form-group">
                    <label for=""
                        >Status</label><br />
                        <input
                            type="checkbox"
                            id="status"
                            name="status"
                            value="public"
                            class="mt-2"
                        />
                        <b>Public</b>
                    
                </div>
                <div style="float:right">
                    <a href="{{ route('category.index') }}" class="btn btn-sm mt-3" />Cancel</a>
                <input
                    type="submit"
                    value="Save"
                    class="btn btn-sm save mt-3"
                />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
