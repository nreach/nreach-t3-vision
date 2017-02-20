<?php
namespace Nreach\T3Base\ViewHelpers;

class RequireJSViewHelper extends  \TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper {

    public function render() {
        $doc = $this->getDocInstance();
        $pageRenderer = $doc->getPageRenderer();
        $pageRenderer->loadJquery();
        $pageRenderer->loadRequireJs();

        $output = $this->renderChildren();
        $output = $doc->startPage("Nreach") . $output;
        $output .= $doc->endPage();

        return $output;
    }
}