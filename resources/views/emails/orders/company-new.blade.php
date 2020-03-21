@php

    /**
    * @var $site \App\Site
     */
    $site = $order->site();

    $backgroundColor = $site->getColor('background-color', '#f1f2f6');
    $primaryColor = $site->getColor('primary-color', '#2f3640');

@endphp

<html>
<head>
    <meta charset="utf-8">
    <title>Uw bestelling bij {{ $order->company->name  }}</title>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto+Slab");
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
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
                                        <a href="{{ $site->getUrl() }}" style="text-decoration: none;" target="_blank">
                                            {{ $site->getName() }}
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table width="90%" cellspacing="0" cellpadding="0" style="font-size: 24px; font-family: 'Open Sans', Avant Garde, Century Gothic, Helvetica, Arial, sans-serif; color: #0A3847;">
                                <tr>
                                    <td align="center">
                                        <table cellspacing="0" cellpadding="0" width="90%" style="font-size: 24px; font-family: 'Open Sans', Avant Garde, Century Gothic, Helvetica, Arial, sans-serif; color: #0A3847;">
                                            <tr>
                                                <td align="center" height="120" style="line-height: 30px;">
                                                    <strong>
                                                        @php
                                                            $shippingMethod = 'afhaal';
                                                            if($order->is_pickup == false):
                                                                $shippingMethod = 'bezorg';
                                                            endif

                                                        @endphp
                                                        [{{$shippingMethod}}] Nieuwe {{$shippingMethod}}bestelling van {{ $order->first_name }} {{ $order->last_name }}!
                                                    </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="font-size: 14px; line-height: 30px; font-family: 'Roboto Slab', 'Open Sans', Helvetica, Arial, sans-serif;">
                                                    Het bestelnummer is: <strong>{{ $order->number }}</strong>.

                                                    @if($order->note)
                                                        <br><br>
                                                        Notitie van de klant:<br>
                                                        {{ $order->note }}
                                                    @endif
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


                                                                    @if($order->is_pickup == false)
                                                                        <tr>
                                                                            <td align="left" width="60%" height="30" style="line-height: 30px; width: 60%;">Bezorgkosten</td>
                                                                            <td align="right" height="30" style="line-height: 30px;">@if(0 !== $order->shipping_price) @currency($order->shipping_price) @else Gratis @endif</td>
                                                                        </tr>
                                                                    @endif
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
                                                                        <td height="71" style="font-size: 18px; font-family: 'Open Sans', Avant Garde, Century Gothic, Helvetica, Arial, sans-serif;" valign="middle">
                                                                            <strong>
                                                                                @if($order->is_pickup == false)
                                                                                    Bezorginformatie
                                                                                @else
                                                                                    Afhaalinformatie
                                                                                @endif
                                                                            </strong>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr><td height="15">&nbsp;</td></tr>
                                                        <tr>
                                                            <td align="left" height="25" valign="middle"><b>Adres</b></td>
                                                        </tr>

                                                        @if($order->is_pickup == false)
                                                            <tr>
                                                                <td>De bestelling moet bezorgd worden op het volgende adres:<br>
                                                                </td>
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
                                                        @else
                                                            <tr>
                                                                <td>De bestelling wordt afgehaald op:<br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->company->name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->company->address->street }} {{ $order->company->address->housenumber }} {{ $order->company->address->housenumber_addition }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->company->address->postcode }} {{ $order->company->address->city }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" height="25" valign="middle" style="line-height:25px;">{{ $order->company->telephone }}</td>
                                                            </tr>

                                                        @endif
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
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table cellspacing="0" cellpadding="0" width="80%">
                                <tr>
                                    <td>

                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr><td height="38">&nbsp;</td></tr>
                                            <tr>
                                                <td align="center" style="color: #0A3847; font-family: 'Roboto Slab', 'Open Sans', Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    Â© 2000 - {{ date('Y') }} <a href="{{ $site->getUrl() }}" style="text-decoration: underline; color: #0A3847;" target="_blank">{{ $site->getUrl() }}</a>
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
