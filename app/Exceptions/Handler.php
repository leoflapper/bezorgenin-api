<?php

namespace App\Exceptions;

use App\Models\Exception;
use Illuminate\Support\Facades\App;
use Mail;
use App\Mail\ExceptionOccured;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if($this->shouldReport($exception)) {
            if(App::environment() === 'production') {
                $this->sendEmail($exception);
            }

        }
        parent::report($exception);
    }

    /**
     * Sends an email to the developer about the exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function sendEmail(Throwable $exception)
    {
        $html = $this->renderExceptionWithWhoops($exception);
        $exceptionModel = new Exception();
        $exceptionModel->content = $html;
        $content = $exception->getTraceAsString();

        if($exceptionModel->save()) {
            $route = route('exceptions.show', $exceptionModel->id);
            $content = sprintf('<a href="%s">%s</a>', $route, $route);
        }

        try {
            Mail::to(config('exception.email_address'))->send(new ExceptionOccured($content));
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
}
