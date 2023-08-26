<?php

namespace App\Traits;
use GuzzleHttp\Client;


trait ConsumeExternalServices
{
    function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri // Note the correct key 'base_uri' instead of 'baseUri'
        ]);

        if (method_exists($this, 'resolveAuthorisation')) {
            $this->resolveAuthorisation($queryParams, $formParams, $headers);
        }
        

        $response = $client->request($method, $requestUrl, [
            'query' => $queryParams,     // Correct key 'query' instead of 'queryparams'
            'form_params' => $formParams // Correct key 'form_params' instead of 'formparams'
        ]);

        $responseContent = $response->getBody()->getContents();

        if (method_exists($this, 'decodeResponse')) {
            $this->decodeResponse($responseContent);
        }

        if (method_exists($this, 'checkIfErrorResponse')) {
            $this->checkIfErrorResponse($responseContent);
        }

        return $responseContent;
    }
}
