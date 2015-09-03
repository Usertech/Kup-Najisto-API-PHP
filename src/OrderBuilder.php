<?php

namespace KNJ;

use KNJ\Object\Address;
use KNJ\Object\Customer;
use KNJ\Object\File;
use KNJ\Object\Item;
use KNJ\Object\Invoice;
use KNJ\Object\Order;

/**
 * API for payment method Kup Najisto
 * http://www.kupnajisto.cz/
 *
 * @link https://github.com/Usertech/Kup-Najisto-API-PHP
 * @author Michal Vlcek <vlcek@usertechnologies.com>
 * @copyright 2015 UserTechnologies s.r.o. - http://usertechnologies.com/
 * @version 0.1.2
 */
class OrderBuilder {

	/** @var \KNJ\Object\Order */
	private $order;

	/**
	 * OrderBuilder constructor.
	 */
	public function __construct() {
		$this->order = new Order();
	}

	/**
	 * Add item to order.
	 * @param string $code
	 * @param string $title
	 * @param int $price
	 * @param int $amount
	 * @return OrderBuilder
	 */
	public function addItem($code, $title, $price, $amount, $ean = '') {
		$this->order->addItem(new Item($code, $title, $price, $amount, $ean));
		return $this;
	}

	/**
	 * Set customer of order.
	 * @param string $name
	 * @param string $email
	 * @param string $personal_id
	 * @param string $id_card_no
	 * @param string $id_card_expiry_date
	 * @return OrderBuilder
	 */
	public function setCustomer($name, $email, $personal_id, $id_card_no, $id_card_expiry_date) {
		$this->order->setCustomer(new Customer($name, $email, $personal_id, $id_card_no, $id_card_expiry_date));
		return $this;
	}


	/**
	 * Set billing address of order.
	 * @param string $name
	 * @param string $country
	 * @param string $street
	 * @param string $zip
	 * @param string $city
	 * @return OrderBuilder
	 */
	public function setBillingAddress($name, $country, $street, $zip, $city) {
		$address = new Address($name, $country, $street, $zip, $city);
		$this->order->setBillingAddress($address);
		return $this;
	}

	/**
	 * Set delivery address of order.
	 * @param string $name
	 * @param string $country
	 * @param string $street
	 * @param string $zip
	 * @param string $city
	 * @return OrderBuilder
	 */
	public function setDeliveryAddress($name, $country, $street, $zip, $city) {
		$address = new Address($name, $country, $street, $zip, $city);
		$this->order->setDeliveryAddress($address);
		return $this;
	}


	/**
	 * Add invoice to order.
	 * @param string $filename
	 * @param string $content_type
	 * @param string $content
	 * @return OrderBuilder
	 */
	public function addInvoice($filename, $content_type, $content) {
		$this->order->addInvoice(new Invoice(new File($filename, $content_type, $content)));
		return $this;
	}


	/**
	 * Sets values from assoc array where keys of array will be mapped as properties of object
	 * @param array $params
	 * @return OrderBuilder
	 */
	public function setParamsFromArray(array $params = array()) {
		$this->order->setParamsFromArray($params);
		return $this;
	}

	public function getOrder() {
		return $this->order;
	}
}
