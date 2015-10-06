PHP implementace pro přístup k API platební metody [http://www.kupnajisto.cz](http://www.kupnajisto.cz).

### # changelog
* přidány namespaces
* dostupné jako composer package
* práce API s objekty, namísto associativního pole

### # instalace
* jako závislost v composeru: `composer require usertech/kupnajisto-api-php`
* nebo jako standalone verze: `composer install`

### # příklad

* [[tvorba pomocí objektů](https://github.com/Usertech/Kup-Najisto-API-PHP/blob/master/example.php)]:
* [[tvorba pomocí builderu](https://github.com/Usertech/Kup-Najisto-API-PHP/blob/master/example_builder.php)]:

``` php

use KNJ\KupNajistoApi;
use KNJ\Exception\KupNajistoException;
use KNJ\Object\Enum\DeliveryTypes;
use KNJ\OrderBuilder;

$orderData = array(
	'tin' => '123456789',
	'vatin' => 'CZ123456789',
	'total_price' => 1300.8,
	'ext_id' => '3253234248941',
	'ext_variable_symbol' => '5323424894',
	'phone' => '+420 555 666 999',
	'delivery_carrier' => DeliveryTypes::CZECH_POST_TO_HAND,
	'cookie_id' => 'dh763jdkl8783jsldif783728jnkjdflfsd',
	'ip_address' => '79.98.79.213',
	'paygate' => true, //pokud chcete použít platební bránu
	'success_url' => 'http://vaseshop.cz/vase-success-url', //přesměrovací url při úspěšném zaplacení objednávky
	'failure_url' => 'http://vaseshop.cz/vase-failure-url', //přesměrovací url při neúspěšném zaplacení objednávky
	'callback_url' => 'http://vaseshop.cz/vase-callback-url', //url kam se mají posílat změny o stavu objednávky
);

$builder = new OrderBuilder();
$builder
	->setCustomer('Karel Holan', 'karel.holan@rychmat.euxx', '890707/0029', '100786676', '2024-04-24')
	->setBillingAddress('Karel Holan', 'CR', 'Ulice 123', '120 00', 'Praha')
	->addItem('item123', 'Pocitac', 500, 2)
	->addInvoice('filename.pdf', 'application/pdf', base64_encode('data of some file'))
	->setParamsFromArray($orderData);

$order = $builder->getOrder();

try {
	$api = new KupNajistoApi('vas@email.cz', 'vaseheslo', 'https://app.kupnajisto.cz/');
	$response = $api->createOrder($order);
	var_dump($response); // json response as assoc array

	// $response['id'] --> id
	// $response['state'] --> stav 3 - schvaleno, 4 - zamitnuto
	// $response['admin_field_rest_scoring_msg'] --> zprava o zamitnuti

	if ($response['state'] == 3) {
		$response = $api->confirmOrder($response['id']); // potvrzeni objednavky
		$order->setTotalPrice(120);
		$response = $api->updateOrder($response['id'], $order); // uprava objednavky - zmena ceny
	}

} catch (KupNajistoException $e) {
	var_dump(json_decode($e->getMessage(), TRUE));
}
```
