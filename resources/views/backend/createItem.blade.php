@extends('backend.layout.master') @section('content')
@section('item-active','active')
<div class="container">
    <div class="d-flex">
        <a
            href="{{ route('items.index') }}"
            class="text-muted mb-0 hover-cursor"
        >
            &nbsp;Item List&nbsp; </a
        ><i class="bi bi-chevron-right"></i>&nbsp;
        <p class="text-primary mb-0 hover-cursor">Add Items</p>
    </div>
    <div class="title mt-5 rounded">
        <h5 class="px-2 py-2">Add Items</h5>
    </div>

    <form
        action="{{ route('items.store') }}"
        method="post"
        class="mt-3"
        enctype="multipart/form-data"
    >
        @csrf
        <div style="float: left">
            <b>Item Information</b>
            <div class="form-group mt-3">
                <p>Item Name</p>
                <input
                    type="text"
                    name="name"
                    id=""
                    class="form-control"
                    placeholder="Input Name"
                />
            </div>
            <div class="form-group">
                <p>Select Category</p>
                <select name="category_id" id="" class="form-control mt-1">
                    @foreach($cat_id as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <p>Enter Price</p>
                <input type="number" name="price" class="form-control" />
            </div>
            <div class="form-group">
                <p>Enter Description</p>
                <textarea
                    name="description"
                    id="description"
                    cols="20"
                    rows="3"
                ></textarea>
                <script>
                    CKEDITOR.replace("description");
                </script>
            </div>
            <div class="form-group">
                <p>Select Item Condition</p>
                <select name="condition_id" id="" class="form-control mt-1">
                    @foreach($item_con as $c)
                    <option value="{{ $c->id }}">
                        {{ $c->condition }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <p>Select Item Type</p>
                <select name="type_id" id="" class="form-control mt-1">
                    @foreach($item_type as $c)
                    <option value="{{ $c->id }}">
                        {{ $c->type }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for=""
                    >Status<br />
                    <input
                        type="checkbox"
                        id="status"
                        name="status"
                        value="public"
                        class="mt-2"
                    />
                    <b>Public</b>
                </label>
            </div>
            <div class="form-group">
                <label for="">Choose Image</label>
                <input type="file" name="image" class="form-control" />
            </div>
        </div>

        <div style="float: right">
            <b>Owner Information</b>
            <div class="form-group mt-3">
                <p>Owner Name</p>
                <input
                    type="text"
                    name="ownername"
                    id=""
                    class="form-control"
                    placeholder="Input Owner Name"
                />
            </div>
            <div class="form-group">
                <p>Contact number:</p>
                <input
                    id="phone"
                    type="tel"
                    name="phone"
                    class="form-control"
                />
            </div>
            <div class="form-group">
                <p>Address</p>
                <textarea
                    name="address"
                    class="form-control"
                    id=""
                    cols="30"
                    rows="3"
                    placeholder="Enter Address . . . . ."
                ></textarea>
            </div>
            <div class="form-group">
                <a
                    href="{{ route('items.index') }}"
                    class="btn btn-sm btn-light mt-3 ml-3"
                    >Cancel</a
                >
                <input
                    type="submit"
                    value="Save"
                    class="btn btn-sm save mt-3 ml-3"
                />
            </div>
        </div>
    </form>
</div>

@endsection @section('script')
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
@endsection
