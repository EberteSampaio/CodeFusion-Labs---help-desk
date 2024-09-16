<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;

class NotFoundException extends \Exception
{
    public function __construct(string $message = "The requested resource could not be found on this server.", $code = 404, \Exception $previous = null)
    {
        parent::__construct($message,$code,$previous);
    }

    public function render() : JsonResponse
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], 404);
    }
}
