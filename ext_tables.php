<?php
if (!defined('TYPO3_MODE'))
	die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Nreach');

$GLOBALS['TCA']['sys_file_metadata']['columns']['keywords']['config']['fieldControl']['nreach'] = [
    'renderType' => 'nreach_imagekeywords'
];

$GLOBALS['TCA']['sys_file_metadata']['columns']['description']['config']['fieldControl']['nreach'] = [
    'renderType' => 'nreach_imagedescription'
];

$GLOBALS['TCA']['pages']['columns']['keywords']['config']['fieldControl']['nreach'] = [
    'renderType' => 'nreach_pagekeywords'
];

$GLOBALS['TCA']['tt_content']['columns']['image']['config']['fieldControl']['nreach'] = [
    'renderType' => 'nreach_imagepicker'
];

$GLOBALS['TCA']['tt_content']['columns']['media']['config']['fieldControl']['nreach'] = [
    'renderType' => 'nreach_imagepicker'
];