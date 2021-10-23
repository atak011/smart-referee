<div class="form-group" id="formGroup{{ $name }}" style="@if($hidden) display:none; @endif">
    @if($label)
        <label for="{{ $name }}">
            {{ $label }} @if($required)<span class="text-danger">*</span>@endif
        </label>
    @endif
    @php
        $class = ''
    @endphp
    @error($name)
    @php
        $class = 'is-invalid'
    @endphp
    @enderror
    <input type="date" class="form-control  {{$class}}" id="{{ $name }}" name="{{ $name }}"
           value="{{$value ? $value->format('Y-m-d'):''}}"
           placeholder="{{ $placeholder ?? $label }}">
    @error($name)
    <div class="invalid-feedback">{{ $label }} {{ $message }}</div>
    @enderror
</div>

