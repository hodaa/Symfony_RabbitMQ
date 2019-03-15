<?php


namespace App\Controller;

use App\Service\DemoService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TestDemoController
{

    a
    private $demoService;

    public function __construct(DemoService $demoService)
    {
        $this->demoService = $demoService;
    }

    /**
     * @Route("/createEntity", methods={"POST","HEAD"})
     */
    public function store()
    {
        array_
        $this->demoService->insertObjects();

        return  new JsonResponse('data added successfully');
    }

    /**
     * @Route("/readEntity", methods={"GET","HEAD"})
     */
    public function read()
    {
        $data = $this->demoService->readObjects();

        return new JsonResponse($data);
    }

    /**
     * @Route("/produceEntity", methods={"POST","HEAD"})
     */
    public function produce(Request $request)
    {
        $id=$request->request->get('id');
        $this->demoService->produceObjects($id);

        return new JsonResponse(['Status' => 'OK']);
    }
}
