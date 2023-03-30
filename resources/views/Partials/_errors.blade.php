@if ($errors->any() > 0)
    <div class="alert alert-danger">
        <ul class="err-pl-15">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
