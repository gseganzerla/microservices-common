<?php

namespace Gseganzerla\MicroservicesCommon\Services\Traits;

use Illuminate\Support\Facades\Http;

trait ConsumeExternalService
{
    public function headers(array $headers = [])
    {
        $headers[] = [
            'Accept' => 'application/json',
            'Authorization' => $this->token
        ];

        return Http::withHeaders($headers);
    }

    public function request(
        string $endPoint,
        string $method,
        array $formParams = [],
        array $headers = []

    ) {
        return $this->headers($headers)
            ->$method($this->url . $endPoint, $formParams);
    }
}
