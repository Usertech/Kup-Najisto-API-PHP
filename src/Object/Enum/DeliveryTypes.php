<?php

namespace KNJ\Object\Enum;

/**
 * Delivery type enum.
 *
 * Usage:
 *   Delivery::CZECH_POST_TO_HAND
 *
 * API for payment method Kup Najisto
 * http://www.kupnajisto.cz/
 *
 * @link https://github.com/Usertech/Kup-Najisto-API-PHP
 * @author Michal Vlcek <vlcek@usertechnologies.com>
 * @copyright 2015 UserTechnologies s.r.o. - http://usertechnologies.com/
 * @version 0.1.2
 */
class DeliveryTypes extends BasicEnum {
	const __default = self::CZECH_POST_TO_HAND;

	const CZECH_POST_TO_HAND = 1;
	const CZECH_POST_TO_POST_OFFICE = 2;
	const PPL = 3;
	const DPD = 4;
	const GEIS = 5;
	const INTIME = 6;
	const TOP_TRANS = 7;
	const GEBRUDER_WEISS = 8;
	const LOCAL_COURIER = 9;
	const PERSONAL_COLLECTION_AT_BRANCH = 10;
	const PERSONAL_COLLECTION_AT_PARTNER_NETWORK = 11;
	const TNT = 12;
	const GLS = 13;
	const CZECH_POST_OTHERS = 14;
}
