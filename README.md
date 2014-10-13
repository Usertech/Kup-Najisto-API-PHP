PHP implementace pro přístup k API platební metody [http://www.kupnajisto.cz](http://www.kupnajisto.cz).

Příklad [zde](https://github.com/vlcekmi3/kupnajisto-api/blob/master/example.php):

``` php
$api = new KupNajistoApi();
$api->login( 'username', 'password' );

$response = $api->createOrder( $orderData );
var_dump($response); // json odezva jako asociativni pole

// $response['id'] --> id
// $response['state'] --> stav 3 - schvaleno, 4 - zamitnuto
// $response['admin_field_rest_scoring_msg'] --> zprava o zamitnuti

$response = $api->confirmOrder( $response['id'] ); // potvrzeni objednavky
$response = $api->updateOrder( $response['id'], array('delivery_state' => 4) ); // uprava objednavky - zmena stavu doruceni
```
