<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Medicine;

class MedicineController extends AbstractController
{
    public function store(string $name, $substanceId, $manufacturerId, int $price): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $medicine = new Medicine();
        $medicine->setName($name);
        $medicine->setSubstance($substanceId); //id
        $medicine->setManufacturer($manufacturerId); //id
        $medicine->setPrice($price);
        $entityManager->persist($medicine);
        $entityManager->flush();
    }
}
