@extends('pulsar::layouts.form', ['action' => 'store'])

@section('script')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/mappoint/css/mappoint.css') }}">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/mappoint/js/jquery.mappoint.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9L1dPys2N9iuQYoNXtZr8i_wxYiynswE&libraries=places"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $.getAddress({
                id:                         '01',
                type:                       'laravel',
                appName:                    'pulsar',
                token:                      '{{ csrf_token() }}',
                lang:                       '{{ config('app.locale') }}',
                highlightCountrys:          ['ES','US'],

                useSeparatorHighlight:      true,
                textSeparatorHighlight:     '------------------',

                countryValue:               '{{ Input::old('country') }}',
                territorialArea1Value:      '{{ Input::old('territorialArea1') }}',
                territorialArea2Value:      '{{ Input::old('territorialArea2') }}',
                territorialArea3Value:      '{{ Input::old('territorialArea3') }}'
            });

            $.mapPoint({
                id:                 '01',
                urlPlugin:          '/packages/syscover/pulsar/vendor',
                lat:                40.434767,
                lng:                -3.690826,
                zoom:               5,
                customIcon:         {
                    src: '/location-test.svg',
                    scaledWidth: 49,
                    scaledHeight: 71,
                    anchorX: 25,
                    anchorY: 71
                }
            });

            $('#locationSearch').css('opacity', '1');
        });
    </script>
@stop

@section('rows')
    <!-- hotels::services.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id',  'value' => Input::old('name', isset($object->id_170)? $object->id_170 : null), 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_image_group', ['label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name', isset($object->name_170)? $object->name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.web'), 'name' => 'web', 'value' => Input::old('web', isset($object->web_170)? $object->web_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.geolocation', 1), 'icon' => 'icon-location-arrow'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'address', 'value' => Input::old('address', isset($object->address_170)? $object->address_170 : null), 'maxLength' => '150', 'rangeLength' => '2,150', 'required' => true])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'country', 'name' => 'country', 'required' => true, 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'col-md-12 select2', 'data' => ['language' => config('app.locale'), 'error-placement' => 'select2-country-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'class' => 'col-md-12 select2', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'class' => 'col-md-12 select2', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'class' => 'col-md-12 select2', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => Input::old('cp'), 'maxLength' => '10', 'rangeLength' => '2,10', 'fieldSize' => 4])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => Input::old('locality'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.latitude'), 'name' => 'latitude', 'value' => Input::old('latitude', isset($object->latitude_170)? $object->latitude_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.longitude'), 'name' => 'longitude', 'value' => Input::old('longitude', isset($object->longitude_170)? $object->longitude_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
        </div>
        <div class="col-md-6">
            <div id="locationMapWrapper" style="width:100%; height:300px"></div>
        </div>
    </div>
    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('hotels::pulsar.company_data', 1), 'icon' => 'icon-location-arrow'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.billing_name'), 'name' => 'billingCompanyName', 'value' => Input::old('billingCompanyName', isset($object->billing_company_name_170)? $object->billing_company_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.billing_name'), 'name' => 'billingName', 'value' => Input::old('billingName', isset($object->billing_name_170)? $object->billing_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.billing_surname'), 'name' => 'billingSurname', 'value' => Input::old('billingSurname', isset($object->billing_surname_170)? $object->billing_surname_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.billing_surname'), 'name' => 'billingTin', 'value' => Input::old('billingTin', isset($object->billing_tin_170)? $object->billing_tin_170 : null), 'maxLength' => '50', 'rangeLength' => '2,100', 'required' => true])
        </div>
        <div class="col-md-6">
            <div id="locationMapWrapper" style="width:100%; height:300px"></div>
        </div>
    </div>
    <!-- /hotels::services.create -->
@stop