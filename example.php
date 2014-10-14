<?php

require_once('src/KupNajistoApi.php');

$address = array(
    'name' => 'Karel Holan',
    'country' => 'CR',
    'street' => 'Ulice 123',
    'zip_code' => '120 00',
    'city' => 'Praha'
);

$item = array(
    'code' => 'item123',
    'title' => 'Pocitac',
    'price' => 500,
    'amount' => 2
);

$customer = array(
    'name' => 'Karel Holan',
    'email' => 'karel.holan@rychmat.euxx',
    'personal_id' => '141013/0018',
    'id_card_no' => '123456789',
    'id_card_expiry_date' => '2024-04-24'
);

$orderData = array(
    'customer' => $customer,
    'billing_address' => $address,
    'delivery_address' => $address,
    'items' => array($item, $item),
    'tin' => '123456789',
    'vatin' => 'CZ123456789',
    'total_price' => 1300.8,
    'ext_id' => '3253234248941',
    'ext_variable_symbol' => '325323424894',
    'phone' => '+420 555 666 999',
    'delivery_carrier' => 1,
    'delivery_state' => 1,
    'cookie_id' => 'dh763jdkl8783jsldif783728jnkjdflfsd',
    'ip_address' => '79.98.79.213'
);

try {
    $api = new KupNajistoApi('username', 'password', 'http://knj.rychmat.eu/'); // https://app.kupnajisto.cz

    $response = $api->createOrder( $orderData );
    var_dump($response); // json response as assoc array

    // $response['id'] --> id
    // $response['state'] --> stav 3 - schvaleno, 4 - zamitnuto
    // $response['admin_field_rest_scoring_msg'] --> zprava o zamitnuti

    if ($response['state'] == 3) {
        $response = $api->confirmOrder( $response['id'] ); // potvrzeni objednavky
        $response = $api->updateOrder( $response['id'], array('total_price' => 120) ); // uprava objednavky - zmena ceny
    }

} catch (KupNajistoException $e) {
    echo $e->getMessage();
}

?>
