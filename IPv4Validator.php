<?php
/**
 * @author: onixsib <a@onixsib.ru>
 * @date:   03.08.2016
 * @copyright onixsib
 * @link http://onixsib.ru/
 * @file IPv4Validator
 */
namespace onixsib\validators;

use Yii;
use yii\validators\Validator;

/**
 * Class IPv4Validator
 */
class IPv4Validator extends Validator {
	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		if ($this->message === null) {
			$this->message = Yii::t('yii', "{attribute} is invalid.");
		}
	}

	public function validateAttribute($model, $attribute) {
		$string = $model->{$attribute};

		// filter_var suxx
		if (!preg_match('/^((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?1)){3}\z/', $string)) {
			$this->addError($model, $attribute, Yii::t('yii', 'This in not valid IPv4 address {sample}', ['sample' => '127.0.0.1']));
			return false;
		}
	}
}

?>