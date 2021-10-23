<div class="form-group">
    <label>{{ $label }}</label>
    <div class="input-group">
        <input type="number" name="{{$name}}" value="{{ $value ?? '' }}" class="form-control" aria-label="Text input with dropdown button">
        <div class="input-group-append">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TRY</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">TRY</a>
            </div>
        </div>
    </div>
{{--    <span class="form-text text-muted">Some help content goes here</span>--}}
</div>
