@if($errors->any())
    <div class="callout callout-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif
