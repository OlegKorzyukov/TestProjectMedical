<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class ValidatorService
{
   //TODO: URL validation
   function validateRequest(...$values)
   {
      $validator = Validation::createValidator();
      $options = null;
      $violations = [];
      foreach ($values as $val) {
         if (is_int($val)) {
            $options = [
               new Length([
                  'min' => 2,
                  'max' => 50,
                  'minMessage' => 'Количество символов не должно быть меньше - {{ limit }}',
                  'maxMessage' => 'Количество символов не должно быть больше {{ limit }}',
               ]),
               new NotBlank(),
            ];
         } else if (is_string($val)) {
            $options = [
               new Length([
                  'min' => 2,
                  'max' => 50,
                  'minMessage' => 'Количество символов не должно быть меньше - {{ limit }}',
                  'maxMessage' => 'Количество символов не должно быть больше {{ limit }}',
               ]),
               new NotBlank(),
            ];
         }
         $violations = $validator->validate($val, $options);
      }
      return $violations;
   }
}
