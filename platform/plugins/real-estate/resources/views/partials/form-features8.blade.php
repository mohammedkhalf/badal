<div id="features8-id-checkboxs-facilities">
@foreach ($features8 as $feature)
    <label class="checkbox-inline">
        <input name="features8[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures8)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>