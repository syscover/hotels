        <li{!! Miscellaneous::setCurrentOpenPage(['hotels-environment','hotels-decoration','hotels-relationship']) !!}>
            <a href="javascript:void(0);"><i class="icomoon-icon-home-7"></i>Hotels</a>
            <ul class="sub-menu">
                @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'mifinan-pedido', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('mifinan-pedido') !!}><a href="{{ route('MifinanPedido') }}"><i class="icomoon-icon-home-7"></i>{{ trans_choice('hotels::pulsar.hotel', 2) }}</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['hotels-environment','hotels-decoration','hotels-relationship']) !!}>
                    <a href="javascript:void(0);"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
                    <ul class="sub-menu" >
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-decoration', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-decoration') !!}><a href="{{ route('HotelsDecoration', [Session::get('baseLang')]) }}"><i class="icon-lightbulb"></i>{{ trans_choice('hotels::pulsar.decoration', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-environment', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-environment') !!}><a href="{{ route('HotelsEnvironment', [Session::get('baseLang')]) }}"><i class="icon-picture"></i>{{ trans_choice('hotels::pulsar.environment', 2) }}</a></li>
                        @endif
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'hotels-relationship', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('hotels-relationship') !!}><a href="{{ route('HotelsRelationship', [Session::get('baseLang')]) }}"><i class="icon-group"></i>{{ trans_choice('hotels::pulsar.relationship', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>