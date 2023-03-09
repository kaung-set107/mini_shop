@if($errors->any()) @foreach($errors->all() as $e)
<div class="alert alert-sm alert-danger">{{ $e }}</div>
@endforeach @endif @if(session()->has('success'))

<div class="alert alert-sm alert-success">{{ session()->get('success') }}</div>

@endif @if(session()->has('delete'))

<div class="alert alert-sm alert-danger">{{ session()->get('delete') }}</div>

@endif @if(session()->has('error'))

<div class="alert alert-sm alert-danger">{{ session()->get('error') }}</div>

@endif
