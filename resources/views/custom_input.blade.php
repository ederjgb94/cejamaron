<div class="row mb-2">
    <label class="col-sm-3 fw-bold col-form-label">{{ $label }}</label>
    <div class="col-sm-9">
        <input {{ $disabled ?? '' }} required name="{{ $name }}" type="{{ $type }}"
            class="form-control" placeholder="{{ $placeholder }}" value="{{ $value }}"
            style="text-transform: uppercase;">
    </div>
</div>
