<?php
namespace Nreach\T3Vision\Task;

use Nreach\T3Base\Utility;
use Nreach\T3Vision\Vision;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

class AutoIndexerTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask {

    public function execute() {
        $rows = GeneralUtility::makeInstance(ConnectionPool::class)
              ->getConnectionForTable('sys_file_metadata')
              ->createQueryBuilder()
              ->select('uid', 'file')
              ->from('sys_file_metadata')
              ->where('nreach_vision is NULL')
              ->setMaxResults(5)
              ->execute()
              ->fetchAll();

        foreach($rows as $row)
            Vision::addNreachVisionToMetadata($row['uid'], $row['file']);

        return true;
    }
}