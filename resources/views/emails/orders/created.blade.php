@php

$backgroundColor = '#f1f2f6';
$primaryColor = '#2f3640';


@endphp

<html>
<head>
    <meta charset="utf-8">
    <title>OrderConfirmationEmail</title>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto+Slab");
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700");

        @font-face {
            font-family: "Takeaway Sans Regular";
            font-style: normal;
            font-weight: 400;
            src: url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-regular.eot");
            src: local("Takeaway Sans Regular"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-regular.eot?#iefix") format("embedded-opentype"), url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-regular.woff2") format("woff2"), url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-regular.woff") format("woff"), url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-regular.ttf") format("truetype");
        }

        @font-face {
            font-family: "Takeaway Sans Bold";
            font-style: normal;
            font-weight: 700;
            src: url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-bold.eot");
            src: local("Takeaway Sans Bold"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-bold.eot?#iefix") format("embedded-opentype"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-bold.woff2") format("woff2"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-bold.woff") format("woff"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-bold.ttf") format("truetype");
        }

        @font-face {
            font-family: "Takeaway Sans Campaign";
            font-style: normal;
            font-weight: 700;
            src: url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-campaign.eot");
            src: local("Takeaway Sans Campaign"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-campaign.eot?#iefix") format("embedded-opentype"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-campaign.woff2") format("woff2"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-campaign.woff") format("woff"),
            url("https://assets.takeaway.com/fonts/takeaway-sans/takeaway-sans-campaign.ttf") format("truetype");
        }

        @font-face {
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 400;
            src: url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-regular.eot");
            src: local("Open Sans"), local("OpenSans"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-regular.eot?#iefix") format("embedded-opentype"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-regular.woff2") format("woff2"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-regular.woff") format("woff"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-regular.ttf") format("truetype");
        }

        @font-face {
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 600;
            src: url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-600.eot");
            src: local("Open Sans Semibold"), local("OpenSans-Semibold"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-600.eot?#iefix") format("embedded-opentype"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-600.woff2") format("woff2"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-600.woff") format("woff"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-600.ttf") format("truetype");
        }

        @font-face {
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 700;
            src: url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-700.eot");
            src: local("Open Sans Bold"), local("OpenSans-Bold"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-700.eot?#iefix") format("embedded-opentype"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-700.woff2") format("woff2"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-700.woff") format("woff"),
            url("https://assets.takeaway.com/fonts/opensans/open-sans-v13-latin-700.ttf") format("truetype");
        }
    </style>
</head>
<body style="background-color: {{ $backgroundColor }}; margin: 0; padding: 0;" bgcolor="{{ $backgroundColor }}">
<center>
    <table style="background-color: {{ $backgroundColor }};" bgcolor="{{ $backgroundColor }}" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>&nbsp;</td>
            <td width="570">
                <table align="center" cellspacing="0" cellpadding="0" style="min-width: 320px; max-width: 570px;">
                    <tr>
                        <td align="center">
                            <table cellspacing="0" cellpadding="0" width="100%">
                                <tr><td height="40">&nbsp;</td></tr>
                                <tr>
                                    <td align="center" height="72" bgcolor="{{ $primaryColor }}" style="background-color: {{ $primaryColor }};">
                                        <a href="https://frieslandbezorgd.nl" style="text-decoration: none;" target="_blank">
                                            Friesland Bezorgd
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table width="90%" cellspacing="0" cellpadding="0" style="font-size: 24px; font-family: 'Takeaway Sans Regular', Avant Garde, Century Gothic, Helvetica, Arial, sans-serif; color: #0A3847;">
                                <tr>
                                    <td align="center">
                                        <table cellspacing="0" cellpadding="0" width="90%" style="font-size: 24px; font-family: 'Takeaway Sans Regular', Avant Garde, Century Gothic, Helvetica, Arial, sans-serif; color: #0A3847;">
                                            <tr>
                                                <td align="center" height="120" style="line-height: 30px;">
                                                    <strong>
                                                        Hallo Leo Flapper,<br>dankjewel voor je bestelling!
                                                    </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="font-size: 14px; line-height: 30px; font-family: 'Roboto Slab', 'Open Sans', Helvetica, Arial, sans-serif;">
                                                    We hebben je bestelling verwerkt en verzonden naar {{ $order->company->name }}. Het bestelnummer is: <strong>{{ $order->number }}</strong>. Heb je vragen of opmerkingen over je bestelling? Neem dan telefonisch contact op met het restaurant via
                                                    <a href="tel:{{ $order->company->telephone }}" style="color: {{ $primaryColor }}; text-decoration: none;">{{ $order->company->telephone  }}</a>.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr><td height="20" style="border-bottom:1px solid #e9e9e9; line-height: 20px;">&nbsp;</td></tr>


                                <tr><td height="30" style="line-height: 30px;">&nbsp;</td></tr>
                                <tr>
                                    <td align="center">
                                        <!-- header image //-->
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr bgcolor="{{ $backgroundColor }}">
                                                <td height="46">&nbsp;</td>
                                                <td height="46">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- header image end //-->

                                        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="{{ $backgroundColor }}" style="background-color: {{ $backgroundColor }}; color: #0A3847;">
                                            <tr>
                                                <td align="center">
                                                    <table cellspacing="0" cellpadding="0" width="90%" style="color: #0A3847;">
                                                        <tr>
                                                            <td class="restaurantName" height="36" align="left" style="font-size: 18px; line-height:36px;">
                                                                <strong> {{ $order->company->name }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <!-- start order //-->
                                                                <table width="100%" style="font-size: 14px; color: #0A3847; font-family: 'Open Sans', Helvetica, Arial, sans-serif;" cellspacing="0" cellpadding="1">

                                                                    @foreach($order->orderProducts as $orderProduct)
                                                                        <tr><td colspan='3' height='15' style='line-height:15px;'>&nbsp;</td></tr>
                                                                        <tr>
                                                                            <td align='left' valign='top' width='10%' style='line-height:32px; width: 10%;'>{{ $orderProduct->quantity }}</td>
                                                                            <td align='left' width='75%' height='32' style='line-height:32px; width: 75%;'>{{ $orderProduct->name }}</td>
                                                                            <td align='right' valign='top' width='15%' height='32' style='line-height:32px; width:15%;'> @currency($orderProduct->price * $orderProduct->quantity)</td>
                                                                        </tr>
                                                                    @endforeach

                                                                </table>
                                                                <!-- end order //-->
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td height="15" style="border-bottom: 1px solid #e9e9e9; line-height: 15px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td height="15" style="line-height: 15px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px;">
                                                                <table cellspacing="0" cellpadding="0" width="100%" style="color: #0A3847; font-family: 'Open Sans', Helvetica, Arial, sans-serif;">


                                                                    <tr>
                                                                        <td align="left" width="60%" height="30" style="line-height: 30px; width: 60%;">Bezorgkosten</td>
                                                                        <td align="right" height="30" style="line-height: 30px;">@if(0 !== $order->shipping_price) @currency($order->shipping_price) @else Gratis @endif</td>
                                                                    </tr>
                                                                    <tr><td colspan="2" style="border-bottom: 1px solid #e9e9e9; line-height: 15px;" height="15">&nbsp;</td></tr><tr><td colspan="2" height="15" style="line-height: 15px;">&nbsp;</td></tr><tr>
                                                                        <td align="left" width="60%" height="30" style="line-height:30px; width:60%;"><strong>Totaalbedrag</strong></td>
                                                                        <td align="right" height="30" style="line-height:30px;"><strong>@currency($order->total_price)</strong></td>
                                                                    </tr><tr><td colspan="2" height="15" style="line-height: 15px;">&nbsp;</td></tr>

                                                                    <tr>
                                                                        <td align="left" width="60%" height="50" style="border-top: 1px solid #e9e9e9; line-height: 50px;">
                                                                            Je bestelnummer
                                                                        </td>
                                                                        <td align="right" height="50" style="border-top: 1px solid #e9e9e9; line-height: 50px;">{!!  $order->number  !!}</td>
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

                                <tr><td height="30" style="line-height: 30px;">&nbsp;</td></tr>


                                <tr>
                                    <td>
                                        <table cellspacing="0" cellpadding="0" width="100%" style="font-size: 14px; border: 1px solid #e9e9e9; color: #0A3847; font-family: 'Open Sans', Helvetica, Arial, sans-serif;">
                                            <tr>
                                                <td align="center">
                                                    <table cellspacing="0" cellpadding="0" width="90%" style="font-size: 14px; line-height: 28px; color: #0A3847;">
                                                        <tr>
                                                            <td align="left" valign="middle" height="71" style="border-bottom: 1px solid #e9e9e9; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 18px;">
                                                                <table cellspacing="0" cellpadding="0" style="color: #0A3847;">
                                                                    <tr>
                                                                        <td height="71" valign="middle" align="left">
                                                                            <img src="https://static.takeaway.com/images/mail_images/orderconfirmation/delivery-retina.png" height="16" />
                                                                        </td>
                                                                        <td width="21" height="71">&nbsp;</td>
                                                                        <td height="71" style="font-size: 18px; font-family: 'Takeaway Sans Regular', Avant Garde, Century Gothic, Helvetica, Arial, sans-serif;" valign="middle">
                                                                            <strong>Bezorginformatie</strong>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr><td height="15">&nbsp;</td></tr>
                                                        <tr>
                                                            <td align="left" height="25" valign="middle"><b>Details</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->first_name }} {{ $order->last_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->street }} {{ $order->housenumber }} {{ $order->housenumber_addition }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->postcode }} {{ $order->city }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->telephone }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td height="25">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr><td height="20" style="line-height: 20px;">&nbsp;</td></tr>

                                <tr>
                                    <td align="center">
                                        <table cellspacing="0" cellpadding="0" width="90%" style="font-size:14px; line-height: 28px; color: #666666; font-family: 'Open Sans', Helvetica, Arial, sans-serif;">
                                            <tr>
                                                <td>
                                                    Het restaurant neemt contact met je op. Houd dus je telefoon en
                                                    je e-mail in de gaten.<br>
                                                    <br>
                                                    Namens het restaurant willen we je graag bedanken voor je bestelling. Eet smakelijk!
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td height="20" style="line-height: 20px;">&nbsp;</td></tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table cellspacing="0" cellpadding="0" width="80%">
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr><td height="24">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center" valign="middle" height="26">
                                                    <a href="http://www.frieslandbezorgd.nl/?utm_medium=tnx&utm_source=newsletter&utm_campaign=orderconfirmation-nl" style="color: {{ $primaryColor }}; text-decoration: none; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 12px;" target="_blank">Eten&nbsp;bestellen</a>
                                                </td>
                                            </tr>
                                            <tr><td height="14">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center" valign="middle" height="26">
                                                    <a href="http://www.frieslandbezorgd.nl/klantenservice?utm_medium=tnx&utm_source=newsletter&utm_campaign=orderconfirmation-nl" style="color: {{ $primaryColor }}; text-decoration:none; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 12px;" target="_blank">Klantenservice</a>
                                                </td>
                                            </tr>
                                            <tr><td height="14">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center" valign="middle" height="26">
                                                    <a href="http://www.frieslandbezorgd.nl/algemene-voorwaarden?utm_medium=tnx&utm_source=newsletter&utm_campaign=orderconfirmation-nl" style="color: {{ $primaryColor }}; text-decoration:none; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 12px;" target="_blank">Algemene&nbsp;voorwaarden</a>
                                                </td>
                                            </tr>
                                        </table>

                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr><td height="33">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center">
                                                    <table cellspacing="0" cellpadding="0" width="60%">
                                                        <tr>
                                                            <td align="center">                        <a href="https://app.adjust.com/lyjxpi?campaign=orderconfirmation-nl&utm_medium=tnx" style="text-decoration: none;" target="_blank">
                                                                    <img src="https://static.frieslandbezorgd.nl/images/mail/apps/apple_btn_nl.png" width="100" />
                                                                </a></td>
                                                            <td width="28">&nbsp;</td>
                                                            <td align="center">                        <a href="https://app.adjust.com/7r8b5h?campaign=orderconfirmation-nl&utm_medium=tnx" style="text-decoration: none;" target="_blank">
                                                                    <img src="https://static.frieslandbezorgd.nl/images/mail/apps/android_btn_nl.png" width="100" />
                                                                </a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr><td height="39">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center">
                                                    <table cellspacing="0" cellpadding="0" width="50%">
                                                        <tr>
                                                            <td align="center">                        <table cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="25" align="center">
                                                                            <a href="https://www.facebook.com/frieslandbezorgd" style="text-decoration: none;" target="_blank">
                                                                                <img src="https://static.frieslandbezorgd.nl/images/mail_images/facebook_mail.png" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table></td>
                                                            <td align="center">                        <table cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="25" align="center">
                                                                            <a href="https://www.twitter.com/frieslandbezorgd" style="text-decoration: none;" target="_blank">
                                                                                <img src="https://static.frieslandbezorgd.nl/images/mail_images/twitter_mail.png" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table></td>
                                                            <td align="center">                        <table cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="25" align="center">
                                                                            <a href="https://www.frieslandbezorgd.nl/blog?utm_medium=tnx&utm_source=newsletter&utm_campaign=orderconfirmation-nl" style="text-decoration: none;" target="_blank">
                                                                                <img src="https://static.frieslandbezorgd.nl/images/mail_images/blog_mail.png" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table></td>
                                                            <td align="center">                        <table cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="25" align="center">
                                                                            <a href="https://www.instagram.com/frieslandbezorgd.nl" style="text-decoration: none;" target="_blank">
                                                                                <img src="https://static.frieslandbezorgd.nl/images/mail_images/instagram_mail.png" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr><td height="38">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center" style="color: #0A3847; font-family: 'Roboto Slab', 'Open Sans', Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    Â© 2000 - {{ date('Y') }} <a href="http://www.frieslandbezorgd.nl/?utm_medium=tnx&utm_source=newsletter&utm_campaign=orderconfirmation-nl" style="text-decoration: underline; color: #0A3847;" target="_blank">Frieslandbezorgd.nl</a>
                                                </td>
                                            </tr>
                                            <tr><td height="40">&nbsp;</td></tr>
                                        </table>



                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</center>
</body>
</html>
