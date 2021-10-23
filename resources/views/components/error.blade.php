@foreach ($errors->all() as $error)
    <li class="alert alert-danger show mt-2">{{ $error }}</li>
@endforeach
