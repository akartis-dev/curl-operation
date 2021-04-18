<?php

/**
 * @author <Akartis>
 * (c) akartis-dev <sitrakaleon23@gmail.com>
 * Do it with love
 */

namespace AkartisDev;

class CurlOperation
{
    private $base_url;
    private $curl;

    public function __construct(string $base_url)
    {
        $this->base_url = $base_url;
        $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        $this->json();
    }

    /**
     * ressource en json
     * @param bool $value
     */
    public function json(): self
    {
        $header = [
            'Content-type' => 'application/json',
            'Accept' => 'application/json'
        ];

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);

        return $this;
    }

    /**
     * Fait une operation get normal
     * @param string|null $additionalUrl
     * @param array $urlParams
     */
    public function get(?string $additionalUrl, array $urlParams = [])
    {
        $url = $this->base_url;

        if ($additionalUrl) {
            $url = sprintf("%s/%s", $url, $additionalUrl);
        }

        if (!empty($urlParams)) {
            $params = [];
            foreach ($urlParams as $key => $param) {
                $params[] = sprintf("%s=%s", $key, $param);
            }
            $params = implode("&", $params);

            $url = sprintf("%s?%s", $url, $params);
        }

        curl_setopt($this->curl, CURLOPT_HTTPGET, 1);
        curl_setopt($this->curl, CURLOPT_URL, $url);

        $result = curl_exec($this->curl);
        curl_close($this->curl);

        return $result;
    }


}
