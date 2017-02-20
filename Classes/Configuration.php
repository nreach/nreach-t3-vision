<?php
namespace Nreach\T3Base;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * Semantic Images Configuration
 *
 * Contains the master API for other code to interact
 * or acquire other interaction APIs for CMIS.
 */
class Configuration implements \TYPO3\CMS\Core\SingletonInterface {

    /**
     * Configuration array
     *
     * @var array
     */
    protected $settings = null;

    function __construct()
    {
        $this->settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['nreacht3']);
    }

    /**
     * Get Analysis Host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->settings['nreachHost'];
    }

    public function getKeys() {
        return [
            'imageanalyzer' => $this->settings['nreachImageAnalyzerKey'],
            'bot' => $this->settings['nreachImageAnalyzerKey'],
            'textanalyzer' => $this->settings['nreachTextAnalyzerKey']
        ];
    }
}
