<div id="features5-id-checkboxs-facilities">
@foreach ($features5 as $feature)
    <label class="checkbox-inline">
        <input name="features5[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures5)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>