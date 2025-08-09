<?php

namespace App\Helpers;

class ApiResponse
{
    public static function continue()
    {
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Request approved.'
        ], 100);
    }

    public static function switchProtocol()
    {
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Request switch protocol.'
        ], 101);
    }

    public static function success($data = null, string $message = 'Success.')
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], 200);
    }

    public static function dataNotfound(array $errors = null, string $message = 'Data not found.')
    {
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => $message,
            'errors' => $errors
        ], 200);
    }

    public static function internalServerError(array $errors = null, string $message = 'Internal server error.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message,
            'errors' => $errors
        ], 500);
    }

    public static function unauthorized(string $message = 'Unauthorized.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message
        ], 401);
    }

    public static function forbidden(string $message = 'Forbidden.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message
        ], 403);
    }

    public static function unprocessableContent(array $errors = null, string $message = 'Unprocessable Content.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message,
            'errors' => $errors
        ], 422);
    }

    public static function badResource()
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => 'Bad resource.'
        ], 301);
    }

    public static function badRequest(array $errors = null, string $message = 'Bad request.')
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message,
            'errors' => $errors
        ], 400);
    }
}
