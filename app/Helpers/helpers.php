<?php 

function httpResponse($data, $message = 'Success', $success = true, $status = 200)
{
    return response()->json([
        'success'   => $success,
        'message'   => $message,
        'data'      => $data
    ], $status);
}