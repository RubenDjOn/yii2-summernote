<?php
/**
 * @author: Zaini Afzan
 * @created: 23/02/2014 3:02
 * @file: SummernoteAsset
 */

namespace zainiafzan\widget;

use Yii;
use yii\web\AssetBundle;
class SummernoteAsset extends AssetBundle{

	public $sourcePath = '@summernote/assets';
	public $js = [
		'summernote.min.js'
	];
	public $css = [
		'summernote.css',
		'summernote-bs3.css'
	];
	public $depends = [
		'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapAsset'
	];
} 