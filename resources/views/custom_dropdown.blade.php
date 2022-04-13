<div class="row mb-2">
    <label class="col-sm-3 fw-bold col-form-label">{{ $label }}</label>
    <div class="col-sm-9">
        <select required name="{{ $name }}" class="form-select" id="floatingSelectGrid">
            <option value="" disabled selected>--</option>
            @for ($i = 0; $i < count($options); $i++)
                <option value="{{ $i }}">
                    {{ $options[$i] }}
                </option>
            @endfor
        </select>
    </div>
</div>
