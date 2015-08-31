        <li{!! Miscellaneous::setCurrentOpenPage(['hotels-environment','hotels-decoration','hotels-service', 'hotels-relationship', 'hotels-hotel']) !!}>
            <a href="javascript:void(0);"><i class="fa fa-h-square"></i>Hotels</a>
            <ul class="sub-menu">
                @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-hotel', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('hotels-hotel') !!}><a href="{{ route('Hotel', [session('baseLang')]) }}"><i class="fa fa-h-square"></i>{{ trans_choice('hotels::pulsar.hotel', 2) }}</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['hotels-environment','hotels-decoration','hotels-relationship','hotels-service']) !!}>
                    <a href="javascript:void(0);"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
                    <ul class="sub-menu" >
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-service', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-service') !!}><a href="{{ route('HotelsService', [session('baseLang')]) }}"><i class="icomoon-icon-wand-2"></i>{{ trans_choice('hotels::pulsar.service', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-decoration', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-decoration') !!}><a href="{{ route('HotelsDecoration', [session('baseLang')]) }}"><i class="icon-lightbulb"></i>{{ trans_choice('hotels::pulsar.decoration', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-environment', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-environment') !!}><a href="{{ route('HotelsEnvironment', [session('baseLang')]) }}"><i class="icon-picture"></i>{{ trans_choice('hotels::pulsar.environment', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-relationship', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-relationship') !!}><a href="{{ route('HotelsRelationship', [session('baseLang')]) }}"><i class="icon-group"></i>{{ trans_choice('hotels::pulsar.relationship', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>