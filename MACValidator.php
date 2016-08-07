<?php
/**
 * @author: onixsib <a@onixsib.ru>
 * @date:   03.08.2016
 * @copyright onixsib
 * @link http://onixsib.ru/
 * @file MACValidator
 */
namespace onixsib\validators;

use Yii;
use yii\validators\Validator;

/**
 * Class MACValidator
 */
class MACValidator extends Validator {
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
		if (!preg_match('/^([0-9a-F]{1,2}[\.:-]){5}([0-9a-F]{1,2})$/', $string)) {
			$this->addError($model, $attribute, Yii::t('yii', 'This in not valid MAC address {sample}', ['sample' => '00:00:00:00:00:01']));
			return false;
		}
	}
}

?>