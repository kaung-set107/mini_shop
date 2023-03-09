@extends('frontend.layout.master') @section('content')
<div class="container">
    <div class="header">
        <img src="/images/os1.jpg" alt="" />
        <div class="search mb-5">
            <form
                action="{{ url('/search') }}"
                method="get"
                class="form-inline"
            >
            <div class=" search-cat d-flex ">
                  <i class="bi bi-search ml-2 py-2"></i><input
                    class="form-control mr-sm-2 border-0"
                    type="search"
                    name="search"
                    placeholder="Search Item"
                    aria-label="Search"
                />
                <span class="left-pan ">    <a
                                            class="nav-link dropdown-toggle text-dark"
                                            href="#"
                                            id="navbarDropdown"
                                            role="button"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            Category
                                        </a>
                                        <div
                                            class="dropdown-menu"
                                            aria-labelledby="navbarDropdown"
                                        >
                                            @foreach($category as $c)
                                            <a
                                                class="dropdown-item"
                                                href="{{ url('/item/category/'.$c->slug) }}"
                                                >{{ $c->name


                                                }}</a
                                            >

                                            @endforeach
                                        </div>
            </div>
                <button class="btn btn-sm btn-primary" type="submit">
                    Search
                </button></span>
            
            </form>
        </div>
    </div>
    <div class="main">
        <div class="info mt-5">
            <div class="row">
                <div class="col-md-9">
                    <h4>What are you looking for?</h4>
                </div>
                <div class="col-md-3" >
                    <a href="#"> View more <i class="bi bi-chevron-right"></i> </a>
                </div>
            </div>
            <div class="row d-flex mt-3 px-3 py-2">
                <div class="bg-light px-4 py-2">
                    <a href="{{ url('/fashion') }}" 
                        ><h2 class="ml-2 icon"><i class="bi bi-laptop"></i></h2
                    ></a>
                  <small>Computer</small>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="bg-light px-2 py-2">
                    <a href="{{ url('/fashion') }}" 
                        ><h2 class="ml-1 icon"><i class="bi bi-phone"></i></h2
                    ></a>
                    <small>Phone</small>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="bg-light px-2 py-2">
                    <a href="{{ url('/fashion') }}" 
                        ><h2 class="ml-2 icon"><i class="bi bi-house-door"></i></h2
                    ></a>
                    <small>Property</small>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="bg-light px-2 py-2">
                    <a href="{{ url('/fashion') }}" 
                        ><h2 class="ml-1 icon"><i class="bi bi-music-note-beamed"></i></h2
                    ></a>
                    <small>Music</small>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="bg-light px-2 py-2">
                        <a href="{{ url('/fashion') }}" 
                            ><h2 class="ml-1 icon"><i class='fas fa-tshirt'></i></h2
                        ></a>
                        <small>Fashion</small>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="bg-light px-2 py-2">
                        <a href="{{ url('/fashion') }}" 
                            ><h2 class="ml-1 icon"><i class="bi bi-tools"></i></h2
                        ></a>
                        <small>Service</small>
                    </div>
                </div>
            </div>

            <div id="alert"></div>
            
            <div class="recent-item mt-5">
                <div class="row">
                <div class="col-md-9">
                    <h4>Recent Items</h4>
                </div>
                <div class="col-md-3" >
                    <a href="#"> View more <i class="bi bi-chevron-right"></i> </a>
                </div>
            </div>
                <div class="row ind">
                    @foreach($item as $i)
                    <div class="col-md-4 px-3 py-3 cover">
                        <div class="card ">
                            <div class="img">
                              <a href="{{ url('/item/'.$i->slug) }}" >
                                <img
                                    class="card-img-top bg-light"
                                    src="{{ asset($i->image) }}"
                                    
                                />
                            </a>
                            </div>
                            <div class="card-body item-bg">
                                <div class="row mb-3">
                                    <div class="col-md-7">
                                        <small>{{ $i->name }}</small>
                                    </div>
                                    <div class="col-md-5">
                                        <i class="text-primary">{{ $i->price }}</i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            @foreach($i->condition as $con)
                                            <p class="text-primary">
                                                {{ $con->condition }}
                                            </p>
                                            @endforeach
                                        
                                      
                                    </div>
                                </div>
                                <div class="row mt-1 px-1">
                                    <i class="bi bi-person-circle">&nbsp;{{ $i->ownername }}</i
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>

        <!-- <div class="row mt-3">
        <div class="col-md-12">
            {{ $item->links() }}
        </div>
    </div> -->
    </div>
    @endsection
</div>
