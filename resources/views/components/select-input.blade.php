<div class="form-group" id="formGroup{{ $name }}" style="@if($hidden) display:none; @endif">
    @if($label)
        <label for="{{ $name }}">
            {{ $label }}
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
    <select class="js-select2 form-control {{ $class }}" id="{{ $id ?? $name}}" name="{{$name}}" style="width: 100%;"
            @if($multiple) multiple @endif>
        @if($placeholder)
            @if(!$multiple)
                <option disabled selected>{{$placeholder}}</option>
            @endif
        @else
            <option></option>
        @endif
        @isset($dataset)
            @if($dataset)
                @if(isset($dataKeyValue) && $dataKeyValue == true)
                        @foreach($dataset as $value)
                            <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                @else
                    @foreach($dataset as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                @endif

            @endif
        @endisset
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $label }} {{ $message }}</div>
    @enderror
</div>
