<?php
namespace Nreach\T3Base\Toolbar;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\Toolbar\ToolbarItemInterface;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Page\PageRenderer;

/**
 * User toolbar item
 */
class ChatbotToolbarItem implements ToolbarItemInterface
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->getPageRenderer()->loadRequireJsModule('TYPO3/CMS/T3Base/Chat');
    }

    /**
     * Item is always enabled
     *
     * @return bool TRUE
     */
    public function checkAccess()
    {
        return true;
    }

    /**
     * Render username
     *
     * @return string HTML
     */
    public function getItem()
    {
        return '<button id="chatbottoggle">Chatbot!</button>';
    }

    public function hasDropDown()
    {
        return false;
    }

    public function getDropDown()
    {
        return null;
    }

   public function getIndex()
   {
       return 10;
   }

    public function getAdditionalAttributes()
    {
        return [];
    }

    protected function getPageRenderer()
    {
        return GeneralUtility::makeInstance(PageRenderer::class);
    }
}
