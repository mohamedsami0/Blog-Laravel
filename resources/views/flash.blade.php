@if ($errors->any())
@foreach($errors->all() as $error)
<div class=" text-center text-capitalize alert alert-danger ">
<i> {{ $error }} </i>
</div>
@endforeach
@endif


@if (session('success'))

    <div class="alert alert-success  text-center text-capitalize">
    {{ session('success') }}
    </div>
@endif

@if (session('error'))

    <div class="alert alert-danger  text-center text-capitalize">
    {{ session('error') }}
    </div>
    @endif
