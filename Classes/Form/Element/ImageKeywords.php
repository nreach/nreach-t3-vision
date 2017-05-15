<?php
namespace Nreach\T3Vision\Form\Element;

class ImageKeywords extends \Nreach\T3Base\Form\Element\Base
{
   public function render()
   {
       return array_merge_recursive(parent::render(), [
           'linkAttributes' => [
               'class' => 'nreacht3-imagekeywords nreach-btn-container '
           ]
       ]);
   }
}
