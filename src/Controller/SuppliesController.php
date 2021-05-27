<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ManufacturerController;
use App\Controller\SubstanceController;
use App\Controller\MedicineController;

//TODO: FormController (createForm)

class SuppliesController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'SuppliesController',
        ]);
    }

    /**
     * @Route("/", name="store_medical", methods={"POST"})
     */
    public function store(Request $request)
    {
        $requestTable = '';
        $name = '';
        $link = '';
        $substanceId = 0;
        $manufacturerId = 0;
        $price = 200;
        switch (mb_strtolower($requestTable)) {
            case 'substance':
                (new SubstanceController)->store($name);
                break;
            case 'manufacturer':
                (new ManufacturerController)->store($name, $link);
                break;
            case 'medicine':
                (new MedicineController)->store($name, $substanceId, $manufacturerId, $price);
                break;
            default:
                die();
        }

        return $this->redirectToRoute('index');
    }
}
