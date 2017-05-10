<?php
defined('TYPO3_MODE') || die();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'nreach_imagekeywords',
    'class' => \Nreach\T3Vision\Form\Element\ImageKeywords::class,
    'priority' => 50,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'nreach_imagedescription',
    'class' => \Nreach\T3Vision\Form\Element\ImageDescription::class,
    'priority' => 50,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'nreach_imagepicker',
    'class' => \Nreach\T3Vision\Form\Element\ImagePicker::class,
    'priority' => 50,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Backend\\Form\\Container\\InlineControlContainer'] = array(
    'className' => 'Nreach\\T3Vision\\Xclass\\InlineControlContainer'
);