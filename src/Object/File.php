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
class File {

	/** @var base64string */
	private $content;

	/** @var string */
	private $content_type;

	/** @var string */
	private $filename;

	/**
	 * File constructor.
	 * @param string $filename
	 * @param string $content_type
	 * @param string $content - base64 encoded string
	 */
	public function __construct($filename, $content_type, $content) {
		$this->filename = $filename;
		$this->content_type = $content_type;
		$this->content = $content;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * @return string
	 */
	public function getContentType() {
		return $this->content_type;
	}

	/**
	 * @param string $content_type
	 */
	public function setContentType($content_type) {
		$this->content_type = $content_type;
	}

	/**
	 * @return string
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * @param string $filename
	 */
	public function setFilename($filename) {
		$this->filename = $filename;
	}
}