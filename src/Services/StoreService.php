<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

class StoreService
{
   private $className;
   public function __construct($className, ...$dbKey)
   {
      $this->className = $className;
   }
   public function store()
   {
      $substance = new $this->className;
      foreach ($dbKey as $key => $value) {
         foreach (ReflectionClass::getMethods as $methodKey => $methodValue) {
            // TODO preg_match setter name
            $substance->setName($name);
         }
      }

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($substance);
      $entityManager->flush();
   }
}
