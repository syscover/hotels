<script type="text/javascript">
    $(document).ready(function() {
        // to hotel data
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
        })

        // to billing data
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
        })

        $.mapPoint({
            id:                 '01',
            urlPlugin:          '/packages/syscover/pulsar/vendor',
            @if(!empty($object->latitude_170))lat: {{ $object->latitude_170 }},@endif
            @if(!empty($object->longitude_170))lng: {{ $object->longitude_170 }},@endif
            zoom:               12,
            showMarker:         true,
            customIcon:         {
                src: '/packages/syscover/hotels/images/location.svg',
                scaledWidth: 49,
                scaledHeight: 71,
                anchorX: 25,
                anchorY: 71
            }
        })

        $('.wysiwyg').froalaEditor({
            language: '{{ config('app.locale') }}',
            toolbarInline: false,
            toolbarSticky: true,
            tabSpaces: true,
            shortcutsEnabled: ['show', 'bold', 'italic', 'underline', 'strikeThrough', 'indent', 'outdent', 'undo', 'redo', 'insertImage', 'createLink'],
            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'insertHR', 'insertLink', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
            heightMin: 130,
            enter: $.FroalaEditor.ENTER_BR,
            key: '{{ config('pulsar.froalaEditorKey') }}'
        })

        // custom Dual multi select
        $.configureBoxes({
            textShowing: '{{ trans('pulsar::pulsar.showing') }}',
            textOf: '{{ trans('pulsar::pulsar.of') }}'
        })

        // launch slug function when change name and slug
        $("[name=name], [name=slug]").on('change', function(){
            $("[name=slug]").val(getSlug($(this).val(),{
                separator: '-',
                lang: '{{ $lang->id_001 }}'
            }));
            $.checkSlug()
        })

        // save id product to save it after
        $(".product-toggle").on('change', function() {
            var products = JSON.parse($('[name=products]').val());
            if($(this).is(':checked'))
            {
                products.push($(this).val());
            }
            else
            {
                var i = products.indexOf($(this).val());
                if(i != -1)
                    products.splice(i, 1);
            }
            $('[name=products]').val(JSON.stringify(products));
        })

        // set tab active
        @if($tab == 0)
        $('.tabbable li:eq(0) a').tab('show')
        @elseif($tab == 1)
        $('.tabbable li:eq(1) a').tab('show')
        @elseif($tab == 2)
        $('.tabbable li:eq(2) a').tab('show')
        @elseif($tab == 3)
        $('.tabbable li:eq(3) a').tab('show')
        @elseif($tab == 4)
        $('.tabbable li:eq(4) a').tab('show')
        @endif

    });
</script>