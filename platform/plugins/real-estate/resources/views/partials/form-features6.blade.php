<div id="features6-id-checkboxs-facilities">
@foreach ($features6 as $feature)
    <label class="checkbox-inline">
        <input name="features6[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures6)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>