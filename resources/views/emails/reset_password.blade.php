<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ trans('post.uxbert_blog_title')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div style="margin:0;padding:0;font-family:Helvetica,Arial,sans-serif;color:#40474c;font-size:14px;width:100% !important;background:#f9f9f9;">

    <table style="margin:0;padding:0;font-family:Helvetica,Arial,sans-serif;color:#40474c;font-size:14px;border-collapse:separate !important;width:100%!important">

        <tr>
            <td align="left" style="margin:0;padding: 0;font-family:Helvetica,Arial,sans-serif;color:#40474c;font-size:14px;width:100% !important;color:#8a8d93;">

                <div style="height:40px;background-color:#0079ad;position:relative;line-height:14px;font-size:12px;color:#8a8d93;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif">
                    <div style="position:absolute;top:0;left:20px; background:url('/images/uxbert.png') no-repeat 0 0; width:100px;height:80px;display:block;"></div>
                </div>

            </td>
        </tr>

        <tr>
            <td align="left" style="margin:0;padding:50px 20px 50px;font-family:Helvetica,Arial,sans-serif;color:#40474c;font-size:15px;width:100% !important;color:#8a8d93;">

                <div style="line-height:14px;color:#8a8d93;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif">
                    {{ trans('user.dear')}} <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                </div>

                <div style="margin:20px 0 0;padding:0;">
                    {{ trans('user.click_reset')}}<br>
                    <span style="color:#0079ad;"><a href="{{ url('user/resetPassword/'.$remember_token) }}">{{ url('user/resetPassword/'.$remember_token) }}</a></span>
                </div>

                <div style="margin:20px 0 0;padding:0;">
                    {{trans('user.thanks')}}
                </div>

            </td>
        </tr>

    </table>

</div>

</body>
</html>
