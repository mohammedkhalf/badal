<div id="features2-id-checkboxs-facilities">
@foreach ($features2 as $feature)
    <label class="checkbox-inline">
        <input name="features2[]" type="checkbox" value="{{ $feature->id }}" @if (in_array($feature->id, $selectedFeatures2)) checked @endif>{{ $feature->name }}
    </label>&nbsp;
@endforeach
</div>