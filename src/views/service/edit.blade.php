@extends('pulsar::layouts.form', ['action' => 'update'])

@section('head')
    @parent
    @include('pulsar::includes.js.delete_translation_record')
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // launch slug function when change name and slug
            $("[name=name], [name=slug]").on('change', function(){
                $("[name=slug]").val(getSlug($(this).val(),{
                    separator: '-',
                    lang: '{{ $lang->id_001 }}'
                }));
                $.checkSlug();
            });
        });

        <!-- Check slug -->
        $.checkSlug = function() {
            $.ajax({
                dataType:   'json',
                type:       'POST',
                url:        '{{ route('apiCheckSlugHotelsService') }}',
                data:       {
                    lang:   '{{ $lang->id_001 }}',
                    slug:   $('[name=slug]').val(),
                    id:     $('[name=id]').val()
                },
                headers:  {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success:  function(data)
                {
                    $("[name=slug]").val(data.slug);
                }
            });
        }
    </script>
@stop

@section('rows')
    <!-- hotels::services.edit -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id',  'value' => $object->id_153, 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_image_group', ['label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_153, 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.slug'), 'name' => 'slug', 'value' => $object->slug_153, 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.icon', 1), 'fieldSize' => 5, 'name' => 'icon', 'value' => $object->icon_153, 'maxLength' => '50', 'rangeLength' => '2,50'])
    <!-- /hotels::services.edit -->
@stop