<?php

/**
 * Copyright (c) 2017 Gouda Elalfy, All Rights Reserved.
 *
 * @author        Gouda Elalfy <goudaelalfy@hotmail.com>
 * @link          http://stackoverflow.com/users/4675055/gouda-elalfy
 * @version       1.0
 */

?>

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
                    {{ trans('user.dear')}} <strong>{{ $user->first_name }} {{ $user->family_name }}</strong>
                </div>

                <div style="color:#0079ad;text-overflow:ellipsis;font-size:18px;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;padding:0;margin:8px 0 0;">
                    {!! $email_body !!}
                </div>

                <div style="margin:20px 0 0;padding:0;">
                    <a href="{{ URL::to('user/activate/'.$user->remember_token) }}"><i class="fa fa-plus" aria-hidden="true"></i> {{trans('user.activate')}}</a>
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