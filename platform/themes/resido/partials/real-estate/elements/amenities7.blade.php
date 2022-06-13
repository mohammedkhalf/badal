@if (!empty($property->features))
    <!-- Single Block Wrap -->
    <div class="property_block_wrap style-2">

        <div class="property_block_wrap_header">
            <a data-bs-toggle="collapse" data-parent="#amen" data-bs-target="#clThree" aria-controls="clThree"
                href="javascript:void(0);" aria-expanded="true">
                <h4 class="property_block_title">{{ trans('plugins/real-estate::feature7.name') }}</h4>
            </a>
        </div>
        <div id="clThree" class="panel-collapse collapse show">
            <div class="block-body">
                <ul class="avl-features third color">
                    @foreach ($property->features7 as $feature7)
                        <li>
                            <i class="icon @if ($feature7->icon) {{ $feature7->icon }} @else fas fa-check @endif"></i>
                            <span>{{ $feature7->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
