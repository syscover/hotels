<!-- hotels::hotels.breadcrumbs -->
<li>
    <a href="javascript:void(0)">{{ trans('hotels::pulsar.package_name') }}</a>
</li>
<li class="current">
    <a href="{{ route($routeSuffix, [session('baseLang')->id_001]) }}">{{ trans_choice($objectTrans, 2) }}</a>
</li>
<!-- ./hotels::hotels.breadcrumbs -->