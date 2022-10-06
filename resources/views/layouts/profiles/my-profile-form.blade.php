
<form 
action="{{auth()->user()->profile ? 
route('profiles.edit', ['id' => auth()->user()->id]) : route('profiles.create')}}"
method="POST">
    @csrf
    @if (auth()->user()->profile)
        @method('PUT')
    @else
        @method('POST')
    @endif
    <div class="form-row">
        <div class="col-12 col-md-6">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName"
            name="first_name"
            placeholder="e.g. Nermin"
            value="@if(auth()->user()->profile){{auth()->user()->profile->first_name}}@endif"
            required>
        </div>
        <div class="col-12 col-md-6">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName"
            name="last_name"
            placeholder="e.g. Šistek"
            value="@if(auth()->user()->profile){{auth()->user()->profile->last_name}}@endif"
            required>
        </div>
    </div>
    <div class="form-row my-3">
        <div class="col-12 col-md-6">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address"
            name="address"
            placeholder="e.g. Zmaja od Bosne bb"
            value="@if(auth()->user()->profile){{auth()->user()->profile->address}}@endif"
            required>
        </div>
        <div class="col-12 col-md-6">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone"
            name="phone"
            placeholder="e.g. +38761999999"
            value="@if(auth()->user()->profile){{auth()->user()->profile->phone}}@endif"
            required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        @if (auth()->user()->profile)
            Update
        @else
            Create
        @endif
    </button>
</form>
