{{-- displays errors if there is any --}}
@if (count($errors) > 0)
    <div class="col-lg-12 no-pdd">
        <div class="sn-field alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif