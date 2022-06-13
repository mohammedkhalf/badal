@if (!empty($property->features))
    <!-- Single Block Wrap -->
    <div class="property_block_wrap style-2">

        <div class="property_block_wrap_header">
            <a data-bs-toggle="collapse" data-parent="#amen" data-bs-target="#clThree" aria-controls="clThree"
                href="javascript:void(0);" aria-expanded="true">
                <h4 class="property_block_title">{{ trans('plugins/real-estate::feature11.name') }}</h4>
            </a>
        </div>
        <div id="clThree" class="panel-collapse collapse show">
            <div class="block-body">
                <ul class="avl-features third color">
                    @foreach ($property->features11 as $feature11)
                        <li>
                            <i class="icon @if ($feature11->icon) {{ $feature11->icon }} @else fas fa-check @endif"></i>
                            <span>{{ $feature11->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
