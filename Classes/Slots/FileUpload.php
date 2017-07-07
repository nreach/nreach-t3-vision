<?php
namespace Nreach\T3Vision\Slots;

use Nreach\T3Base\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Core\Resource\Driver\AbstractDriver;
use TYPO3\CMS\Core\Resource\ProcessedFile;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\Service\FileProcessingService;

use Nreach\T3Vision\Vision;

class FileUpload
{

    const SIGNAL_VISION = 'vision';

    public function __construct()
    {
    }

    public function vision(\TYPO3\CMS\Core\Resource\FileInterface $file, \TYPO3\CMS\Core\Resource\Folder $folder)
    {
        try {

            if (!Utility::isImage($file))
                return;

            $fileId = $file->getProperties()["file"];
            $metadataId = $file->getProperties()["uid"];

            $result = Vision::addNreachVisionToMetadata($metadataId, $fileId);
            $result = json_decode($result);
            $message = 'nreach: That is a nice ' . $result->description->captions[0]->text;
            $this->notify($message);
        } catch(\Exception $e) {
            // do not break the circle
        }
    }

    public function notify($message, $severity = \TYPO3\CMS\Core\Messaging\FlashMessage::OK)
    {
        if (TYPO3_MODE !== 'BE') {
            return;
        }
        $flashMessage = GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Messaging\FlashMessage::class,
            $message,
            '',
            $severity,
            true
        );
        $flashMessageService = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Messaging\FlashMessageService::class);
        $defaultFlashMessageQueue = $flashMessageService->getMessageQueueByIdentifier();
        $defaultFlashMessageQueue->enqueue($flashMessage);
    }
}
