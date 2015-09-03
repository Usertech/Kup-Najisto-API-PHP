<?php

namespace KNJ\Object;

/**
 * API for payment method Kup Najisto
 * http://www.kupnajisto.cz/
 *
 * @link https://github.com/Usertech/Kup-Najisto-API-PHP
 * @author Michal Vlcek <vlcek@usertechnologies.com>
 * @copyright 2015 UserTechnologies s.r.o. - http://usertechnologies.com/
 * @version 0.1.2
 */
class Item {
	/** @var string */
	private $code;

	/** @var string */
	private $title;

	/** @var int */
	private $price;

	/** @var int */
	private $amount;

	/** @var int */
	private $state;

	/** @var string */
	private $ean;

	/**
	 * Item constructor.
	 * @param string $code
	 * @param string $title
	 * @param int $price
	 * @param int $amount
	 */
	public function __construct($code, $title, $price, $amount = 1, $ean = '') {
		$this->code = $code;
		$this->title = $title;
		$this->price = $price;
		$this->amount = $amount;
		$this->ean = $ean;
		$this->state = ItemStateTypes::NEW_STATE;
	}

	/**
	 * @return int
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @param int $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * @return string
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * @param string $code
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * @return int
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param int $price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return int
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @param int $state
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * @return string
	 */
	public function getEan() {
		return $this->ean;
	}

	/**
	 * @param string $ean
	 */
	public function setEan($ean) {
		$this->ean = $ean;
	}
}
