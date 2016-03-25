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
        'objectId'          => isset($object)? $object->id_170 : null])
    @include('pulsar::includes.js.check_slug', ['route' => 'apiCheckSlugHotel'])
    @include('hotels::hotel.includes.common_script')
    @include('pulsar::includes.js.custom_fields', [
        'resource' => 'hotels-hotel'
    ])
    @include('pulsar::includes.js.delete_translation_record')
@stop

@section('layoutTabHeader')
    @include('pulsar::includes.html.form_record_header')
@stop
@section('layoutTabFooter')
    @include('pulsar::includes.html.form_record_footer')
@stop

@section('box_tab1')
    <!-- hotels::hotels.create -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => 'ID',
                'fieldSize' => 4,
                'name' => 'id',
                'value' => old('id', isset($object->id_170)? $object->id_170 : null),
                'readOnly' => true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', [
                'label' => 'ID',
                'fieldSize' => 4,
                'label' => trans_choice('pulsar::pulsar.language', 1),
                'name' => 'lang',
                'nameImage' => $lang->name_001,
                'value' => $lang->id_001,
                'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', [
        'labelSize' => 1,
        'fieldSize' => 11,
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object->name_170)? $object->name_170 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'required' => true,
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'labelSize' => 1,
        'fieldSize' => 11,
        'label' => trans('pulsar::pulsar.slug'),
        'name' => 'slug',
        'value' => old('slug', isset($object->slug_170)? $object->slug_170 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true,
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.web'),
                'name' => 'web',
                'value' => old('web', isset($object->web_170)? $object->web_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'placeholder' => 'mydomain.com',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans_choice('pulsar::pulsar.contact', 1),
                'name' => 'contact',
                'value' => old('contact', isset($object->contact_170)? $object->contact_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans_choice('pulsar::pulsar.phone', 1),
                'name' => 'phone',
                'value' => old('phone', isset($object->phone_170)? $object->phone_170 : null),
                'maxLength' => '50',
                'rangeLength' => '2,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.fax'),
                'name' => 'fax',
                'value' => old('fax', isset($object->fax_170)? $object->fax_170 : null),
                'maxLength' => '50',
                'rangeLength' => '2,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('hotels::pulsar.web_url'),
                'name' => 'webUrl',
                'value' => old('webUrl', isset($object->web_url_170)? $object->web_url_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'placeholder' => 'http://www.mydomain.com',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.email'),
                'name' => 'email',
                'value' => old('email', isset($object->email_170)? $object->email_170 : null),
                'maxLength' => '50',
                'rangeLength' => '2,50',
                'type' => 'email',
                'required' => true,
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.mobile'),
                'name' => 'mobile',
                'value' => old('mobile', isset($object->mobile_170)? $object->mobile_170 : null),
                'maxLength' => '50',
                'rangeLength' => '2,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_select_group', [
                'fieldSize' => 7,
                'label' => trans_choice('pulsar::pulsar.field_group', 1),
                'name' => 'customFieldGroup',
                'value' => old('customFieldGroup', isset($object->custom_field_group_170)? $object->custom_field_group_170 : null),
                'objects' => $customFieldGroups,
                'idSelect' => 'id_025',
                'nameSelect' => 'name_025'
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans('pulsar::pulsar.access'),
        'icon' => 'fa fa-check-circle-o'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans_choice('pulsar::pulsar.user', 1),
                'name' => 'user',
                'value' => old('user', isset($object->user_170)? $object->user_170 : null),
                'maxLength' => '50',
                'rangeLength' => '2,50',
                'fieldSize' => 6,
                'required' => true,
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.password'),
                'type' => 'password',
                'name' => 'password',
                'value' => old('password'),
                'maxLength' => '50',
                'rangeLength' => '4,50',
                'required' => $action == 'store'? true : false,
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.repeat_password'),
                'type' => 'password' ,
                'name' => 'repassword',
                'value' => old('repassword'),
                'maxLength' => '50',
                'rangeLength' => '4,50',
                'required' => $action == 'store'? true : false,
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', [
                'label' => trans('hotels::pulsar.published'),
                'name' => 'published[]',
                'value' => old('published', isset($object)? $object->getPublications : null),
                'objects' => $publications,
                'idSelect' => 'id_174',
                'nameSelect' => 'name_174',
                'multiple' => true,
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-section-outer-container',
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_checkbox_group', [
                'label' => trans('pulsar::pulsar.active'),
                'name' => 'active',
                'value' => 1,
                'checked' => old('active', isset($object)? $object->active_170 : null),
                'disabled' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('hotels::pulsar.service', 2),
        'icon' => 'fa fa-star'
    ])
    @include('pulsar::includes.html.form_dual_list_group', [
        'name' => 'services',
        'value' => old('countries'),
        'objectsSelect' => isset($object)? $object->getServices->where('lang_153', $lang->id_001) : null,
        'objects' => $services,
        'idSelect' => 'id_153',
        'nameSelect' => 'name_153',
        'idList1' => 1,
        'idList2' => 2,
        'labelList1' => trans('hotels::pulsar.services_list'),
        'labelList2' => trans('hotels::pulsar.selected_services'),
        'required' => true
    ])

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.feature', 2),
        'icon' => 'fa fa-bookmark'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', [
                'label' => trans_choice('hotels::pulsar.environment', 1),
                'name' => 'environment',
                'value' => old('environment', isset($object->environment_170)? $object->environment_170 : null),
                'objects' => $environments,
                'idSelect' => 'id_150',
                'nameSelect' => 'name_150',
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-section-outer-container',
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'label' => trans_choice('hotels::pulsar.decoration', 1),
                'name' => 'decoration',
                'value' => old('decoration', isset($object->decoration_170)? $object->decoration_170 : null),
                'objects' => $decorations,
                'idSelect' => 'id_151',
                'nameSelect' => 'name_151',
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-section-outer-container',
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'label' => trans_choice('hotels::pulsar.relationship', 1),
                'name' => 'relationship',
                'value' => old('relationship', isset($object->relationship_170)? $object->relationship_170 : null),
                'objects' => $relationships,
                'idSelect' => 'id_152',
                'nameSelect' => 'name_152',
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-section-outer-container',
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('hotels::pulsar.number_rooms'),
                'name' => 'nRooms',
                'value' => old('nRooms', isset($object->n_rooms_170)? $object->n_rooms_170 : null),
                'maxLength' => '50',
                'rangeLength' => '1,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('hotels::pulsar.number_places'),
                'name' => 'nPlaces',
                'value' => old('nPlaces', isset($object->n_places_170)? $object->n_places_170 : null),
                'maxLength' => '50',
                'rangeLength' => '1,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.company', 2),
        'icon' => 'fa fa-building'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans_choice('hotels::pulsar.meeting_rooms', 1),
                'name' => 'nEventsRooms',
                'value' => old('nEventsRooms', isset($object->n_events_rooms_170)? $object->n_events_rooms_170 : null),
                'maxLength' => '50',
                'rangeLength' => '1,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans_choice('hotels::pulsar.capacity', 1),
                'name' => 'nEventsRoomsPlaces',
                'value' => old('nEventsRoomsPlaces', isset($object->n_events_rooms_places_170)? $object->n_events_rooms_places_170 : null),
                'maxLength' => '50',
                'rangeLength' => '1,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans('hotels::pulsar.restaurant'),
        'icon' => 'fa fa-cutlery'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.name'),
                'name' => 'restaurantName',
                'value' => old('restaurantName', isset($object->restaurant_name_170)? $object->restaurant_name_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('hotels::pulsar.cuisine'),
                'name' => 'cuisine',
                'value' => old('cuisine', isset($object->cuisine_171)? $object->cuisine_171 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255'
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('hotels::pulsar.special_dish'),
                'name' => 'specialDish',
                'value' => old('specialDish', isset($object->special_dish_171)? $object->special_dish_171 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255'
            ])
            @include('pulsar::includes.html.form_checkbox_group', [
                'label' => trans('hotels::pulsar.terrace'),
                'name' => 'restaurantTerrace',
                'value' => 1,
                'checked' => old('restaurantTerrace', isset($object)? $object->restaurant_terrace_170 : null),
                'disabled' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', [
                'label' => 'Country Chef',
                'name' => 'countryChefRestaurant',
                'value' => 1,
                'checked' => old('countryChefRestaurant', isset($object)? $object->country_chef_restaurant_170 : null),
                'disabled' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => 'T.C.C. URL',
                'name' => 'countryChefUrl',
                'value' => old('countryChefUrl', isset($object->country_chef_url_170)? $object->country_chef_url_170 : null),
                'maxLength' => '255',
                'rangeLength' => '2,255',
                'placeholder' => 'http://www.thecountrychef.es/',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_select_group', [
                'label' => trans_choice('pulsar::pulsar.type', 1),
                'name' => 'restaurantType',
                'value' => old('restaurantType', isset($object->restaurant_type_170)? $object->restaurant_type_170 : null),
                'objects' => $restaurantTypes,
                'idSelect' => 'id',
                'nameSelect' => 'name',
                'class' => 'select2',
                'data' => [
                    'language' => config('app.locale'),
                    'width' => '100%',
                    'error-placement' => 'select2-section-outer-container',
                    'minimum-results-for-search' => -1,
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans('hotels::pulsar.booking_data'),
        'icon' => 'fa fa-bed'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'labelSize' => 1,
        'fieldSize' => 5,
        'label' => trans('hotels::pulsar.booking_email'),
        'name' => 'bookingEmail',
        'value' => old('bookingEmail', isset($object->booking_email_170)? $object->booking_email_170 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'type' => 'email',
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'labelSize' => 1,
        'fieldSize' => 11,
        'label' => trans('hotels::pulsar.booking_url'),
        'name' => 'bookingUrl',
        'value' => old('bookingUrl', isset($object->booking_url_170)? $object->booking_url_170 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'placeholder' => 'http://www.booking.com/',
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.geolocation', 1),
        'icon' => 'fa fa-map-signs'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'labelSize' => 1,
        'fieldSize' => 11,
        'label' => trans_choice('pulsar::pulsar.address', 1),
        'name' => 'address',
        'value' => old('address', isset($object->address_170)? $object->address_170 : null),
        'maxLength' => '150',
        'rangeLength' => '2,150',
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', [
                'label' => trans_choice('pulsar::pulsar.country', 1),
                'id' => 'country',
                'name' => 'country',
                'idSelect' => 'id_002',
                'nameSelect' => 'name_002',
                'class' => 'col-md-12 select2',
                'required' => true,
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'error-placement' => 'select2-country-outer-container',
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'containerId' => 'territorialArea1Wrapper',
                'labelId' => 'territorialArea1Label',
                'name' => 'territorialArea1',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'containerId' => 'territorialArea2Wrapper',
                'labelId' => 'territorialArea2Label',
                'name' => 'territorialArea2',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'containerId' => 'territorialArea3Wrapper',
                'labelId' => 'territorialArea3Label',
                'name' => 'territorialArea3',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.cp'),
                'name' => 'cp',
                'value' => old('cp', isset($object->cp_170)? $object->cp_170 : null),
                'maxLength' => '10',
                'rangeLength' => '2,10',
                'fieldSize' => 4,
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.locality'),
                'name' => 'locality',
                'value' => old('locality', isset($object->locality_170)? $object->locality_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'fieldSize' => 6,
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.latitude'),
                'name' => 'latitude',
                'value' => old('latitude', isset($object->latitude_170)? $object->latitude_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.longitude'),
                'name' => 'longitude',
                'value' => old('longitude', isset($object->longitude_170)? $object->longitude_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            <div id="locationMapWrapper"></div>
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.custom_field', 2),
        'icon' => 'fa fa-align-left',
        'containerId' => 'headerCustomFields'
    ])
    <div id="wrapperCustomFields"></div>
    <!-- ./hotels::hotels.create -->
@stop

@section('box_tab2')
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('hotels::pulsar.construction'),
        'name' => 'construction',
        'value' => old('construction', isset($object->construction_171)? $object->construction_171 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255'
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('hotels::pulsar.description_title'),
        'name' => 'descriptionTitle',
        'value' => old('descriptionTitle', isset($object->description_title_171)? $object->description_title_171 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100'
    ])
    @include('pulsar::includes.html.form_wysiwyg_group', [
        'label' => trans_choice('pulsar::pulsar.description', 1),
        'name' => 'description',
        'value' => old('description', isset($object->description_171)? $object->description_171 : null)
    ])
    @include('pulsar::includes.html.form_wysiwyg_group', [
        'label' => trans('hotels::pulsar.activities'),
        'name' => 'activities',
        'value' => old('activities', isset($object->activities_171)? $object->activities_171 : null)
    ])
    @include('pulsar::includes.html.form_wysiwyg_group', [
        'label' => trans('hotels::pulsar.indications'),
        'name' => 'indications',
         'value' => old('indications', isset($object->indications_171)? $object->indications_171 : null)
    ])
    @include('pulsar::includes.html.form_wysiwyg_group', [
        'label' => trans('hotels::pulsar.interest_points'),
        'name' => 'interestPoints',
        'value' => old('interestPoints', isset($object->interest_points_171)? $object->interest_points_171 : null)
    ])
@stop

@section('box_tab3')
    @include('pulsar::includes.html.form_text_group', [
        'labelSize' => 1,
        'fieldSize' => 11,
        'label' => trans('pulsar::pulsar.company_name'),
        'name' => 'billingCompanyName',
        'value' => old('billingCompanyName', isset($object->billing_company_name_170)? $object->billing_company_name_170 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.name'),
                'name' => 'billingName',
                'value' => old('billingName', isset($object->billing_name_170)? $object->billing_name_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.surname'),
                'name' => 'billingSurname',
                'value' => old('billingSurname', isset($object->billing_surname_170)? $object->billing_surname_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.tin'),
                'name' => 'billingTin',
                'value' => old('billingTin', isset($object->billing_tin_170)? $object->billing_tin_170 : null),
                'maxLength' => '50',
                'rangeLength' => '2,100',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.phone'),
                'name' => 'billingPhone',
                'value' => old('billingPhone', isset($object->billing_phone_170)? $object->billing_phone_170 : null),
                'maxLength' => '50',
                'rangeLength' => '2,50',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.email'),
                'name' => 'billingEmail',
                'value' => old('billingEmail', isset($object->billing_email_170)? $object->billing_email_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'type' => 'email',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'fieldSize' => 2,
                'label' => trans('pulsar::pulsar.iban'),
                'name' => 'billingIbanCountry',
                'value' => old('billingIbanCountry', isset($object->billing_iban_country_170)? $object->billing_iban_country_170 : null),
                'maxLength' => '2',
                'rangeLength' => '2,2',
                'readOnly' => $action == 'update' || $action == 'store'? false : true,
                'inputs' => [
                    [
                        'fieldSize' => 2,
                        'name' => 'billingIbanCheckDigits',
                        'value' => old('billingIbanCheckDigits', isset($object->billing_iban_check_digits_170)? $object->billing_iban_check_digits_170 : null),
                        'maxLength' => '2',
                        'rangeLength' => '2,2',
                        'readOnly' => $action == 'update' || $action == 'store'? false : true
                    ],
                    [
                        'fieldSize' => 6,
                        'name' => 'billingIbanBasicBankAccountNumber',
                        'value' => old('billingIbanBasicBankAccountNumber', isset($object->billing_iban_basic_bank_account_number_170)? $object->billing_iban_basic_bank_account_number_170 : null),
                        'maxLength' => '30',
                        'rangeLength' => '15,30',
                        'readOnly' => $action == 'update' || $action == 'store'? false : true
                    ]
                ]
            ])
            @include('pulsar::includes.html.form_text_group', [
                'fieldSize' => 4,
                'label' => trans('pulsar::pulsar.bic'),
                'name' => 'billingBic',
                'value' => old('billingBic', isset($object->billing_bic_170)? $object->billing_bic_170 : null),
                'maxLength' => '11',
                'rangeLength' => '8,11',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans_choice('pulsar::pulsar.address', 1),
                'name' => 'billingAddress',
                'value' => old('billingAddress', isset($object->billing_address_170)? $object->billing_address_170 : null),
                'maxLength' => '150',
                'rangeLength' => '2,150',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_select_group', [
                'label' => trans_choice('pulsar::pulsar.country', 1),
                'id' => 'billingCountry',
                'name' => 'billingCountry',
                'idSelect' => 'id_002',
                'nameSelect' => 'name_002',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'error-placement' => 'select2-country-outer-container',
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'containerId' => 'billingTerritorialArea1Wrapper',
                'labelId' => 'billingTerritorialArea1Label',
                'name' => 'billingTerritorialArea1',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'containerId' => 'billingTerritorialArea2Wrapper',
                'labelId' => 'billingTerritorialArea2Label',
                'name' => 'billingTerritorialArea2',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_select_group', [
                'containerId' => 'billingTerritorialArea3Wrapper',
                'labelId' => 'billingTerritorialArea3Label',
                'name' => 'billingTerritorialArea3',
                'class' => 'col-md-12 select2',
                'style' => 'width:100%',
                'data' => [
                    'language' => config('app.locale'),
                    'disabled' => $action == 'update' || $action == 'store'? false : true
                ]
            ])
            @include('pulsar::includes.html.form_text_group', [
                'fieldSize' => 4,
                'label' => trans('pulsar::pulsar.cp'),
                'name' => 'billingCp',
                'value' => old('billingCp', isset($object->billing_cp_170)? $object->billing_cp_170 : null),
                'maxLength' => '10',
                'rangeLength' => '2,10',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.locality'),
                'name' => 'billingLocality',
                'value' => old('billingLocality', isset($object->billing_locality_170)? $object->billing_locality_170 : null),
                'maxLength' => '100',
                'rangeLength' => '2,100',
                'fieldSize' => 6,
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
    </div>
@stop

@section('box_tab4')
    @include('pulsar::includes.html.attachment', [
        'action'            => 'create',
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
                            <img src="{{ asset(config('market.attachmentFolder') . '/' . $product->id_111 . '/' . $product->lang_112 . '/' . $attachmentsProducts[$product->id_111]->file_name_016) }}" class="img-respontive" style="max-height:200px;margin: 0 auto">
                        @endif
                    </div>
                    <div class="col-md-9 card-body">
                        <div class="row">
                            <div class="col-md-9 card-title">
                                <h4>{{ $product->name_112 }}</h4>
                            </div>
                            <div class="col-md-3 card-toggle">
                                <div class="make-switch" data-on-label="<i class='fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                                    <input type="checkbox" class="toggle product-toggle" name="p{{ $product->id_111 }}" value="{{ $product->id_111 }}" {{ old('p' . $product->id_111) || isset($hotelProducts[$product->id_111])? 'checked' : null }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 card-description">
                                <textarea rows="3" placeholder="{{ trans_choice('pulsar::pulsar.description', 1) }}" class="form-control wysiwyg" name="d{{ $product->id_111 }}">{{ old('d' . $product->id_111, isset($hotelProducts[$product->id_111])? $hotelProducts[$product->id_111]->description_177 : null) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- ./list products -->
    </div>
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'products',
        'value' => $hotelProductsIds
    ])
@stop

@section('endBody')
    <!--TODO: Implementar botón para añadir fotografías desde la librería-->
    <div id="attachment-library-mask">
        <div id="attachment-library-content">
            {{ trans('pulsar::pulsar.drag_files') }}
        </div>
    </div>
@stop