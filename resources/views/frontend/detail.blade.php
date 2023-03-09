@extends('frontend.layout.master') @section('content')

<div class="container mt-5 mb-5">
    <div class="row d-flex link">
        <a href="{{ url('/') }}" class="text-muted mb-0 hover-cursor">
            &nbsp;Home&nbsp; </a
        ><i class="bi bi-chevron-right"></i>
        <p class="text-muted mb-0 hover-cursor">&nbsp;Fashion&nbsp;</p>
        <i class="bi bi-chevron-right"></i>
        <a
            class="text-primary mb-0 hover-cursor"
            href="{{ url('/item/'.$item->slug) }}"
            ><b class="">
                {{ $item->name


                }}
            </b></a
        >
    </div>
    <div class="row mt-5">
        <div class="img-detail col-md-12">
            <img src="{{ asset($item->image) }}" alt="" />
        </div>
    </div>
    <div class="mt-5">
        <h4>{{ $item->name }}</h4>
        <b class="text-primary">{{ $item->price }}</b>
    </div>
    <div class="row mt-5">
        <div class="col-md-3">
            <h6>Type</h6>
            @foreach($item->type as $type)
            <p class="badge badge-light">
                {{ $type->type }}
            </p>
            @endforeach
        </div>
        <div class="col-md-4">
            <h6>Condition</h6>
            @foreach($item->condition as $con)
            <p class="badge badge-primary">
                {{ $con->condition }}
            </p>
            @endforeach
        </div>
        <div class="col-md-3">
            <h6>Status</h6>

            @if($item->status == 'public')
            <small class="badge badge-success">Available</small>
            @endif @if($item->status == '')
            <small class="badge badge-info">Non</small>
            @endif
        </div>
    </div>
    <div class="mt-5">
        <h4>Item Description</h4>
        <p>{{ $item->description }}</p>
    </div>
    <h5 class="mt-5">Owner Information</h5>
    <div class="owner mt-2">
        <h5><i class="bi bi-telephone"></i>&nbsp;Contact Number</h5>
        {{ $item->phone }}
    </div>
    <div class="row mt-4 owner-info">
        <h1><i class="bi bi-person-circle"></i></h1>
        <div class="px-3">
            <h5>{{ $item->ownername }}</h5>

            {{ $item->address }}
        </div>
    </div>
</div>
@endsection
