<div id="features10-id-checkboxs-facilities">
@foreach ($features10 as $feature)
    <label class="checkbox-inline">
        <input name="features10[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures10)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>