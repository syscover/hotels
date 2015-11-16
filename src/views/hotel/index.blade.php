@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('script')
    @parent
    <!-- hotels::hotels.index -->
    <script type="text/javascript">
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [5,6]},
                        { 'sClass': 'checkbox-column', 'aTargets': [5]},
                        { 'sClass': 'align-center', 'aTargets': [6]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix), [session('baseLang')]) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- hotels::hotels.index -->
@stop

@section('tHead')
    <!-- hotels::hotels.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.language', 1) }}</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.country', 1) }}</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.territorial_area', 1) }}</th>
        <th data-class="expand">{{ trans_choice('hotels::pulsar.hotel', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /hotels::hotels.index -->
@stop