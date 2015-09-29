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
    <!-- Froala -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/froala_editor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/froala_style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/char_counter.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/code_view.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/file.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/fullscreen.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/image.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/line_breaker.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/table.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/video.css') }}">
    <!-- /Froala -->

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2.custom/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
    <!-- Froala -->
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/froala_editor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/char_counter.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/align.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/code_view.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/colors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/entities.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/file.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/fullscreen.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/image.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/image_manager.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/inline_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/link.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/paragraph_format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/paragraph_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/quote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/table.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/save.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/url.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/video.min.js') }}"></script>
    @if(config('app.locale') != 'en')
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/languages/' . config('app.locale') . '.js') }}"></script>
    @endif
    <!-- /Froala -->

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>
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

                countryValue:               '{{ Input::old('country', isset($object->country_170)? $object->country_170 : null) }}',
                territorialArea1Value:      '{{ Input::old('territorialArea1', isset($object->territorial_area_1_170)? $object->territorial_area_1_170 : null) }}',
                territorialArea2Value:      '{{ Input::old('territorialArea2', isset($object->territorial_area_2_170)? $object->territorial_area_2_170 : null) }}',
                territorialArea3Value:      '{{ Input::old('territorialArea3', isset($object->territorial_area_3_170)? $object->territorial_area_3_170 : null) }}'
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

                countryValue:               '{{ Input::old('billingCountry', isset($object->billing_country_170)? $object->billing_country_170 : null) }}',
                territorialArea1Value:      '{{ Input::old('billingTerritorialArea1', isset($object->billing_territorial_area_1_170)? $object->billing_territorial_area_1_170 : null) }}',
                territorialArea2Value:      '{{ Input::old('billingTerritorialArea2', isset($object->billing_territorial_area_2_170)? $object->billing_territorial_area_2_170 : null) }}',
                territorialArea3Value:      '{{ Input::old('billingTerritorialArea3', isset($object->billing_territorial_area_3_170)? $object->billing_territorial_area_3_170 : null) }}'
            });

            $.mapPoint({
                id:                 '01',
                urlPlugin:          '/packages/syscover/pulsar/vendor',
                customIcon:         {
                    src: '/packages/syscover/hotels/images/location.svg',
                    scaledWidth: 49,
                    scaledHeight: 71,
                    anchorX: 25,
                    anchorY: 71
                }
            });

            $('.wysiwyg').froalaEditor({
                language: '{{ config('app.locale') }}',
                toolbarInline: false,
                toolbarSticky: true,
                tabSpaces: true,
                shortcutsEnabled: ['show', 'bold', 'italic', 'underline', 'strikeThrough', 'indent', 'outdent', 'undo', 'redo', 'insertImage', 'createLink'],
                toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'insertHR', 'insertLink', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
                heightMin: 130,
                enter: $.FroalaEditor.ENTER_BR,
                key: 'PC-9eA-7arfC2zxF-10xv=='
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
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name', isset($object->name_170)? $object->name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true, 'readOnly' => isset($object->id_170)])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.web'), 'name' => 'web', 'value' => Input::old('web', isset($object->web_170)? $object->web_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'placeholder' => 'mydomain.com', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.contact', 1), 'name' => 'contact', 'value' => Input::old('contact', isset($object->contact_170)? $object->contact_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.phone', 1), 'name' => 'phone', 'value' => Input::old('phone', isset($object->phone_170)? $object->phone_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.fax'), 'name' => 'fax', 'value' => Input::old('fax', isset($object->fax_170)? $object->fax_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'readOnly' => isset($object->id_170)])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.web_url'), 'name' => 'webUrl', 'value' => Input::old('webUrl', isset($object->web_url_170)? $object->web_url_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'placeholder' => 'http://www.mydomain.com', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => Input::old('email', isset($object->email_170)? $object->email_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'type' => 'email', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.mobile'), 'name' => 'mobile', 'value' => Input::old('mobile', isset($object->mobile_170)? $object->mobile_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'readOnly' => isset($object->id_170)])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('pulsar::pulsar.access'), 'icon' => 'fa fa-check-circle-o'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.password'), 'type' => 'password' ,'name' => 'password', 'value' => Input::old('password'), 'maxLength' => '50', 'rangeLength' => '4,50', 'fieldSize' => 8, 'required' => true])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.repeat_password'), 'type' => 'password' , 'name' => 'repassword', 'value' => Input::old('repassword'), 'maxLength' => '50', 'rangeLength' => '4,50', 'fieldSize' => 8, 'required' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans('hotels::pulsar.published'), 'name' => 'published[]', 'value' => Input::old('published', isset($object->relationship_170)? $object->relationship_170 : null), 'objects' => $publications, 'idSelect' => 'id_174', 'nameSelect' => 'name_174', 'multiple' => true, 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'isChecked' => Input::old('active', isset($object->active_170)? true : false), 'disabled' => isset($object->id_170)? true : null])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.feature', 2), 'icon' => 'fa fa-bookmark'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.environment', 1), 'name' => 'environment', 'value' => Input::old('environment', isset($object->environment_170)? $object->environment_170 : null), 'objects' => $environments, 'idSelect' => 'id_150', 'nameSelect' => 'name_150', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.decoration', 1), 'name' => 'decoration', 'value' => Input::old('decoration', isset($object->decoration_170)? $object->decoration_170 : null), 'objects' => $decorations, 'idSelect' => 'id_151', 'nameSelect' => 'name_151', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('hotels::pulsar.relationship', 1), 'name' => 'relationship', 'value' => Input::old('relationship', isset($object->relationship_170)? $object->relationship_170 : null), 'objects' => $relationships, 'idSelect' => 'id_152', 'nameSelect' => 'name_152', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'disabled' => isset($object->id_170)? true : null]])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_rooms', 1), 'name' => 'nRooms', 'value' => Input::old('nRooms', isset($object->n_rooms_170)? $object->n_rooms_170 : null), 'maxLength' => '50', 'rangeLength' => '1,50', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_places', 1), 'name' => 'nPlaces', 'value' => Input::old('nPlaces', isset($object->n_places_170)? $object->n_places_170 : null), 'maxLength' => '50', 'rangeLength' => '1,50', 'readOnly' => isset($object->id_170)])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.company', 2), 'icon' => 'fa fa-building'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_rooms', 1), 'name' => 'nEventsRooms', 'value' => Input::old('nEventsRooms', isset($object->n_events_rooms_170)? $object->n_events_rooms_170 : null), 'maxLength' => '50', 'rangeLength' => '1,50', 'readOnly' => isset($object->id_170)])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('hotels::pulsar.number_places', 1), 'name' => 'nEventsRoomsPlaces', 'value' => Input::old('nEventsRoomsPlaces', isset($object->n_events_rooms_places_170)? $object->n_events_rooms_places_170 : null), 'maxLength' => '50', 'rangeLength' => '1,50', 'readOnly' => isset($object->id_170)])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('hotels::pulsar.restaurant'), 'icon' => 'fa fa-cutlery'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'restaurantName', 'value' => Input::old('restaurantName', isset($object->restaurant_name_170)? $object->restaurant_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.cuisine'), 'name' => 'cuisine', 'value' => Input::old('cuisine', isset($object->cuisine_171)? $object->cuisine_171 : null), 'maxLength' => '255', 'rangeLength' => '2,255'])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('hotels::pulsar.special_dish'), 'name' => 'specialDish', 'value' => Input::old('specialDish', isset($object->special_dish_171)? $object->special_dish_171 : null), 'maxLength' => '255', 'rangeLength' => '2,255'])
            @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('hotels::pulsar.terrace'), 'name' => 'restaurantTerrace', 'value' => 1, 'isChecked' => Input::old('restaurantTerrace', isset($object->restaurant_terrace_170)? true : false), 'disabled' => isset($object->id_170)? true : null])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', ['label' => 'Country Chef', 'name' => 'countryChefRestaurant', 'value' => 1, 'isChecked' => Input::old('countryChefRestaurant', isset($object->country_chef_restaurant_170)? true : false), 'disabled' => isset($object->id_170)? true : null])
            @include('pulsar::includes.html.form_text_group', ['label' => 'T.C.C. URL', 'name' => 'countryChefUrl', 'value' => Input::old('countryChefUrl', isset($object->country_chef_url_170)? $object->country_chef_url_170 : null), 'maxLength' => '255', 'rangeLength' => '2,255', 'placeholder' => 'http://www.thecountrychef.es/', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.type', 1), 'name' => 'restaurantType', 'value' => Input::old('restaurantType', isset($object->restaurant_type_170)? $object->restaurant_type_170 : null), 'objects' => $restaurantTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'class' => 'form-control select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'minimum-results-for-search' => -1, 'disabled' => isset($object->id_170)? true : null]])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('hotels::pulsar.booking_data'), 'icon' => 'fa fa-bed'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 5, 'label' => trans('hotels::pulsar.booking_email'), 'name' => 'bookingEmail', 'value' => Input::old('bookingEmail', isset($object->booking_email_170)? $object->booking_email_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'type' => 'email', 'readOnly' => isset($object->id_170)])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('hotels::pulsar.booking_url'), 'name' => 'bookingUrl', 'value' => Input::old('bookingUrl', isset($object->booking_url_170)? $object->booking_url_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'placeholder' => 'http://www.booking.com/', 'readOnly' => isset($object->id_170)])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.geolocation', 1), 'icon' => 'fa fa-map-signs'])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'address', 'value' => Input::old('address', isset($object->address_170)? $object->address_170 : null), 'maxLength' => '150', 'rangeLength' => '2,150', 'readOnly' => isset($object->id_170)])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'country', 'name' => 'country', 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'col-md-12 select2', 'required' => true, 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'error-placement' => 'select2-country-outer-container', 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea1Wrapper', 'labelId' => 'territorialArea1Label', 'name' => 'territorialArea1', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea2Wrapper', 'labelId' => 'territorialArea2Label', 'name' => 'territorialArea2', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'territorialArea3Wrapper', 'labelId' => 'territorialArea3Label', 'name' => 'territorialArea3', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.cp'), 'name' => 'cp', 'value' => Input::old('cp', isset($object->cp_170)? $object->cp_170 : null), 'maxLength' => '10', 'rangeLength' => '2,10', 'fieldSize' => 4, 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'locality', 'value' => Input::old('locality', isset($object->locality_170)? $object->locality_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6, 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.latitude'), 'name' => 'latitude', 'value' => Input::old('latitude', isset($object->latitude_170)? $object->latitude_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.longitude'), 'name' => 'longitude', 'value' => Input::old('longitude', isset($object->longitude_170)? $object->longitude_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
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
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans_choice('pulsar::pulsar.description', 1), 'name' => 'description', 'value' => Input::old('description', isset($object->description_171)? $object->description_171 : null)])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.activities'), 'name' => 'activities', 'value' => Input::old('activities', isset($object->activities_171)? $object->activities_171 : null)])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.indications'), 'name' => 'indications', 'value' => Input::old('indications', isset($object->indications_171)? $object->indications_171 : null)])
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans('hotels::pulsar.interest_points'), 'name' => 'interestPoints', 'value' => Input::old('interestPoints', isset($object->interest_points_171)? $object->interest_points_171 : null)])
@stop

@section('box_tab3')
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.company_name'), 'name' => 'billingCompanyName', 'value' => Input::old('billingCompanyName', isset($object->billing_company_name_170)? $object->billing_company_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'billingName', 'value' => Input::old('billingName', isset($object->billing_name_170)? $object->billing_name_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.surname'), 'name' => 'billingSurname', 'value' => Input::old('billingSurname', isset($object->billing_surname_170)? $object->billing_surname_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.tin'), 'name' => 'billingTin', 'value' => Input::old('billingTin', isset($object->billing_tin_170)? $object->billing_tin_170 : null), 'maxLength' => '50', 'rangeLength' => '2,100', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.phone'), 'name' => 'billingPhone', 'value' => Input::old('billingPhone', isset($object->billing_phone_170)? $object->billing_phone_170 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'billingEmail', 'value' => Input::old('billingEmail', isset($object->billing_email_170)? $object->billing_email_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'type' => 'email', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group',
                ['fieldSize' => 2, 'label' => trans('pulsar::pulsar.iban'), 'name' => 'billingIbanCountry', 'value' => Input::old('billingIbanCountry', isset($object->billing_iban_country_170)? $object->billing_iban_country_170 : null), 'maxLength' => '2', 'rangeLength' => '2,2', 'readOnly' => isset($object->id_170), 'inputs' => [
                ['fieldSize' => 2, 'name' => 'billingIbanCheckDigits', 'value' => Input::old('billingIbanCheckDigits', isset($object->billing_iban_check_digits_170)? $object->billing_iban_check_digits_170 : null), 'maxLength' => '2', 'rangeLength' => '2,2', 'readOnly' => isset($object->id_170)],
                ['fieldSize' => 6, 'name' => 'billingIbanBasicBankAccountNumber', 'value' => Input::old('billingIbanBasicBankAccountNumber', isset($object->billing_iban_basic_bank_account_number_170)? $object->billing_iban_basic_bank_account_number_170 : null), 'maxLength' => '30', 'rangeLength' => '15,30', 'readOnly' => isset($object->id_170)]
            ]])
            @include('pulsar::includes.html.form_text_group', ['fieldSize' => 4, 'label' => trans('pulsar::pulsar.bic'), 'name' => 'billingBic', 'value' => Input::old('billingBic', isset($object->billing_bic_170)? $object->billing_bic_170 : null), 'maxLength' => '11', 'rangeLength' => '8,11', 'readOnly' => isset($object->id_170)])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.address', 1), 'name' => 'billingAddress', 'value' => Input::old('billingAddress', isset($object->billing_address_170)? $object->billing_address_170 : null), 'maxLength' => '150', 'rangeLength' => '2,150', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.country', 1), 'id' => 'billingCountry', 'name' => 'billingCountry', 'idSelect' => 'id_002', 'nameSelect' => 'name_002', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'error-placement' => 'select2-country-outer-container', 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea1Wrapper', 'labelId' => 'billingTerritorialArea1Label', 'name' => 'billingTerritorialArea1', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea2Wrapper', 'labelId' => 'billingTerritorialArea2Label', 'name' => 'billingTerritorialArea2', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_select_group', ['containerId' => 'billingTerritorialArea3Wrapper', 'labelId' => 'billingTerritorialArea3Label', 'name' => 'billingTerritorialArea3', 'class' => 'col-md-12 select2', 'style' => 'width:100%', 'data' => ['language' => config('app.locale'), 'disabled' => isset($object->id_170)? true : null]])
            @include('pulsar::includes.html.form_text_group', ['fieldSize' => 4, 'label' => trans('pulsar::pulsar.cp'), 'name' => 'billingCp', 'value' => Input::old('billingCp', isset($object->billing_cp_170)? $object->billing_cp_170 : null), 'maxLength' => '10', 'rangeLength' => '2,10', 'readOnly' => isset($object->id_170)])
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.locality'), 'name' => 'billingLocality', 'value' => Input::old('billingLocality', isset($object->billing_locality_170)? $object->billing_locality_170 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'fieldSize' => 6, 'readOnly' => isset($object->id_170)])
        </div>
    </div>
@stop

@section('box_tab4')
    Imágenes
@stop

@section('box_tab5')
    Videos
@stop