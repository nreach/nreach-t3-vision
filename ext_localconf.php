<?php
defined('TYPO3_MODE') || die();

$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][1435433100] = \Nreach\T3Base\Toolbar\ChatbotToolbarItem::class;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'nreach_imagekeywords',
    'class' => \Nreach\T3Base\Form\Element\ImageKeywords::class,
    'priority' => 50,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'nreach_imagedescription',
    'class' => \Nreach\T3Base\Form\Element\ImageDescription::class,
    'priority' => 50,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'nreach_pagekeywords',
    'class' => \Nreach\T3Base\Form\Element\PageKeywords::class,
    'priority' => 50,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'nreach_imagepicker',
    'class' => \Nreach\T3Base\Form\Element\ImagePicker::class,
    'priority' => 50,
];
