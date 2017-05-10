<?php
class InlineControlContainer extends \TYPO3\CMS\Backend\Form\Container\InlineControlContainer {
    public function render() {
        $result = parent::render();
        xdebug_break();
        return $result;
    }
}
