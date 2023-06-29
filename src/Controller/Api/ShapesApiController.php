<?php

namespace App\Controller\Api;

use Throwable;
use App\Services\ShapeService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShapesApiController
{
    #[Route('/{shape}/{a_or_radius}/{b}/{c}')]
    public function shape($shape, $a_or_radius = null, $b = null, $c = null): Response
    {
        try {
            $shape = ShapeService::getInstance($shape);
            $shape->setAttributes($a_or_radius, $b, $c);
            $circumference = $shape->circumference();
            $surface = $shape->surface();

            $response = array_merge([
                "type" => $shape->getType()],
                $shape->getAttributes(), [
                "surface" => (float)number_format(floor($surface*100)/100, 2),
                "circumference" => (float)number_format(floor($circumference*100)/100 , 2),
            ]);

            return new JsonResponse($response);
        } catch (Throwable $throwable) {
            $response = [
                "message" => $throwable->getMessage(),
                "data" => null
            ];
            return new JsonResponse($response, 500);
        }
    }

}