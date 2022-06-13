@extends(Theme::getThemeNamespace() . '::views.real-estate.account.master')
@section('content')

@php
    Theme::layout('account');
    $user = auth('account')->user();
@endphp
    <div class="settings">
        <h3 class="mt-3">أشترك لاضافة مزايدة</h3>
   
        <p class="mt-3">حتى تستطيع ان تزايد في اي من المزادات المتاحة <br/>
        في الموقع ويتم سحب هذا المبلغ اذا تم فوزك بالمزاد</p>
        <div class="p-3 mb-3 bg-white date-section">
            <ul class="list-group list-group-horizontal">
                <li class="p-0 fs-14px pb-2 col-4 border-0 list-group-item">تاريخ الاشتراك</li>
                <li class="p-0 fs-14px pb-2 col-8 border-0 list-group-item"><i class="far fa-clock"></i> 12-12-2022 11:25 PM</li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="p-0 fs-14px col-4 border-0 list-group-item">أسم الحساب</li>
                <i class="far fa-user"></i><li class="p-0 fs-14px col-8 border-0 list-group-item">{{ $user->name }}</li>
            </ul>
        </div>
        <h4 class="mt-3">تفاصيل الدفع</h4>
        <div class="p-3 bg-white date-section mb-3">
            <ul class="pb-2 list-group list-group-horizontal">
                <li class="p-0 fs-14px col-4 border-0 list-group-item">{!! $package->name !!}</li>
                <li class="p-0 fs-14px col-8 border-0 list-group-item"> {!! $package->price !!}  {!! $package->currency->title !!}</li>
            </ul>
            <ul class="pb-2 list-group list-group-horizontal">
                <li class="p-0 fs-14px col-4 border-0 list-group-item">ضريبة</li>
                <li class="p-0 fs-14px col-8 border-0 list-group-item">0 {!! $package->currency->title !!}</li>
            </ul>
            <ul class="pb-2 list-group list-group-horizontal">
                <li class="p-0 fs-14px col-4 border-0 list-group-item">المجموع الكلى</li>
                <li class="p-0 fs-14px col-8 border-0 list-group-item">{!! $package->price !!}  {!! $package->currency->title !!}</li>
            </ul>
        </div>
            <div class="row justify-content-center">
                <div class="col-xs-12">
                    {!! do_shortcode('[payment-form currency="' . strtoupper($package->currency->title) . '" amount="' . $package->price . '" name="' . $package->name . '" return_url="' . route('public.account.packages') . '" callback_url="' . route('public.account.package.subscribe.callback', $package->id) . '"][/payment-form]') !!}
                </div>
            </div>

@stop
