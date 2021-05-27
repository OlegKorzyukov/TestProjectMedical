<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Manufacturer;

class ManufacturerController extends AbstractController
{
    public function store(string $name, string $link): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $manufacturer = new Manufacturer();
        $manufacturer->setName($name);
        $manufacturer->setLink($link);
        $entityManager->persist($manufacturer);
        $entityManager->flush();
    }
}
