<?php
namespace Nreach\T3Base\Form\Element;

class ImageKeywords extends Base
{
   public function render()
   {
       return array_merge_recursive(parent::render(), [
           'linkAttributes' => [
               'class' => 'nreacht3-imagekeywords '
           ]
       ]);
   }
}
