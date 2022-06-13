<div id="features9-id-checkboxs-facilities">
@foreach ($features9 as $feature)
    <label class="checkbox-inline">
        <input name="features9[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures9)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>