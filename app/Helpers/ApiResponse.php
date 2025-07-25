<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = null, $message = 'Success.')
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], 200);
    }

    public static function dataNotfound($message = 'Data not found.')
    {
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => $message
        ], 200);
    }

    public static function internalServerError($message = 'Internal server error.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message
        ], 500);
    }

    public static function unauthorized($message = 'Unauthorized.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message
        ], 401);
    }

    public static function forbidden($message = 'Forbidden.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message
        ], 403);
    }

    public static function unprocessableContent(array $errors = null, $message = 'Unprocessable Content.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message,
            'errors' => $errors
        ], 422);
    }
}