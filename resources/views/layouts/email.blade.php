<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">
    <style>
        @media screen {
            @font-face {
              font-family: 'Hi Melody';
              font-style: normal;
              font-weight: 400;
              src: url(https://fonts.gstatic.com/l/font?kit=46ktlbP8Vnz0pJcqCTbEendatjM6ffcvw_MW2hsZzAp7hxfk1rF1yP2rK7U&skey=6a76567185dc5b13&v=v13) format('woff2');
           }
        }

        td {
            font-family:'Hi Melody', ui-sans-serif;
            font-size: 24px;
            vertical-align: top;
            box-sizing: border-box;
        }

        p {
            font-family:'Hi Melody', ui-sans-serif;
            font-size: 24px;
            font-weight: normal;
            margin: 0 0 15px 0;
        }
    </style>

    <title>@yield('title')</title>
</head>
<body style="background-color: #f3f4f6; font-family:'Hi Melody', ui-sans-serif; line-height:1.5; font-size: 24px; margin:0; padding:0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
<table class="body" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0; mso-table-rspace: 0; width:100%; background-color: #f3f4f6; ">
    <tr>
        <td>&nbsp;</td>
        <td class="container" style="display: block;margin: 0 auto;max-width: 580px;padding: 10px;width: 580px;">
            {{-- START CENTERED WHITE CONTAINER --}}
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
                @yield('preheader')
            </span>

            <div>
                {{-- START HEADER --}}
                <table class="main bg-primary" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0; mso-table-rspace: 0; width:100%; border-radius:3px; background-color: #fbbf24;">
                    <tr>
                        <td class="wrapper" style="padding: 5px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <img src="{{ $message->embed(public_path() . '/img/iconKado.png') }}" alt="" style="height: 100px;" />
                                    </td>
                                    <td style="color:white; padding-bottom: 10px; vertical-align: middle; font-size: 68px;">
                                        Verlanglijstjes
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                {{-- END HEADER --}}

                <table class="main bg-white" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0; mso-table-rspace: 0; width:100%; border-radius:3px; background-color:white;">
                    {{-- START INTRO AREA --}}
                    <tr>
                        <td class="wrapper intro" style="padding:20px;">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        @yield('intro')
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- END INTRO AREA --}}

                    {{-- START MAIN CONTENT AREA --}}
                    <tr>
                        <td class="wrapper main-content" style="padding:0; margin: 0;">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        @yield('content')
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- END MAIN CONTENT AREA --}}
                </table>
            </div>

            {{-- START FOOTER --}}
            <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-block" style="color: #999999; font-size: 12px; text-align: center; padding-bottom: 10px; padding-top: 10px;">
                            <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">
                                <a href="https://verlanglijstjes.famderuiter.com" style="text-decoration: none;color: inherit;">Fam de Ruiter Verlanglijstjes</a>
                            </span>
                            {{--<br> Don't like these emails? <a href="{{ env('APP_URL') }}/unsubscribe" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">Unsubscribe</a>.--}}
                        </td>
                    </tr>
                </table>
            </div>
            {{-- END FOOTER --}}

            {{-- END CENTERED WHITE CONTAINER --}}
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>
