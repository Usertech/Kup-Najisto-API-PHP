<?php

class KupNajistoApi
{
    const VERSION = '0.0.1';

    /** @var string auth token  */
    private static $token = '';

    /** @var array  */
    private $headers = array(
        'Accept' => 'Accept: application/json',
        'Content-Type' => 'Content-Type: application/json'
    );

    /** @var string  */
    private $apiUrl = 'https://app.kupnajisto.cz'; // http://knj.rychmat.eu/

    /** @var string  */
    private $username = '';

    /** @var string  */
    private $password = '';

    public function KupNajistoApi($username = '', $password = '', $url = '') {

        $this->username = $username;
        $this->password = $password;
        $this->apiUrl = $url;

        $this->login($username, $password);
    }

    /**
     * Performs POST login request
     * @param  string $username
     * @param  string $password
     */
    private function login($username = '', $password = '')
    {
        try {
            $response = $this->request('POST', 'login/api/', compact('username', 'password'));
            self::$token = $response['token'];
            $this->headers['Authorization'] = 'Authorization: '.self::$token;
            return $response;
        } catch (KupNajistoException $e) {
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
        } catch (KupNajistoException $e) {
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
        return $this->updateOrder($id, array());
    }

    /**
     * Performs PUT request to update order
     * @param  int $id
     * @param  array $data
     * @return array $response json response
     */
    public function updateOrder($id = NULL, $data = NULL)
    {
        try {
            return $this->request('PUT', 'order/api/'.$id.'/', $data);
        } catch (KupNajistoException $e) {
            throw $e;
        }
    }

    /*
     * Perform an API request
     * @param string $method
     * @param string $url
     * @param array $data
     * @return array $response json response
     * @throws KupNajistoException if any error occur
     */
    private function request($method, $url, $data = NULL)
    {
        $curl = curl_init();

        if ($data !== NULL) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        if (in_array($method, array('POST', 'PUT'))) {
            $len = ($data === NULL)? 0 : strlen(json_encode($data));
            $this->headers['Content-Length'] = 'Content-Length: '.$len;
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, array_values($this->headers));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_URL, $this->apiUrl . $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo 'z';
            throw new KupNajistoException('Curl error: ' . curl_error($curl));
        }

        $info = curl_getinfo($curl);
        if ( !in_array($info['http_code'], array(200, 201)) ) {
            if ($info['http_code'] === 403) {
                // TODO: autologin
                throw new KupNajistoException('{ "messages": { "error": "Token expired" } }');
            }
            throw new KupNajistoException($response);
        }

        curl_close($curl);

        return json_decode($response, TRUE);
    }

}

/**
 * Custom exception class
 */
class KupNajistoException extends Exception
{
    
}

?>
