
<form
action="
@isset($edit)
{{ route('cars.edit', ['id' => $car->id]) }}
@else
{{ route('cars.create')}}
@endisset" method="POST">
    @csrf
    @isset($edit)
        @method('PUT')
    @else
        @method('POST')
    @endisset
    <div class="form-row">
        <div class="col-12 col-md-6">
            <label for="brend">Brend</label>
            <input type="text" class="form-control" id="brend"
            name="brend"
            placeholder="e.g. Mercedes"
            value="@isset($edit) {{$car->brend}} @endisset"
            required>
        </div>
        <div class="col-12 col-md-6">
            <label for="lastName">Model</label>
            <input type="text" class="form-control" id="model"
            name="model"
            placeholder="e.g. E2000"
            value="@isset($edit) {{$car->model}} @endisset"
            required>
        </div>
    </div>
    <div class="form-row my-3">
        <div class="col-12 col-md-6">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color"
            name="color"
            placeholder="e.g. Black"
            value="@isset($edit) {{$car->color}} @endisset"
            required>
        </div>
        <div class="col-12 col-md-6">
            <label for="year">Year</label>
            <input type="text" class="form-control" id="year"
            name="year"
            placeholder="e.g. 2004"
            value="@isset($edit) {{$car->year}} @endisset"
            required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        @isset ($edit)
            Update
        @else
            Create
        @endisset
    </button>
</form>




