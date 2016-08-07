Yii2 Network Addresses Validators
=========================

Yii2 Extension that provide validators and features for validate network addresses

* IPv4Validator: Validate IPv4 address or IPv4 netmask
* IPv6Validator: Validate IPv6 address
* MACValidator: Validate MAC address
* NetAddressValidator: Validate IPv4 address or IPv4 netmask or IPv6 address or MAC address
 
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![Latest Stable Version](https://poser.pugx.org/onixsib/yii2-net-address-validators/v/stable)](https://packagist.org/packages/onixsib/yii2-net-address-validators)
[![Latest Unstable Version](https://poser.pugx.org/onixsib/yii2-net-address-validators/v/unstable)](https://packagist.org/packages/onixsib/yii2-net-address-validators)
[![License](https://poser.pugx.org/onixsib/yii2-net-address-validators/license)](https://packagist.org/packages/onixsib/yii2-net-address-validators)
[![Total Downloads](https://poser.pugx.org/onixsib/yii2-net-address-validators/downloads)](https://packagist.org/packages/onixsib/yii2-net-address-validators)
[![GitHub issues](https://img.shields.io/github/issues/onixsib/yii2-net-address-validators.svg)](https://github.com/onixsib/yii2-net-address-validators/issues)
[![Code Climate](https://img.shields.io/codeclimate/github/onixsib/yii2-net-address-validators.svg)](https://codeclimate.com/github/onixsib/yii2-net-address-validators)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/onixsib/yii2-net-address-validators/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/onixsib/yii2-net-address-validators/?branch=master)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist onixsib/yii2-net-address-validators "*"
```

or add

```
"onixsib/yii2-net-address-validators": "*"
```

to the require section of your `composer.json` file.

Usage
-----
Add the rules as the following example


```php

use Yii;
use yii\base\Model;
use onixsib\validators\IPv4Validator;
use onixsib\validators\IPv6Validator;
use onixsib\validators\MACValidator;
use onixsib\validators\NetAddressValidator;

class NetworkInterface extends Model
{
	public $name;
	public $IPv4;
	public $IPv4Netmask;
	public $IPv6;
	public $MAC;

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			// name is required
			['name', 'required'],
			// IPv4 validator
			['IPv4', IPv4Validator::className()],
			// IPv6 validator
			['IPv6', IPv6Validator::className()],
			// MAC validator
			['MAC', MACValidator::className()]
		];
	}
}
```