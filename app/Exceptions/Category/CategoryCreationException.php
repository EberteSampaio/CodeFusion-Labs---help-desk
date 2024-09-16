<?php

namespace App\Exceptions\Category;

use Illuminate\Http\JsonResponse;

class CategoryCreationException extends \Exception
{

    public function __construct(string $message = "Failed to create category", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message,$code,$previous);
    }

    public function render() : JsonResponse
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], 500);
    }
}
