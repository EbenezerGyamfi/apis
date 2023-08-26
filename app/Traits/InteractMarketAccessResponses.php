<?php


namespace App\Traits;

trait InteractMarketAccessResponses
{

    public function decodeResponse($response)
    {
        $decodedResponse = json_decode($response);


        return $decodedResponse->data ?? $decodedResponse;
    }

    // $queryParams, $formParams, $headers
    public function checkIfErrorResponse($response)
    {
        if (isset($response->error)) {
            throw new \Exception("Something Failed {$response->error}");
        }
    }
}
