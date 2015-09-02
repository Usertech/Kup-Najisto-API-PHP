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
class Invoice {

	/** @var \KNJ\Object\File */
	private $file;

	/**
	 * Invoice constructor.
	 * @param \KNJ\Object\File $file
	 */
	public function __construct(File $file) {
		$this->file = $file;
	}

	/**
	 * @return \KNJ\Object\File
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @param \KNJ\Object\File $file
	 */
	public function setFile($file) {
		$this->file = $file;
	}
}
