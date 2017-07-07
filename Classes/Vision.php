<?php
namespace Nreach\T3Vision;

use Nreach\T3Base\Remote;
use Nreach\T3Base\Utility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Vision implements \TYPO3\CMS\Core\SingletonInterface {

    const SIGNAL_ANALYZED = 'analyzed';

    public static function addNreachVisionToMetadata($metadataId, $fileId) {
        $remote = GeneralUtility::makeInstance(Remote::class);
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)
                    ->getConnectionForTable('sys_file_metadata');

        $body = null;
        $result = null;
        try {
            $body = base64_encode(Utility::uid2file($fileId)->getContents());
        } catch(\Exception $e) {
            // not existing file
            // mark as empty analysis
            $result = '{"error":' . json_encode($e->getMessage()) . '}';
        }

        if ($body)
            try {
                $args = [];
                $method = 'imageanalyzer';
                $result = $remote->call($method, $args, $body);
            } catch (\Exception $e) {
                // Remote call failed for some reason
                $result = '{"error":' . json_encode($e->getMessage()) . '}';
            }
        $result = (string)$result;

        $qb = $connection->createQueryBuilder();
        $qb->update('sys_file_metadata')
            ->where(
                $qb->expr()->eq('uid', $metadataId)
            )
            ->set('nreach_vision', $result)
            ->execute();

        $signalSlotDispatcher = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
        $signalSlotDispatcher->dispatch(Vision, Vision::SIGNAL_ANALYZED, [$metadataId, $fileId, $result]);

        return $result;
    }
}
