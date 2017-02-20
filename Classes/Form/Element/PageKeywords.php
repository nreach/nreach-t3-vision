<?php
namespace Nreach\T3Base\Form\Element;

use YoastSeoForTypo3\YoastSeo\Controller\ModuleController;

class PageKeywords extends Base
{
   public function render()
   {
       $pageContentUrl = vsprintf(
           '/index.php?id=%d&type=%d&L=%d',
           [(int) $this->data['vanillaUid'],
            ModuleController::FE_PREVIEW_TYPE,
            0]);

       return array_merge_recursive(parent::render(), [
           'linkAttributes' => [
               'class' => 'nreacht3-pagekeywords ',
               'data-url' => $pageContentUrl
           ]
       ]);
   }
}
