<div class="cust_border form-group mb-3 mx-0 pb-3 row">
    <label for="{{$input_name}}" class="col-sm-3 col-form-label ps-0 label_{{$input_name}}">
        @if(isset($label)) {{ __('language.'.$label) }} @else {{ __('language.'.$input_name)  }} @endif

        @if(isset($required))
            @if($required == 'true')
                <span class="text-danger">*</span>
            @endif
        @else
            <span class="text-danger">*</span>
        @endif
    </label>

    <div class="col-lg-9 pe-0">
        <input type="{{ isset($type) ? $type : 'text'}}"
            name="{{ $input_name }}"
            id="{{isset($additional_id) ? $additional_id : '' }}"
            @if(isset($type) && $type == 'number')
                min="0" step="0.01"
            @endif
            value="@if(old($input_name)){{old($input_name)}}@else{{ isset($value) ? $value : null }}@endif"
            placeholder="@if(isset($label)) {{ __($label) }} @else {{ __('language.'.$input_name)  }} @endif"
            class="form-control {{ $errors->first($input_name) ? 'is-invalid' : '' }} {{ isset($additional_class) ? $additional_class : '' }}"
            aria-describedby="emailHelp" {{ isset($custom_string) ? $custom_string : '' }}
            autocomplete="off">

            @if(isset($tooltip))
                <small id="emailHelp" class="form-text text-muted">{{$tooltip}}</small>
            @endif

        @if ($errors->has($input_name))
            <div class="error text-danger text-start">{{ $errors->first($input_name) }}</div>
        @endif
    </div>
</div>
