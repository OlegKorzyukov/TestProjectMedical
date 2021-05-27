<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Entity\Substance;

class SubstanceController extends AbstractController
{
    public function store(string $name)
    {
        $substance = new Substance;
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($substance);
        $entityManager->flush();
    }
}
