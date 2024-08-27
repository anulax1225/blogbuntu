@foreach($errors->all() as $key => $error)
        <p>{{ $error }}</p>
@endforeach