<div id="features3-id-checkboxs-facilities">
@foreach ($features3 as $feature)
    <label class="checkbox-inline">
        <input name="features3[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures3)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>