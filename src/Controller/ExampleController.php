<?php

namespace App\Controller;

use DateTime;
use Google\Protobuf\Timestamp;
use Pb\Example\ExampleMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController extends AbstractController
{
    /**
     * @Route("/example", name="example")
     */
    public function index(): Response
    {
        $x = new ExampleMessage();


        $dateOfBirth = new DateTime('1995-04-25');
        $timestamp = new Timestamp();
        $timestamp->setSeconds($dateOfBirth->getTimestamp());

        $x->setDateOfBirth($timestamp);
        
        return $this->json([
            'res' => json_decode($x->serializeToJsonString()),
        ]);
    }
}
