        <li{!! Miscellaneous::setCurrentOpenPage(['hotels-environment','hotels-decoration','hotels-service', 'hotels-relationship', 'hotels-hotel','hotels-publication','hotels-attachment-family']) !!}>
            <a href="javascript:void(0)"><i class="fa fa-h-square"></i>{{ trans('hotels::pulsar.package_name') }}</a>
            <ul class="sub-menu">
                @if(session('userAcl')->allows('hotels-hotel', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('hotels-hotel') !!}><a href="{{ route('hotel', [session('baseLang')->id_001]) }}"><i class="fa fa-h-square"></i>{{ trans_choice('hotels::pulsar.hotel', 2) }}</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['hotels-environment','hotels-decoration','hotels-relationship','hotels-service','hotels-publication','hotels-attachment-family']) !!}>
                    <a href="javascript:void(0)"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
                    <ul class="sub-menu" >
                        @if(session('userAcl')->allows('hotels-publication', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-publication') !!}><a href="{{ route('hotelsPublication') }}"><i class="fa fa-object-ungroup"></i>{{ trans_choice('hotels::pulsar.publication', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('hotels-service', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-service') !!}><a href="{{ route('hotelsService', [session('baseLang')->id_001]) }}"><i class="icomoon-icon-wand-2"></i>{{ trans_choice('hotels::pulsar.service', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('hotels-decoration', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-decoration') !!}><a href="{{ route('hotelsDecoration', [session('baseLang')->id_001]) }}"><i class="fa fa-lightbulb-o"></i>{{ trans_choice('hotels::pulsar.decoration', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('hotels-environment', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-environment') !!}><a href="{{ route('hotelsEnvironment', [session('baseLang')->id_001]) }}"><i class="fa fa-picture-o"></i>{{ trans_choice('hotels::pulsar.environment', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('hotels-relationship', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-relationship') !!}><a href="{{ route('hotelsRelationship', [session('baseLang')->id_001]) }}"><i class="fa fa-group"></i>{{ trans_choice('hotels::pulsar.relationship', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>