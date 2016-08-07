<?php
/**
 * @author: onixsib <a@onixsib.ru>
 * @date:   03.08.2016
 * @copyright onixsib
 * @link http://onixsib.ru/
 * @file NetAddressValidator
 */

namespace onixsib\validators;

use Yii;
use yii\validators\Validator;

/**
 * Class NetAddressValidator
 */
class NetAddressValidator extends Validator {
	/**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', "{attribute} is invalid.");
        }
    }

	public function validateAttribute($model, $attribute) {
		$string = $model->{$attribute};


// filter_var suxx
		if (!
			(
				(preg_match('/^((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?1)){3}\z/', $string) && 
				(preg_match('/^(((?=(?>.*?(::))(?!.+\3)))\3?|([\dA-F]{1,4}(\3|:(?!$)|$)|\2))(?4){5}((?4){2}|((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?7)){3})\z/i', $string) && 
				(preg_match('/^([0-9a-F]{1,2}[\.:-]){5}([0-9a-F]{1,2})$/', $string) 
			)  
			) {
			$this->addError($model, $attribute, Yii::t('yii', 'This in not valid network address any family'));
			return false;
		}
	}
}

?>