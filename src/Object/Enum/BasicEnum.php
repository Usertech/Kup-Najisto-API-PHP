<?php

namespace KNJ\Object\Enum;

/**
 * Base enum class
 *
 * API for payment method Kup Najisto
 * http://www.kupnajisto.cz/
 *
 * @link https://github.com/Usertech/Kup-Najisto-API-PHP
 * @author Michal Vlcek <vlcek@usertechnologies.com>
 * @copyright 2015 UserTechnologies s.r.o. - http://usertechnologies.com/
 * @version 0.1.2
 */
abstract class BasicEnum {
	private static $constants = null;

	private function __construct() {}

	private static function getConstants() {
		if (self::$constants == null) {
			self::$constants = array();
		}
		$calledClass = get_called_class();
		if (!array_key_exists($calledClass, self::$constants)) {
			$reflection = new \ReflectionClass($calledClass);
			self::$constants[$calledClass] = $reflection->getConstants();
		}

		return self::$constants[$calledClass];
	}

	public static function isValidValue($value) {
		$values = array_values(self::getConstants());
		return in_array($value, $values, $strict = true);
	}
}
