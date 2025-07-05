<?php

namespace App\Helper;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Exception
{
    public static function handle($th)
    {
        $message = $th->getMessage();

        if ($th instanceof NotFoundHttpException) {
            return redirect()->back()->with('error', $message);
        } else {
            return redirect()->back()->with('error', 'Something went wrong..');
        }
    }

    public static function json($th)
    {
        $message = $th->getMessage();

        if ($th instanceof NotFoundHttpException) {
            return response()->json(['error' => $message], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['error' => $message], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
