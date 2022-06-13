@extends('core/base::layouts.master')
@section('content')
    {!! Form::open(['url' => url('/admin/real-estate/sentNotification'), 'class' => 'main-setting-form']) !!}
    <div class="max-width-1200">

        <!-- Dashboard Notifications -->
        <div class="flexbox-annotated-section">
            <div class="flexbox-annotated-section-annotation">
                <div class="annotated-section-title pd-all-20">
                    <h2>ارسال اشعارات للمستخدمين</h2>
                </div>
            </div>
            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group">
                        <label class="text-title-field"
                            for="real_estate_square_unit">ارسال الاشعار</label>
                        <div class="ui-select-wrapper">
                            <textarea class="next-input form-control" name="notification" id="analytics_service_account_credentials" rows="5" placeholder="Send Notification For All Users"></textarea>
                            <svg class="svg-next-icon svg-next-icon-size-16">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="flexbox-annotated-section" style="border: none">
            <div class="flexbox-annotated-section-annotation">
                &nbsp;
            </div>
            <div class="flexbox-annotated-section-content">
                <button class="btn btn-info"
                    type="submit">ارسال</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>



<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
var pusher = new Pusher('33d53518960b80189496', {
    cluster: 'eu',
        encrypted: false,
});
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    // this is called when the event notification is received...
});
</script>
@endpush
