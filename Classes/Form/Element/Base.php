<?php
namespace Nreach\T3Base\Form\Element;
use TYPO3\CMS\Core\Resource\Exception\FileDoesNotExistException;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use Nreach\T3Base\Utility;

/**
 * Generation of elements of the type "user"
 */
class Base extends AbstractFormElement
{
    /**
     * User defined field type
     *
     * @return array As defined in initializeResultArray() of AbstractNode
     */
    public function render()
    {
        $linkAttributes = [];

        $table = $this->data['tableName'];
        $row = $this->data['databaseRow'];

        if ($table === 'sys_file_metadata') {
            $fileUid = $row['file'][0];
            $linkAttributes['data-uid'] = Utility::uid2file($fileUid)->getUid();
        }

        return [
            'iconIdentifier' => 'actions-edit-undo',
            'title' => 'nreach',
            'requireJsModules' => ['TYPO3/CMS/T3Base/Nreacht', ''],
            'linkAttributes' => $linkAttributes
        ];
    }
}