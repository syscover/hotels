@extends('pulsar::layouts.tab', ['tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('hotels::pulsar.hotel', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.description', 2)],
        ['id' => 'box_tab3', 'name' => trans('hotels::pulsar.billing_data')],
        ['id' => 'box_tab4', 'name' => trans_choice('pulsar::pulsar.attachment', 2)],
        ['id' => 'box_tab5', 'name' => trans_choice('market::pulsar.product', 2)],
    ]])

@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/mappoint/css/mappoint.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/attachment/css/attachment-library.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/css/getfile.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/select-listdescription/select-listdescription.css') }}">

    <script src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cssloader/js/jquery.cssloader.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/mobiledetect/mdetect.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/js/jquery.getfile.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/duallistbox/jquery.duallistbox.1.3.1.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/mappoint/js/jquery.mappoint.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('api.googleMapsApiKey') }}&libraries=places"></script>

    @include('pulsar::includes.html.froala_references')

    <script src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>
    @include('pulsar::includes.js.attachment', [
        'resource'          => 'hotels-hotel',
        'routesConfigFile'  => 'hotels',
        'objectId'          => $object->id_170])
    @include('pulsar::includes.js.check_slug', ['route' => 'apiCheckSlugHotel'])
    @include('hotels::hotel.includes.common_script', ['action' => 'edit'])
    @include('pulsar::includes.js.custom_fields', ['resource' => 'hotels-hotel', 'action' => 'edit'])
    @include('pulsar::includes.js.delete_translation_record')
@stop

@section('layoutTabHeader')
    @include('pulsar::includes.html.form_record_header', ['action' => 'update'])
@stop
@section('layoutTabFooter')
    @include('pulsar::includes.html.form_record_footer', ['action' => 'update'])
@stop

@section('box_tab1')
    <!-- hotels::hotels.edit -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'fieldSize' => 4, 'name' => 'id',  'value' => $object->id_170, 'readOnly' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', ['label' => 'ID', 'fieldSize' => 4, 'label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_170, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.slug'), 'name' => 'slug', 'value' => $object->slug_170, 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.web'), 'name' => 'web', 'value' => $object->web_170, 'maxLength' => '100', 'rangeLength' => '2,100', 'placeholder' => 'mydomain.com'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.contact', 1), 'name' => 'contact', 'value' => $object->contact_170, 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.phone', 1), 'name' => 'phone', 'value' => $object->phone_170, 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.fax'), 'name' => 'fax', 'value' => $object->fax_170, 'maxLength' => '50', 'rangeLength' => '2,50'])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.web_url'), 'name' => 'webUrl', 'value' => $object->web_url_170, 'maxLength' => '100', 'rangeLength' => '2,100', 'placeholder' => 'http://www.mydomain.com'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => $object->email_170, 'maxLength' => '50', 'rangeLength' => '2,50', 'type' => 'email', 'required' => true])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.mobile'), 'name' => 'mobile', 'value' => $object->mobile_170, 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_select_group', ['fieldSize' => 7, 'label' => trans_choice('pulsar::pulsar.field_group', 1), 'name' => 'customFieldGroup', 'value' => $object->custom_field_group_170, 'objects' => $customFieldGroups, 'idSelect' => 'id_025', 'nameSelect' => 'name_025'])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('pulsar::pulsar.access'), 'icon' => 'fa fa-check-circle-o'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.user', 1), 'name' => 'user', 'value' => $object->user_170, 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 6, 'required' => true])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.password'), 'type' => 'password' ,'name' => 'password', 'maxLength' => '50', 'rangeLength' => '4,50', 'fieldSize' => 8])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.repeat_password'), 'type' => 'password' , 'name' => 'repassword', 'maxLength' => '50', 'rangeLength' => '4,50', 'fieldSize' => 8])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans('hotels::pulsar.published'), 'name' => 'published[]', 'value' => $object->getPublications, 'objects' => $publications, 'idSelect' => 'id_174', 'nameSelect' => 'name_174', 'multiple' => true, 'class' => 'select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container']])
            @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => $object->active_170])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('hotels::pulsar.service', 2), 'icon' => 'fa fa-star'])
    @include('pulsar::includes.html.form_dual_list_group', ['name' => 'services', 'value' => old('countries'), 'objectsSelect' => $object->getServices->where('lang_153', $lang->id_001), 'objects' => $services, 'idSelect' => 'id_153', 'nameSelect' => 'name_153', 'idList1' => 1, 'idList2' => 2, 'labelList1' => trans('hotels::pulsar.services_list'), 'labelList2' => trans('hotels::pulsar.selected_services'), 'required' => true])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.feature', 2), 'icon' => 'fa fa-bookmark'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.environment', 1), 'name' => 'environment', 'value' => $object->environment_170, 'objects' => $environments, 'idSelect' => 'id_150', 'nameSelect' => 'name_150', 'class' => 'select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.decoration', 1), 'name' => 'decoration', 'value' => $object->decoration_170, 'objects' => $decorations, 'idSelect' => 'id_151', 'nameSelect' => 'name_151', 'class' => 'select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.relationship', 1), 'name' => 'relationship', 'value' => $object->relationship_170, 'objects' => $relationships, 'idSelect' => 'id_152', 'nameSelect' => 'name_152', 'class' => 'select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container']])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.number_rooms'), 'name' => 'nRooms', 'value' => $object->n_rooms_170, 'maxLength' => '50', 'rangeLength' => '1,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.number_places'), 'name' => 'nPlaces', 'value' => $object->n_places_170, 'maxLength' => '50', 'rangeLength' => '1,50'])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.company', 2), 'icon' => 'fa fa-building'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.meeting_rooms', 1), 'name' => 'nEventsRooms', 'value' => $object->n_events_rooms_170, 'maxLength' => '50', 'rangeLength' => '1,50'])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_places', 1), 'name' => 'nEventsRoomsPlaces', 'value' => $object->n_events_rooms_places_170, 'maxLength' => '50', 'rangeLength' => '1,50'])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('hotels::pulsar.restaurant'), 'icon' => 'fa fa-cutlery'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'restaurantName', 'value' => $object->restaurant_name_170, 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.cuisine'), 'name' => 'cuisine', 'value' => $object->cuisine_171, 'maxLength' => '255', 'rangeLength' => '2,255'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.special_dish'), 'name' => 'specialDish', 'value' => $object->special_dish_171, 'maxLength' => '255', 'rangeLength' => '2,255'])
            @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('hotels::pulsar.terrace'), 'name' => 'restaurantTerrace', 'value' => 1, 'checked' => isset($object->restaurant_terrace_170)? true : false])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', ['label' => 'Country Chef', 'name' => 'countryChefRestaurant', 'value' => 1, 'checked' => $object->country_chef_restaurant_170])
            @include('pulsar::includes.html.form_text_group', ['label' => 'T.C.C. URL', 'name' => 'countryChefUrl', 'value' => $object->country_chef_url_170, 'maxLength' => '255', 'rangeLength' => '2,255', 'placeholder' => 'http://www.thecountrychef.es/'])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.type', 1), 'name' => 'restaurantType', 'value' => $object->restaurant_type_170, 'objects' => $restaurantTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'class' => 'select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'minimum-results-for-search' => -1]])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('hotels::pulsar.booking_data'), 'icon' => 'fa fa-bed'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 5, 'label' => trans('hotels::pulsar.booking_email'), 'name' => 'bookingEmail', 'value' => $object->booking_email_170, 'maxLength' => '50', 'rangeLength' => '2,50', 'type' => 'email'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('hotels::pulsar.booking_url'), 'name' => 'bookingUrl', 'value' => $object->booking_url_170, 'maxLength' => '100', 'rangeLength' => '2,100', 'placeholder' => 'http://www.booking.com/'])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.geolocation', 1), 'icon' => 'fa fa-map-signs'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'address', 'value' => $object->address_170, 'maxLength' => '150', 'rangeLength' => '2,150'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'country', 'name' => 'country', 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'col-md-12 select2', 'required' => true, 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'error-placement' => 'select2-country-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => $object->cp_170, 'maxLength' => '10', 'rangeLength' => '2,10', 'fieldSize' => 4])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => $object->locality_170, 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.latitude'), 'name' => 'latitude', 'value' => $object->latitude_170, 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.longitude'), 'name' => 'longitude', 'value' => $object->longitude_170, 'maxLength' => '100', 'rangeLength' => '2,100'])
        </div>
        <div class="col-md-6">
            <div id="locationMapWrapper"></div>
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.custom_field', 2), 'icon' => 'fa fa-align-left', 'containerId' => 'headerCustomFields'])
    <div id="wrapperCustomFields"></div>
    <!-- /hotels::hotels.edit -->
@stop

@section('box_tab2')
    @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.construction'), 'name' => 'construction', 'value' => $object->construction_171, 'maxLength' => '255', 'rangeLength' => '2,255'])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.description_title'), 'name' => 'descriptionTitle', 'value' => $object->description_title_171, 'maxLength' => '100', 'rangeLength' => '2,100'])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans_choice('pulsar::pulsar.description', 1), 'name' => 'description', 'value' => $object->description_171])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.activities'), 'name' => 'activities', 'value' => $object->activities_171])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.indications'), 'name' => 'indications', 'value' => $object->indications_171])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.interest_points'), 'name' => 'interestPoints', 'value' => $object->interest_points_171])
@stop

@section('box_tab3')
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.company_name'), 'name' => 'billingCompanyName', 'value' => $object->billing_company_name_170, 'maxLength' => '100', 'rangeLength' => '2,100'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'billingName', 'value' => $object->billing_name_170, 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.surname'), 'name' => 'billingSurname', 'value' => $object->billing_surname_170, 'maxLength' => '100', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.tin'), 'name' => 'billingTin', 'value' => $object->billing_tin_170, 'maxLength' => '50', 'rangeLength' => '2,100'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'billingPhone', 'value' => $object->billing_phone_170, 'maxLength' => '50', 'rangeLength' => '2,50'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'billingEmail', 'value' => $object->billing_email_170, 'maxLength' => '100', 'rangeLength' => '2,100', 'type' => 'email'])
            @include('pulsar::includes.html.form_text_group',
                ['fieldSize' => 2, 'label' => trans('pulsar::pulsar.iban'), 'name' => 'billingIbanCountry', 'value' => $object->billing_iban_country_170, 'maxLength' => '2', 'rangeLength' => '2,2', 'inputs' => [
                ['fieldSize' => 2, 'name' => 'billingIbanCheckDigits', 'value' => $object->billing_iban_check_digits_170, 'maxLength' => '2', 'rangeLength' => '2,2'],
                ['fieldSize' => 6, 'name' => 'billingIbanBasicBankAccountNumber', 'value' => $object->billing_iban_basic_bank_account_number_170, 'maxLength' => '30', 'rangeLength' => '15,30']
            ]])
            @include('pulsar::includes.html.form_text_group', ['fieldSize' => 4, 'label' => trans('pulsar::pulsar.bic'), 'name' => 'billingBic', 'value' => $object->billing_bic_170, 'maxLength' => '11', 'rangeLength' => '8,11'])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'billingAddress', 'value' => $object->billing_address_170, 'maxLength' => '150', 'rangeLength' => '2,150'])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'billingCountry', 'name' => 'billingCountry', 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'error-placement' => 'select2-country-outer-container']])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea1Wrapper', 'labelId' => 'billingTerritorialArea1Label', 'name' => 'billingTerritorialArea1', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea2Wrapper', 'labelId' => 'billingTerritorialArea2Label', 'name' => 'billingTerritorialArea2', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea3Wrapper', 'labelId' => 'billingTerritorialArea3Label', 'name' => 'billingTerritorialArea3', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale')]])
            @include('pulsar::includes.html.form_text_group', ['fieldSize' => 4, 'label' => trans('pulsar::pulsar.cp'), 'name' => 'billingCp', 'value' => $object->billing_cp_170, 'maxLength' => '10', 'rangeLength' => '2,10'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'billingLocality', 'value' => $object->billing_locality_170, 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6])
        </div>
    </div>
@stop

@section('box_tab4')
    @include('pulsar::includes.html.attachment', [
        'action'            => 'edit',
        'routesConfigFile'  => 'hotels'])
@stop

@section('box_tab5')
    <div class="row content-product">
        <!-- list products -->
        @foreach($products as $product)
            <div class="col-md-12 card">
                <div class="row">
                    <div class="col-md-3 card-image">
                        @if(isset($attachmentsProducts[$product->id_111]))
                            <img src="{{ asset(config('market.attachmentFolder') . '/' . $product->id_111 . '/' . $product->lang_112 . '/' . $attachmentsProducts[$product->id_111]->file_name_016) }}" class="img-responsive" style="max-height:200px;margin: 0 auto">
                        @endif
                    </div>
                    <div class="col-md-9 card-body">
                        <div class="row">
                            <div class="col-md-9 card-title">
                                <h4>{{ $product->name_112 }}</h4>
                            </div>
                            <div class="col-md-3 card-toggle">
                                <div class="make-switch" data-on-label="<i class='fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                                    <input type="checkbox" class="toggle product-toggle" name="p{{ $product->id_111 }}" value="{{ $product->id_111 }}" {{ isset($hotelProducts[$product->id_111])? 'checked' : null }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 card-description">
                                <textarea rows="3" placeholder="{{ trans_choice('pulsar::pulsar.description', 1) }}" class="form-control wysiwyg" name="d{{ $product->id_111 }}">{{ isset($hotelProducts[$product->id_111])? $hotelProducts[$product->id_111]->description_177 : null }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- /list products -->
    </div>
    @include('pulsar::includes.html.form_hidden', ['name' => 'products', 'value' => $hotelProductsIds])
@stop

@section('endBody')
    <!--TODO: Implementar botón para añadir fotografías desde la librería-->
    <div id="attachment-library-mask">
        <div id="attachment-library-content">
            {{ trans('pulsar::pulsar.drag_files') }}
        </div>
    </div>
@stop