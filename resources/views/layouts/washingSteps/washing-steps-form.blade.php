@isset($edit)
    <form action="{{ route('steps.edit', ['id' => $step->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"
            name="name"
            value="{{ $step->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endisset

@isset($create)
    <form action="{{ route('steps.create')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"
            name="name"
            required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endisset


