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
class Address {
	/** @var string */
	private $name;

	/** @var string */
	private $country;

	/** @var string */
	private $street;

	/** @var string */
	private $zip_code;

	/** @var string */
	private $city;

	/**
	 * Creates new address
	 * @param  string $name
	 * @param  string $country
	 * @param  string $street
	 * @param  string $zip
	 * @param  string $city
	 * @return Address
	 */
	public function __construct($name = '', $country = '', $street = '', $zip = '', $city = '') {
		$this->name = $name;
		$this->country = $country;
		$this->street = $street;
		$this->zip_code = $zip;
		$this->city = $city;
	}

	/**
	 * Get name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set name
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Get country
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Set country
	 * @param string $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Get street
	 * @return string
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * Set street
	 * @param string $street
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * Get zip_code
	 * @return string
	 */
	public function getZipCode() {
		return $this->zip_code;
	}

	/**
	 * Set zipCode
	 * @param string $zipCode
	 */
	public function setZipCode($zipCode) {
		$this->zip_code = $zipCode;
	}

	/**
	 * Get city
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Set city
	 * @param string $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}
}
