<?php

class KupNajistoApi
{
    /** @var string  */
    private $apiUrl = 'http://knj.rychmat.eu/';

    /** @var array  */
    private $headers = array(
        'Accept: application/json',
        'Content-Type: application/json'
    );

    /** @var string  */
    private $token = '';

    /**
     * Perform an API request
     * @param string $method
     * @param string $url
     * @param array $data
     * @return mixed
     * @throws Error
     */
    private function request($method, $url, $data = NULL)
    {
        $curl = curl_init();
        $headers = $this->headers;
        if ($this->token != '') {
            $headers[] = 'Authorization: '.$this->token;
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_URL, $this->apiUrl . $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if ($data !== NULL) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new Error('Curl error: ' . curl_error($curl));
        }

        $info = curl_getinfo($curl);
        if ($info['http_code'] !== 200) {
            if ($info['http_code'] === 403) {
                throw new Exception('{ "messages": { "error": "Token expired" } }');
            }
            throw new Exception($response);
        }

        curl_close($curl);

        return json_decode($response, TRUE);
    }
}

?>
