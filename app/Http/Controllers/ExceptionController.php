<?php

namespace App\Http\Controllers;

use App\Models\Exception;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    /**
     * @param Exception $exception
     * @return string
     */
    public function show(Exception $exception): string
    {
        return $exception->content;
    }
}
