<div id="features4-id-checkboxs-facilities">
@foreach ($features4 as $feature)
    <label class="checkbox-inline">
        <input name="features4[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures4)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>