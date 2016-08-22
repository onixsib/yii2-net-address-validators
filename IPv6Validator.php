<?php
/**
 * @author: onixsib <a@onixsib.ru>
 * @date:   03.08.2016
 * @copyright onixsib
 * @link http://onixsib.ru/
 * @file IPv6Validator
 */
namespace onixsib\validators;

use Yii;
use yii\validators\Validator;

/**
 * Class IPv46Validator
 */
class IPv46Validator extends Validator {
	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		if ($this->message === null) {
			$this->message = \Yii::t('yii', "{attribute} is invalid.");
		}
	}

	public function validateAttribute($model, $attribute) {
		$string = $model->{$attribute};
		if (!$this->validateValue($string)) {
			$this->addError($model, $attribute, \Yii::t('yii', 'This in not valid IPv6 address {sample}', ['sample' => '::1']));
			return false;
		}
		return true;
	}

	public function validateValue($string) {

		// filter_var suxx
		return preg_match('/^(((?=(?>.*?(::))(?!.+\3)))\3?|([\dA-F]{1,4}(\3|:(?!$)|$)|\2))(?4){5}((?4){2}|((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?7)){3})\z/i', $string);
	}
}

?>