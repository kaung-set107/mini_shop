@extends('frontend.layout.master') @section('content')

<div class="container mt-5">
    <div class="d-flex link">
        <a href="{{ url('/') }}" class="text-muted mb-0 hover-cursor">
            &nbsp;Home&nbsp; </a
        ><i class="bi bi-chevron-right"></i>
        <p class="text-primary mb-0 hover-cursor">Fashion</p>
    </div>
    <div class="row">
        <div class="col-md-3 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <a href="">Filter By</a>
                </div>
                <div class="col-md-6">
                    <a href="" class="text-danger">Clear Filter</a>
                </div>
            </div>
            <div class="row mt-5 input-color">
                <form action="{{ url('/filter') }}" method="get">
                    <p>Sorting</p>
                    <div class="form-group d-flex justy-content-between">
                          
                        <input
                            type="radio"
                            id="latest"
                            name="sort"
                            value="Latest"
                        />
                          <label for="latest">Latest</label>&nbsp;&nbsp;&nbsp;
                        <input
                            type="radio"
                            id="popular"
                            name="sort"
                            value="Popular"
                        />
                          <label for="popular">Popular</label>
                    </div>
                    <div class="form-group">
                        <p>Item Name</p>
                        <input
                            type="text"
                            name="name"
                            id=""
                            class="form-control"
                            placeholder="Input Name"
                        />
                    </div>
                    <p>Price Range</p>
                    <div class="form-group d-flex justy-content-between">
                         
                        <input
                            type="number"
                            name="min"
                            min="1"
                            class="form-control"
                            placeholder="Min"
                        />
                        &nbsp;
                        <input
                            type="number"
                            name="max"
                            max="100000000"
                            class="form-control"
                            placeholder="Max"
                        />
                    </div>
                    <div class="form-group">
                        <p>Select Category</p>
                        <select
                            name="category_id"
                            id=""
                            class="form-control mt-1"
                        >
                            <option value="">Choose One</option>
                            @foreach($cat as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Select Item Condition</p>
                        <select
                            name="condition_id"
                            id=""
                            class="form-control mt-1"
                        >
                            <option value="">Choose One</option>
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
                            <option value="">Choose One</option>
                            @foreach($item_type as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->type }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input
                            type="submit"
                            value="Apply Filter"
                            class="btn-fluid btn-sm btn-primary form-control"
                        />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 offset-1">
            <div id="alert"></div>
            <div class="recent-item mt-5">
                <div class="row ind">
                    @foreach($item as $i)
                    <div class="col-md-4 px-3 py-3 cover">
                        <div class="card">
                            <div class="img">
                                <a href="{{ url('/item/'.$i->slug) }}">
                                    <img
                                        class="card-img-top bg-light"
                                        src="{{ asset($i->image) }}"
                                    />
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-7">
                                        <small>{{ $i->name }}</small>
                                    </div>
                                    <div class="col-md-5">
                                        <i class="text-primary"> New </i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-info">{{ $i->price }}</p>
                                    </div>
                                </div>
                                <div class="row px-1">
                                    <i class="bi bi-person-circle"
                                        >&nbsp;{{ $i->ownername }}</i
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                {{ $item->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
