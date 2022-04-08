    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    </head>
    <body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#e8ebef">
        @php
            $logo = get_setting('header_logo');
        @endphp
        <tr>
            <td align="center" valign="top" class="container" style="padding:50px 10px;">

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            <table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                                <tr>
                                    <td class="td" bgcolor="#ffffff" style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                            <tr>
                                                <td class="p30-15-0" style="padding-top: 40px">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <th class="column" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td class="img m-center" style="font-size:0pt; line-height:0pt; text-align:center;">
                                                                            <a href="{{ env('APP_URL') }}" target="_blank" class="link" style="color:#000001; text-decoration:none;">
                                                                                <img src="{{ uploaded_asset($logo) }}" width="191" height="50" border="0" alt="" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px">
                                                        <tr>
                                                            <td style="padding: 10px; text-align:center; display: block;
                                                             color: #fff; background-color: #f57224;
                                                             font-family: 'DejaVuSans', 'sans-serif'">
                                                                <h1 style="font-size: 25px">Verify Your Identity</h1>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="background-color: #eeeeee">
                                            <tr>
                                                <td class="p30-15" style="padding: 20px 30px 50px 30px;">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td class="h5 pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:16px; line-height:26px; padding-bottom:30px; color: #000">
                                                                <p>Hi {{ $array['name'] }},</p>
                                                                <p>In order to protect your account security, we need to verify your identity.
                                                                Please enter the below mentioned 6 digit code into the Email Verification page.</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td >
                                                                <table style=""width="100%">
                                                                    <tr>
                                                                        <td style="font-family:'Ubuntu', Arial,sans-serif; padding: 30px;text-align: center;background-color: #ffffff; font-size: 40px;color: #f57224;font-weight: bold;">
                                                                            {{ $array['code'] }}
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="h5 pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:16px; line-height:26px; padding-top:30px;">
                                                                Thank you and have a nice day,<br/>
                                                                Shoppinghat.
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="width: 100%; background-color: #ffffff; padding: 20px; " >
                                            <tr>
                                                <td class="text-footer" style="color:#1f2125; font-family:'Fira Mono', Arial,sans-serif; font-size:12px; line-height:22px; text-align:center;">
                                                    <span style="font-size: 20px; font-weight: bold">Need Help?</span>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="h5 pb30" style="font-family:'Ubuntu', Arial,sans-serif;
                                                text-align: center;
                                                padding-bottom: 10px;
                                                font-size:12px; line-height:26px;">
                                                    Happy to assist you. Our representatives are available 7 days a week.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">
                                                    <a href="{{ env('APP_URL') }}/contact-us" target="_blank"
                                                       style="text-decoration: none; padding: 10px; background-color: #f57224; color: #ffffff; border-radius: 5px">Contact Us</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

    </body>
    </html>
