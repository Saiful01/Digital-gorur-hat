@if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
@endif

@if(Session::has('failed'))
    <p class="alert alert-danger">{{ Session::get('failed') }}</p>
@endif

@if($errors->any())
    {!! implode('', $errors->all('<div class="text-danger alert">:message</div>')) !!}
@endif