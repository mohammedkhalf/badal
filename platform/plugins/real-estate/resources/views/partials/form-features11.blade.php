<div id="features11-id-checkboxs-facilities">
@foreach ($features11 as $feature)
    <label class="checkbox-inline">
        <input name="features11[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures11)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>