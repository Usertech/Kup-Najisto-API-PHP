<?php

namespace KNJ\Object;

use KNJ\Object\Enum\DeliveryTypes;

/**
 * API for payment method Kup Najisto
 * http://www.kupnajisto.cz/
 *
 * @link https://github.com/Usertech/Kup-Najisto-API-PHP
 * @author Michal Vlcek <vlcek@usertechnologies.com>
 * @copyright 2015 UserTechnologies s.r.o. - http://usertechnologies.com/
 * @version 0.1.2
 */
class Order {
	/** @var \KNJ\Object\Customer */
	private $customer;

	/** @var \KNJ\Object\Adress */
	private $billing_address;

	/** @var \KNJ\Object\Adress */
	private $delivery_address;

	/** @var array */
	private $items = array();

	/** @var array */
	private $invoices = array("add" => array());

	/** @var string */
	private $tin;

	/** @var string */
	private $vatin;

	/** @var int */
	private $total_price;

	/** @var string */
	private $ext_id;

	/** @var string */
	private $ext_variable_symbol;

	/** @var string */
	private $phone;

	/** @var int */
	private $delivery_carrier;

	/** @var int */
	private $delivery_state;

	/** @var string */
	private $cookie_id;

	/** @var string */
	private $ip_address;

	/** @var boolean */
	private $paygate;

	/** @var string */
	private $success_url;

	/** @var string */
	private $failure_url;

	/** @var string */
	private $callback_url;

	/**
	 * Order constructor.
	 */
	public function __construct() {
		$this->paygate = true;
		$this->delivery_state = DeliveryTypes::CZECH_POST_TO_HAND;
	}

	/**
	 * Sets values from assoc array where keys of array will be mapped as properties of object
	 * @param array $params
	 */
	public function setParamsFromArray(array $params = array()) {
		foreach ($params as $key => $value) {
			$this->{$key} = $value;
		}

	}

	/**
	 * @return string
	 */
	public function getTin() {
		return $this->tin;
	}

	/**
	 * @param string $tin
	 */
	public function setTin($tin) {
		$this->tin = $tin;
	}

	/**
	 * @return string
	 */
	public function getVatin() {
		return $this->vatin;
	}

	/**
	 * @param string $vatin
	 */
	public function setVatin($vatin) {
		$this->vatin = $vatin;
	}

	/**
	 * @return int
	 */
	public function getTotalPrice() {
		return $this->total_price;
	}

	/**
	 * @param int $total_price
	 */
	public function setTotalPrice($total_price) {
		$this->total_price = $total_price;
	}

	/**
	 * @return string
	 */
	public function getExtId() {
		return $this->ext_id;
	}

	/**
	 * @param string $ext_id
	 */
	public function setExtId($ext_id) {
		$this->ext_id = $ext_id;
	}

	/**
	 * @return string
	 */
	public function getExtVariableSymbol() {
		return $this->ext_variable_symbol;
	}

	/**
	 * @param string $ext_variable_symbol
	 */
	public function setExtVariableSymbol($ext_variable_symbol) {
		$this->ext_variable_symbol = $ext_variable_symbol;
	}

	/**
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @return int
	 */
	public function getDeliveryCarrier() {
		return $this->delivery_carrier;
	}

	/**
	 * @param int $delivery_carrier
	 */
	public function setDeliveryCarrier($delivery_carrier) {
		$this->delivery_carrier = $delivery_carrier;
	}

	/**
	 * @return int
	 */
	public function getDeliveryState() {
		return $this->delivery_state;
	}

	/**
	 * Usage: $order->setDeliveryState(DeliveryTypes::PPL);
	 * @param int DeliveryTypes $delivery_state
	 * @throws UnexpectedValueException
	 */
	public function setDeliveryState($delivery_state) {
		if (!DeliveryTypes::isValidValue($delivery_state)) {
			throw new \KNJ\Exception\InvalidArgumentException("Unexpected delivery state: $delivery_state");
		}
		$this->delivery_state = $delivery_state;
	}

	/**
	 * @return string
	 */
	public function getCookieId() {
		return $this->cookie_id;
	}

	/**
	 * @param string $cookie_id
	 */
	public function setCookieId($cookie_id) {
		$this->cookie_id = $cookie_id;
	}

	/**
	 * @return string
	 */
	public function getIpAddress() {
		return $this->ip_address;
	}

	/**
	 * @param string $ip_address
	 */
	public function setIpAddress($ip_address) {
		$this->ip_address = $ip_address;
	}

	/**
	 * @return boolean
	 */
	public function isPaygate() {
		return $this->paygate;
	}

	/**
	 * @param boolean $paygate
	 */
	public function setPaygate($paygate) {
		$this->paygate = $paygate;
	}

	/**
	 * @return string
	 */
	public function getSuccessUrl() {
		return $this->success_url;
	}

	/**
	 * @param string $success_url
	 */
	public function setSuccessUrl($success_url) {
		$this->success_url = $success_url;
	}

	/**
	 * @return string
	 */
	public function getFailureUrl() {
		return $this->failure_url;
	}

	/**
	 * @param string $failure_url
	 */
	public function setFailureUrl($failure_url) {
		$this->failure_url = $failure_url;
	}

	/**
	 * @return string
	 */
	public function getCallbackUrl() {
		return $this->callback_url;
	}

	/**
	 * @param string $callback_url
	 */
	public function setCallbackUrl($callback_url) {
		$this->callback_url = $callback_url;
	}


	/**
	 * Set customer of order.
	 * @param \KNJ\Object\Customer $customer
	 */
	public function setCustomer(Customer $customer) {
		$this->customer = $customer;
	}

	/**
	 * Get customer of order.
	 * @return \KNJ\Object\Customer
	 */
	public function getCustomer() {
		return $this->customer;
	}

	/**
	 * Set billing address of order.
	 * @param \KNJ\Object\Address $address
	 */
	public function setBillingAddress(Address $address) {
		$this->billing_address = $address;
	}

	/**
	 * Get billing address of order.
	 * @return \KNJ\Object\Address
	 */
	public function getBillingAddress() {
		return $this->billing_address;
	}

	/**
	 * Set billing address of order.
	 * @param \KNJ\Object\Address $address
	 */
	public function setDeliveryAddress(Address $address) {
		$this->delivery_address = $address;
	}

	/**
	 * Get billing address of order.
	 * @return \KNJ\Object\Address
	 */
	public function getDeliveryAddress() {
		return $this->delivery_address;
	}

	/**
 * Add item to order.
 * @param \KNJ\Object\Item $item
 */
	public function addItem(Item $item) {
		$this->items[] = $item;
	}

	/**
	 * Set items of order.
	 * @param array of items \KNJ\Object\Item
	 * @throws \KNJ\InvalidArgumentException if param contains undefined object
	 */
	public function setItems(array $items) {
		foreach ($items as $item) {
			if (!$item instanceof Item) {
				throw new \KNJ\Exception\InvalidArgumentException("Given array parameter contains element of different type than '\KNJ\Item'");
			}
		}

		$this->items = $items;
	}

	/**
	 * Get items of order.
	 * @return \KNJ\Item
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * Add invoice to order.
	 * @param \KNJ\Object\Invoice invoice
	 */
	public function addInvoice(Invoice $invoice) {
		$this->invoices["add"][] = $invoice;
	}

	/**
	 * Set invoices of order.
	 * @param array of invoices \KNJ\Object\Invoice
	 * @throws \KNJ\InvalidArgumentException if param contains undefined object
	 */
	public function setInvoices(array $invoices) {
		foreach ($invoices as $invoice) {
			if (!$invoice instanceof Invoice) {
				throw new \KNJ\Exception\InvalidArgumentException("Given array parameter contains element of different type than '\KNJ\Invoice'");
			}
		}

		$this->invoices["add"] = $invoices;
	}

	/**
	 * Get invoices of order.
	 * @return \KNJ\Invoice
	 */
	public function getInvoices() {
		return $this->invoices;
	}
}
