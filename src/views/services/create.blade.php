@extends('pulsar::layouts.form', ['action' => 'store'])

@section('rows')
    <!-- hotels::services.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id',  'value' => Input::old('name', isset($object->id_153)? $object->id_153 : null), 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_image_group', ['label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name', isset($object->name_153)? $object->name_153 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    <!-- /hotels::services.create -->
@stop