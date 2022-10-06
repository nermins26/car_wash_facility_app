@isset($edit)
    <form action="{{ route('programs.edit', ['id' => $program->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"
            name="name"
            value="{{ $program->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description"
            name="description"
            required>{{ $program->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price"
            name="price"
            step=".01"
            value="{{ $program->price }}" required>
        </div>
        <div class="form-group">
            <h4>Program includes:</h4>
            <ul class="px-0">
                @foreach ($steps as $step)
                <li>
                    <label for="step-{{$step->id}}">{{$step->name}}</label>
                    <input id="step-{{$step->id}}" type="checkbox" name="steps[]" value="{{$step->id}}"
                    @if (in_array($step->id, $program->washingSteps->pluck('id')->toArray()))
                        checked 
                    @endif>
                </li>
                @endforeach
            </ul>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endisset

@isset($create)
    <form action="{{ route('programs.create')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"
            name="name"
            required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" id="description"
            name="description"
            required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price"
            name="price"
            step=".01"
            required>
        </div>
        <div class="form-group">
            <h4>Program includes:</h4>
            <ul class="px-0">
                @foreach ($steps as $step)
                <li>
                    <label for="step-{{$step->id}}">{{$step->name}}</label>
                    <input id="step-{{$step->id}}" type="checkbox" name="steps[]" value="{{$step->id}}">
                </li>
                @endforeach
            </ul>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endisset


