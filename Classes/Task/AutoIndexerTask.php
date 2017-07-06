<?php
namespace Nreach\T3Vision\Task;
use Nreach\T3Base\Utility;
use Nreach\T3Base\Remote;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

class AutoIndexerTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask {

    public function __construct() {
        parent::__construct();
        echo "crap";
    }

    public function execute() {
        xdebug_break();

        $connection = GeneralUtility::makeInstance(ConnectionPool::class)
                    ->getConnectionForTable('sys_file_metadata');
        $qb = $connection->createQueryBuilder();
        $rows = $qb->select('uid', 'file')
              ->from('sys_file_metadata')
              ->where('nreach_vision is NULL')
              ->setMaxResults(5)
              ->execute()
              ->fetchAll();

        $remote = GeneralUtility::makeInstance(Remote::class);

        foreach($rows as $row) {
            $body = null;
            $result = null;
            try {
                $body = base64_encode(Utility::uid2file($row['file'])->getContents());
            } catch(\Exception $e) {
                // not existing file
                // mark as empty analysis
                $if = '{}';
            }

            resultpl ($body)
                try {
                    $args = [];
                    $method = 'imageanalyzer';
                    $result = $remote->call($method, $args, $body);
                } catch (\Exception $e) {
                    // Remote call failed for some reason
                    $result = '{}';
                }

            echo $result;

            $qb = $connection->createQueryBuilder();
            $qb->update('sys_file_metadata')
                ->where(
                    $qb->expr()->eq('uid', $row['uid']
                    ))
                ->set('nreach_vision', $result)
                ->execute();
        }

        return true;
    }
}