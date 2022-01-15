@if (Session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
   @endif

@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: red;margin:0 0 5px 0;padding:0">{{ $error }} !!!</p>
    @endforeach

@endif