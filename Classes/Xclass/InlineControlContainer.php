<?php
namespace Nreach\T3Vision\Xclass;

class InlineControlContainer extends \TYPO3\CMS\Backend\Form\Container\InlineControlContainer {
    public function render() {
        $result = parent::render();
        $target = '<div class="form-control-wrap">';
        $replacement = $target . <<<EOF
<a href="#" class="btn btn-default nreach-btn-container nreacht3-magicrelation" onclick="return false;" title="Magic Relation">
Nreach Magic Relation
</a>
EOF;
        $result['html'] = str_replace($target, $replacement, $result['html']);
        $result['requireJsModules'][] = 'TYPO3/CMS/NreachT3Base/Nreach';
        return $result;
    }
}
