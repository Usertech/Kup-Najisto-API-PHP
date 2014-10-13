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
     * Performs POST login request
     * @param  string $username
     * @param  string $password
     */
    public function login($username = '', $password = '')
    {
        try {
            $response = $this->request('POST', 'login/api/', compact('username', 'password'));
            $this->token = $response['token'];
            return $response;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Performs POST request to create order
     * @param  array $data
     * @return array $response json response
     */
    public function createOrder($data = array())
    {
        try {
            return $this->request('POST', 'order/api/', $data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Performs PUT request to create order
     * @param  array $data
     * @return array $response json response
     */
    public function confirmOrder($id = NULL)
    {
        return $this->updateOrder($id);
    }

    /**
     * Performs PUT request to update order
     * @param  int $id
     * @param  array $data
     * @return array $response json response
     */
    public function updateOrder($id = NULL, $data = NULL)
    {
        // TODO: data
        try {
            return $this->request('PUT', 'order/api/'.$id.'/', $data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Perform an API request
     * @param string $method
     * @param string $url
     * @param array $data
     * @return array $response json response
     * @throws Error
     */
    private function request($method, $url, $data = NULL)
    {
        $curl = curl_init();
        $headers = $this->headers;
        if ($this->token != '') {
            $headers[] = 'Authorization: '.$this->token;
        }

        if ($data !== NULL) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        if ($method == 'PUT') {
            $len = ($data === NULL)?0:strlen(json_encode($data));
            $headers[] = 'Content-Length: '.$len;
        }


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_URL, $this->apiUrl . $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new Error('Curl error: ' . curl_error($curl));
        }

        $info = curl_getinfo($curl);
        if ( !in_array($info['http_code'], array(200, 201)) ) {
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
