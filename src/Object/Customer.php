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
class Customer {

	/** @var string */
	private $name;

	/** @var string */
	private $email;

	/** @var string */
	private $personal_id;

	/** @var string */
	private $id_card_no;

	/** @var string */
	private $id_card_expiry_date;

	/**
	 * Customer constructor.
	 * @param string $name
	 * @param string $email
	 * @param string $personal_id
	 * @param string $id_card_no
	 * @param string $id_card_expiry_date
	 */
	public function __construct($name, $email, $personal_id, $id_card_no, $id_card_expiry_date) {
		$this->name = $name;
		$this->email = $email;
		$this->personal_id = $personal_id;
		$this->id_card_no = $id_card_no;
		$this->id_card_expiry_date = $id_card_expiry_date;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getIdCardExpiryDate() {
		return $this->id_card_expiry_date;
	}

	/**
	 * @param string $id_card_expiry_date
	 */
	public function setIdCardExpiryDate($id_card_expiry_date) {
		$this->id_card_expiry_date = $id_card_expiry_date;
	}

	/**
	 * @return string
	 */
	public function getIdCardNo() {
		return $this->id_card_no;
	}

	/**
	 * @param string $id_card_no
	 */
	public function setIdCardNo($id_card_no) {
		$this->id_card_no = $id_card_no;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getPersonalId() {
		return $this->personal_id;
	}

	/**
	 * @param string $personal_id
	 */
	public function setPersonalId($personal_id) {
		$this->personal_id = $personal_id;
	}
}
