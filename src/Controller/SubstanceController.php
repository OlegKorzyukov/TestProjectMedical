<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Substance;

class SubstanceController extends AbstractController
{
    public function store(string $name): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $substance = new Substance();
        $substance->setName($name);
        $entityManager->persist($substance);
        $entityManager->flush();
    }
}
