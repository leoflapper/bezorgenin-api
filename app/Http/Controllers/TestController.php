<?php

namespace App\Http\Controllers;

use App\Notifications\TelegramFailedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TestController extends Controller
{
    public function testTelegram()
    {
        Notification::send('telegram-bot-api', new TelegramFailedJob());
        exit;
    }
}
