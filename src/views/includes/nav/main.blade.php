        <li{!! is_current_resource(['hotels-environment','hotels-decoration','hotels-service', 'hotels-relationship', 'hotels-hotel','hotels-publication','hotels-attachment-family']) !!}>
            <a href="javascript:void(0)"><i class="fa fa-h-square"></i>{{ trans('hotels::pulsar.package_name') }}</a>
            <ul class="sub-menu">
                @if(is_allowed('hotels-hotel', 'access'))
                    <li{!! is_current_resource('hotels-hotel') !!}><a href="{{ route('hotel', [base_lang2()->id_001]) }}"><i class="fa fa-h-square"></i>{{ trans_choice('hotels::pulsar.hotel', 2) }}</a></li>
                @endif
                <li{!! is_current_resource(['hotels-environment','hotels-decoration','hotels-relationship','hotels-service','hotels-publication','hotels-attachment-family'], true) !!}>
                    <a href="javascript:void(0)"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
                    <ul class="sub-menu" >
                        @if(is_allowed('hotels-publication', 'access'))
                            <li{!! is_current_resource('hotels-publication') !!}><a href="{{ route('hotelsPublication') }}"><i class="fa fa-object-ungroup"></i>{{ trans_choice('hotels::pulsar.publication', 2) }}</a></li>
                        @endif
                        @if(is_allowed('hotels-service', 'access'))
                            <li{!! is_current_resource('hotels-service') !!}><a href="{{ route('hotelsService', [base_lang2()->id_001]) }}"><i class="icomoon-icon-wand-2"></i>{{ trans_choice('hotels::pulsar.service', 2) }}</a></li>
                        @endif
                        @if(is_allowed('hotels-decoration', 'access'))
                            <li{!! is_current_resource('hotels-decoration') !!}><a href="{{ route('hotelsDecoration', [base_lang2()->id_001]) }}"><i class="fa fa-lightbulb-o"></i>{{ trans_choice('hotels::pulsar.decoration', 2) }}</a></li>
                        @endif
                        @if(is_allowed('hotels-environment', 'access'))
                            <li{!! is_current_resource('hotels-environment') !!}><a href="{{ route('hotelsEnvironment', [base_lang2()->id_001]) }}"><i class="fa fa-picture-o"></i>{{ trans_choice('hotels::pulsar.environment', 2) }}</a></li>
                        @endif
                        @if(is_allowed('hotels-relationship', 'access'))
                            <li{!! is_current_resource('hotels-relationship') !!}><a href="{{ route('hotelsRelationship', [base_lang2()->id_001]) }}"><i class="fa fa-group"></i>{{ trans_choice('hotels::pulsar.relationship', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>