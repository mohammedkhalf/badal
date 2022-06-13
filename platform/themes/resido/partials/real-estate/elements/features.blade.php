<div class="property_block_wrap style-2">

    <div class="property_block_wrap_header">
        <a data-bs-toggle="collapse" data-parent="#features" data-bs-target="#clOne" aria-controls="clOne" href="javascript:void(0);" aria-expanded="false">
            <h4 class="property_block_title">{{ __('Detail & Features') }}</h4>
        </a>
    </div>
    <div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
        <div class="block-body">
            <ul class="detail_features">
			
                @if ($property->number_bedroom)
                <li>
                    <strong>{{ __('Bedrooms:') }}</strong>
                    {{ number_format($property->number_bedroom) }} {{ __('Beds') }}
                </li>
                @endif
                @if ($property->number_bathroom)
                <li>
                    <strong>{{ __('Bathrooms:') }}</strong> {{ number_format($property->number_bathroom) }} {{ __('Bath') }}
                </li>
                @endif
                @if ($property->square)
                <li>
                    <strong>{{ trans('plugins/real-estate::property.form.square') }}</strong> {{ $property->square_text }}
                </li>
                @endif
                @if ($property->number_floor)
                <li>
                    <strong>{{ trans('plugins/real-estate::property.form.number_floor') }}</strong> {{ number_format($property->number_floor) }}
                </li>
                @endif
                @if ($property->number_floor2)
                <li>
                    <strong>{{ trans('plugins/real-estate::property.form.number_floor2') }}</strong> {{ number_format($property->number_floor2) }}
                </li>
                @endif
                @if ($property->number_floor3)
                <li>
                    <strong>{{ trans('plugins/real-estate::property.form.number_floor3') }}</strong> {{ number_format($property->number_floor3) }}
                </li>
                @endif
                @if ($property->number_floor4)
                <li>
                    <strong>{{ trans('plugins/real-estate::property.form.number_floor4') }}</strong> {{ number_format($property->number_floor4) }}
                </li>
                @endif
                @if ($property->number_floor5)
                <li>
                    <strong>{{ trans('plugins/real-estate::property.form.number_floor5') }}</strong> {{ ($property->number_floor5) }}
                </li>
                @endif
                @if ($property->number_floor6)
                <li>
                    <strong>{{ trans('plugins/real-estate::property.form.number_floor6') }}</strong> {{ number_format($property->number_floor6) }}
                </li>
                @endif

               

            </ul>
        </div>
    </div>

</div>
