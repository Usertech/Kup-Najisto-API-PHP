<?php

namespace KNJ\Object\Enum;

/**
 * Delivery type enum.
 *
 * Usage:
 *   ItemStateTypes::NEW_STATE
 *
 * API for payment method Kup Najisto
 * http://www.kupnajisto.cz/
 *
 * @link https://github.com/Usertech/Kup-Najisto-API-PHP
 * @author Michal Vlcek <vlcek@usertechnologies.com>
 * @copyright 2015 UserTechnologies s.r.o. - http://usertechnologies.com/
 * @version 0.1.2
 */
class ItemStateTypes extends BasicEnum {
	const __default = self::NEW_STATE;

	const NEW_STATE = 1;
	const RETURNED = 2;
	const CANCELLED = 3;
	const SENT = 4;
}
