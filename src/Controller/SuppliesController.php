<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ValidatorService;

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
    public function store(Request $request, ValidatorService $validator)
    {
        //TODO: validation
        $request = $request->request->all();
        dump($validator->validateRequest($request));

        $requestTable = mb_strtolower($request['supplies_list']);
        $name = $request['supplies_name'] ?? null;
        $link = $request['supplies_link'] ?? null;
        $substanceId = $request['supplies_substance'] ?? null;
        $manufacturerId = $request['supplies_manufacturer'] ?? null;
        $price = $request['supplies_price'] ?? null;
        //DONT DO THIS
        switch ($requestTable) {
            case 'substance':
                (new SubstanceController())->store($name);
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

    public function update()
    {
    }

    public function destroy()
    {
    }
}
