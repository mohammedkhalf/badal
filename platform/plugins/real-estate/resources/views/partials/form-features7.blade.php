<div id="features7-id-checkboxs-facilities">
@foreach ($features7 as $feature)
    <label class="checkbox-inline">
        <input name="features7[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures7)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>