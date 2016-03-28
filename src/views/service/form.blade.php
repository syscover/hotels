@extends('pulsar::layouts.form')

@section('head')
    @parent
    <script src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>
    <script>
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
    </script>

    @include('pulsar::includes.js.check_slug', [
        'route' => 'apiCheckSlugHotelsService',
        'lang'  => $lang->id_001
    ])
    @include('pulsar::includes.js.delete_translation_record')
@stop

@section('rows')
    <!-- hotels::service.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('name', isset($object->id_153)? $object->id_153 : null),
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_image_group', [
        'label' => trans_choice('pulsar::pulsar.language', 1),
        'name' => 'lang',
        'nameImage' => $lang->name_001,
        'value' => $lang->id_001,
        'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object->name_153)? $object->name_153 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.slug'),
        'name' => 'slug',
        'value' => old('slug', isset($object->slug_153)? $object->slug_153 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.icon', 1),
        'fieldSize' => 5,
        'name' => 'icon',
        'value' => old('icon', isset($object->icon_153)? $object->icon_153 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50'
    ])
    <!-- ./hotels::service.create -->
@stop