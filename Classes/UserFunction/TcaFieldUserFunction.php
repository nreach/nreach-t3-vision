<?php
namespace Nreach\T3Base\UserFunction;
use TYPO3\CMS\Core\Resource\Exception\FileDoesNotExistException;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\ResourceFactory;

/**
 * Class TcaFieldUserFunction
 */
class TcaFieldUserFunction {

	/**
	 * @var array
	 */
	protected $knownImageExtensions = array(
		'jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff'
	);

	/**
	 * @param array $parameters
	 */
	public function renderField(array $parameters) {
		$fileObject = $this->getFileObjectByUid($parameters['row']['file'][0]);
		return 'Context search: ' . $fileObject->getIdentifier();
	}

	/**
	 * @param array $parameters
	 * @return boolean
	 */
	public function isFieldEnabled(array $parameters) {
		return in_array(
			$this->getFileObjectByUid($parameters['record']['file'][0])->getExtension(),
			$this->knownImageExtensions
		);
	}

	/**
	 * @param integer $uid
	 * @return File
	 * @throws FileDoesNotExistException
	 */
	protected function getFileObjectByUid($uid) {
		return ResourceFactory::getInstance()->getFileObject((integer) $uid);
	}

}
