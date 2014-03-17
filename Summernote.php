<?php
/**
 * @author: Zaini Afzan
 * @created: 23/02/2014 3:05
 * @file: Summernote
 */

namespace zainiafzan\widget;


use yii\helpers\Html;
use yii\helpers\Json;

class Summernote extends \yii\base\Widget{

	public $options = [];
	/**
	 * @var array the html options.
	 */
	public $htmlOptions = [];
	/*
     * @var object model for active text area
     */
	public $model = null;

	/*
	 * @var string selector for init js scripts
	 */
	protected $selector = null;

	/*
	 * @var string name of textarea tag or name of attribute
	 */
	public $attribute = null;

	/*
	 * @var string value for text area (without model)
	 */
	public $value = '';

	public function init()
	{
		\Yii::setAlias('@summernote', dirname(__FILE__));
		if(!isset($this->htmlOptions['id'])){
			$this->htmlOptions['id'] = $this->getId();
		}
		parent::init();

	}

	public function run(){
		$this->selector = '#' . $this->getId();
		if(!is_null($this->model)){
			echo Html::activeTextarea($this->model, $this->attribute, $this->htmlOptions);
		}else{
			echo Html::textarea($this->attribute, $this->value, $this->htmlOptions);
		}
		SummernoteAsset::register($this->getView());
		$this->registerClientScript();
	}

	public function registerClientScript()
	{
		$view = $this->getView();

		$options = empty($this->options) ? '' : Json::encode($this->options);
		$js = "jQuery('" . $this->selector . "').summernote($options);";
		$view->registerJs($js);
	}
} 