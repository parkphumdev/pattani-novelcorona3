@if(count($errors) > 0)
    @foreach($errors->all() AS $error)
    <div class="callout callout-danger">
        {{$error}}
    </div>
    @endforeach
@endif

@if(session('succes'))
    <div class="callout callout-danger">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="callout callout-danger">
        {{session('error')}}
    </div>
@endif