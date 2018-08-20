<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;


trait ExceptionTrait

  {
    public function apiException($request, $e)
    {

    if($e instanceof ModelNotFoundException) {
      return response()->json([

        'errors' => 'Product Model not found'

    ],Response::HTTP_NOT_FOUND);
      //return response('Model not found', 404);

    }

    if($e instanceof NotFoundHttpException) {

      return response([

        'error' => 'Route not found'

    ],Response::HTTP_NOT_FOUND);
      //return response('Model not found', 404);

    }

}
 ?>
