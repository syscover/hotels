@extends('pulsar::layouts.tab', ['tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('hotels::pulsar.hotel', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.description', 2)],
        ['id' => 'box_tab3', 'name' => trans('hotels::pulsar.billing_data')],
        ['id' => 'box_tab4', 'name' => trans_choice('pulsar::pulsar.image', 2)],
        ['id' => 'box_tab5', 'name' => trans_choice('pulsar::pulsar.video', 2)]
    ]])

@section('script')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/css/select2.css') }}">

    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/mappoint/css/mappoint.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/froala_editor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/froala_style.min.css') }}">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/froala_editor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/tables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/colors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/media_manager.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/file_upload.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/block_styles.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/fullscreen.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>
    @if(config('app.locale') != 'en')
        <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/langs/' . config('app.locale') . '.js') }}"></script>
    @endif

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

            $.getAddress({
                id:                         '02',
                type:                       'laravel',
                appName:                    'pulsar',
                token:                      '{{ csrf_token() }}',
                lang:                       '{{ config('app.locale') }}',
                highlightCountrys:          ['ES','US'],

                useSeparatorHighlight:      true,
                textSeparatorHighlight:     '------------------',

                tA1Wrapper:					'billingTerritorialArea1Wrapper',
                tA2Wrapper:					'billingTerritorialArea2Wrapper',
                tA3Wrapper:					'billingTerritorialArea3Wrapper',
                tA1Label:                   'billingTerritorialArea1Label',
                tA2Label:                   'billingTerritorialArea2Label',
                tA3Label:                   'billingTerritorialArea3Label',
                countrySelect:              'billingCountry',
                tA1Select:                  'billingTerritorialArea1',
                tA2Select:                  'billingTerritorialArea2',
                tA3Select:                  'billingTerritorialArea3',

                countryValue:               '{{ Input::old('billingCountry') }}',
                territorialArea1Value:      '{{ Input::old('billingTerritorialArea1') }}',
                territorialArea2Value:      '{{ Input::old('billingTerritorialArea2') }}',
                territorialArea3Value:      '{{ Input::old('billingTerritorialArea3') }}'
            });

            $.mapPoint({
                id:                 '01',
                urlPlugin:          '/packages/syscover/pulsar/vendor'//,
                /*lat:                40.434767,
                lng:                -3.690826,
                zoom:               5,
                customIcon:         {
                    src: '/location-test.svg',
                    scaledWidth: 49,
                    scaledHeight: 71,
                    anchorX: 25,
                    anchorY: 71
                }*/
            });

            $('.wysiwyg').editable({
                language: '{{ config('app.locale') }}',
                inlineMode: false,
                toolbarFixed: true,
                tabSpaces: true,
                shortcuts: true,
                shortcutsAvailable: ['bold', 'italic'],
                buttons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'inlineStyle', 'align', 'insertOrderedList', 'insertUnorderedList', 'outdent', 'indent', 'selectAll', 'createLink', 'undo', 'redo', 'html', 'insertHorizontalRule', 'removeFormat', 'fullscreen'],
                imagesLoadURL: '{{ route('apiWysiwygCmsFile', ['type' => 'images']) }}',

                imageDeleteURL: '{{ route('apiWysiwygDeleteCmsFile') }}',
                imageDeleteParams: {_token: '{{ csrf_token() }}'},
                imageUploadURL: '{{ route('apiWysiwygUploadCmsFile', ['type' => 'images']) }}',
                imageUploadParams: {_token: '{{ csrf_token() }}'},
                fileUploadURL: '{{ route('apiWysiwygUploadCmsFile', ['type' => 'files']) }}',
                fileUploadParams: {_token: '{{ csrf_token() }}'},
                minHeight: 130,
                paragraphy: false
            });

            // set tab active
            @if($tab == 0)
            $('.tabbable li:eq(0) a').tab('show');
            @elseif($tab == 1)
            $('.tabbable li:eq(1) a').tab('show');
            @elseif($tab == 2)
            $('.tabbable li:eq(2) a').tab('show');
            @elseif($tab == 3)
            $('.tabbable li:eq(3) a').tab('show');
            @elseif($tab == 4)
            $('.tabbable li:eq(4) a').tab('show');
            @endif
        });
    </script>
@stop

@section('layoutTabHeader')
    @include('pulsar::includes.html.form_record_header', ['action' => 'store'])
@stop
@section('layoutTabFooter')
    @include('pulsar::includes.html.form_record_footer', ['action' => 'store'])
@stop

@section('box_tab1')
    <!-- hotels::services.create -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'fieldSize' => 4, 'name' => 'id',  'value' => Input::old('name', isset($object->id_170)? $object->id_170 : null), 'readOnly' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', ['label' => 'ID', 'fieldSize' => 4, 'label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name', isset($object->name_170)? $object->name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.web'), 'name' => 'web', 'value' => Input::old('web', isset($object->web_170)? $object->web_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.contact', 1), 'name' => 'contact', 'value' => Input::old('contact', isset($object->contact_170)? $object->contact_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.phone', 1), 'name' => 'phone', 'value' => Input::old('phone', isset($object->phone_170)? $object->phone_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.fax'), 'name' => 'fax', 'value' => Input::old('fax', isset($object->fax_170)? $object->fax_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.web_url'), 'name' => 'webUrl', 'value' => Input::old('web', isset($object->web_url_170)? $object->web_url_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => Input::old('email', isset($object->email_170)? $object->email_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'type' => 'email'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.mobile'), 'name' => 'mobile', 'value' => Input::old('mobile', isset($object->mobile_170)? $object->mobile_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.feature', 2), 'icon' => 'fa fa-bookmark'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.environment', 1), 'name' => 'environment', 'value' => Input::old('environment', isset($object->environment_170)? $object->environment_170 : null), 'objects' => $environments, 'idSelect' => 'id_150', 'nameSelect' => 'name_150', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.decoration', 1), 'name' => 'decoration', 'value' => Input::old('decoration', isset($object->decoration_170)? $object->decoration_170 : null), 'objects' => $decorations, 'idSelect' => 'id_151', 'nameSelect' => 'name_151', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.relationship', 1), 'name' => 'relationship', 'value' => Input::old('relationship', isset($object->relationship_170)? $object->relationship_170 : null), 'objects' => $relationships, 'idSelect' => 'id_152', 'nameSelect' => 'name_152', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container']])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_rooms', 1), 'name' => 'nRoms', 'value' => Input::old('nRoms', isset($object->n_rooms_170)? $object->n_rooms_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_places', 1), 'name' => 'nPlaces', 'value' => Input::old('nPlaces', isset($object->n_places_170)? $object->n_places_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.company', 2), 'icon' => 'fa fa-building'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_rooms', 1), 'name' => 'nEventsRoms', 'value' => Input::old('nEventsRoms', isset($object->n_events_rooms_170)? $object->n_events_rooms_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_places', 1), 'name' => 'nEventsPlaces', 'value' => Input::old('nEventsPlaces', isset($object->n_events_places_170)? $object->n_events_places_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('hotels::pulsar.restaurant'), 'icon' => 'fa fa-cutlery'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'restaurantName', 'value' => Input::old('restaurantName', isset($object->restaurant_name_170)? $object->restaurant_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.cuisine'), 'name' => 'cuisine', 'value' => Input::old('cuisine', isset($object->cuisine_171)? $object->cuisine_171 : null), 'maxLength' => '255', 'rangeLength' => '2,255'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.special_dish'), 'name' => 'specialDish', 'value' => Input::old('specialDish', isset($object->special_dish_171)? $object->special_dish_171 : null), 'maxLength' => '255', 'rangeLength' => '2,255'])
            @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('hotels::pulsar.terrace'), 'name' => 'restaurantTerrace', 'value' => 1, 'isChecked' => Input::old('restaurantTerrace', isset($object->restaurant_terrace_170)? true : false)])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', ['label' => 'Country Chef', 'name' => 'countryChefRestaurant', 'value' => 1, 'isChecked' => Input::old('countryChefRestaurant', isset($object->country_chef_restaurant_170)? true : false)])
            @include('pulsar::includes.html.form_text_group', ['label' => 'T.C.C. URL', 'name' => 'countryChefUrl', 'value' => Input::old('countryChefUrl', isset($object->country_chef_url_170)? $object->country_chef_url_170 : null), 'maxLength' => '255', 'rangeLength' => '2,255'])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.type', 1), 'name' => 'restaurantType', 'value' => Input::old('restaurantType', isset($object->restaurant_type_170)? $object->restaurant_type_170 : null), 'objects' => $restaurantTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'minimum-results-for-search' => -1]])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('hotels::pulsar.booking_data'), 'icon' => 'fa fa-bed'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 5, 'label' => trans('hotels::pulsar.booking_email'), 'name' => 'bookingEmail', 'value' => Input::old('bookingEmail', isset($object->booking_email_170)? $object->booking_email_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'type' => 'email'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('hotels::pulsar.booking_url'), 'name' => 'web', 'value' => Input::old('web', isset($object->web_170)? $object->web_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.geolocation', 1), 'icon' => 'fa fa-map-signs'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'address', 'value' => Input::old('address', isset($object->address_170)? $object->address_170 : null), 'maxLength' => '150', 'rangeLength' => '2,150'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'country', 'name' => 'country', 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'col-md-12 select2', 'required' => true, 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'error-placement' => 'select2-country-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => Input::old('cp'), 'maxLength' => '10', 'rangeLength' => '2,10', 'fieldSize' => 4])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => Input::old('locality'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.latitude'), 'name' => 'latitude', 'value' => Input::old('latitude', isset($object->latitude_170)? $object->latitude_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.longitude'), 'name' => 'longitude', 'value' => Input::old('longitude', isset($object->longitude_170)? $object->longitude_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
        </div>
        <div class="col-md-6">
            <div id="locationMapWrapper"></div>
        </div>
    </div>
    <!-- /hotels::hotels.create -->
@stop

@section('box_tab2')
    @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.construction'), 'name' => 'construction', 'value' => Input::old('construction', isset($object->construction_171)? $object->construction_171 : null), 'maxLength' => '255', 'rangeLength' => '2,255'])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.description_title'), 'name' => 'descriptionTitle', 'value' => Input::old('descriptionTitle', isset($object->description_title_171)? $object->description_title_171 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans_choice('pulsar::pulsar.description', 1), 'name' => 'description', 'value' => Input::old('description', isset($object->description_171)? $object->description_171 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.activities'), 'name' => 'activities'])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.indications'), 'name' => 'indications'])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.interest_points'), 'name' => 'interestPoints'])
@stop

@section('box_tab3')
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.company_name'), 'name' => 'billingCompanyName', 'value' => Input::old('billingCompanyName', isset($object->billing_company_name_170)? $object->billing_company_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'billingName', 'value' => Input::old('billingName', isset($object->billing_name_170)? $object->billing_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.surname'), 'name' => 'billingSurname', 'value' => Input::old('billingSurname', isset($object->billing_surname_170)? $object->billing_surname_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.tin'), 'name' => 'billingTin', 'value' => Input::old('billingTin', isset($object->billing_tin_170)? $object->billing_tin_170 : null), 'maxLength' => '50', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'billingPhone', 'value' => Input::old('billingPhone', isset($object->billing_phone_170)? $object->billing_phone_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'billingEmail', 'value' => Input::old('billingEmail', isset($object->billing_email_170)? $object->billing_email_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'type' => 'email'])
            @include('pulsar::includes.html.form_text_group',
                ['fieldSize' => 2, 'label' => trans('pulsar::pulsar.iban'), 'name' => 'billingIbanCountry', 'value' => Input::old('billingIbanCountry', isset($object->billing_email_170)? $object->billing_email_170 : null), 'maxLength' => '2', 'rangeLength' => '2,2', 'inputs' => [
                ['fieldSize' => 2, 'name' => 'billingIbanCheckDigits', 'value' => Input::old('billingIbanCheckDigits'), 'maxLength' => '2', 'rangeLength' => '2,2'],
                ['fieldSize' => 6, 'name' => 'billingIbanBasicBankAccountNumber', 'value' => Input::old('billingIbanBasicBankAccountNumber'), 'maxLength' => '30', 'rangeLength' => '15,30']
            ]])
            @include('pulsar::includes.html.form_text_group', ['fieldSize' => 4, 'label' => trans('pulsar::pulsar.bic'), 'name' => 'billingBic', 'value' => Input::old('billingBic', isset($object->billing_bic_170)? $object->billing_bic_170 : null), 'maxLength' => '11', 'rangeLength' => '8,11'])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'billingAddress', 'value' => Input::old('billingAddress', isset($object->billing_address_170)? $object->billing_address_170 : null), 'maxLength' => '150', 'rangeLength' => '2,150'])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'billingCountry', 'name' => 'billingCountry', 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'error-placement' => 'select2-country-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea1Wrapper', 'labelId' => 'billingTerritorialArea1Label', 'name' => 'billingTerritorialArea1', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea2Wrapper', 'labelId' => 'billingTerritorialArea2Label', 'name' => 'billingTerritorialArea2', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea3Wrapper', 'labelId' => 'billingTerritorialArea3Label', 'name' => 'billingTerritorialArea3', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_text_group', ['fieldSize' => 4, 'label' => trans('pulsar::pulsar.cp'), 'name' => 'billingCp', 'value' => Input::old('billingCp'), 'maxLength' => '10', 'rangeLength' => '2,10'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'billingLocality', 'value' => Input::old('billingLocality'), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
        </div>
    </div>
@stop

@section('box_tab4')
    Imágenes
@stop

@section('box_tab5')
    Videos
@stop