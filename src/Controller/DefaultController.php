<?php

namespace App\Controller;

use MyBundleNamespace\Service\NumberGeneratorService;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    #[Route('/lucky/number2/{max}', name: 'app_lucky_number2')]
    public function number2(int $max, ContainerInterface $container): Response
    {
        $gen = $container->get(NumberGeneratorService::class);
        $number = $gen->generate($max);

        return new Response(
            '<html><body>Luckyyyyyy number: ' . $number . '</body></html>'
        );
    }


    #[Route('/lucky/number/{max}', name: 'app_lucky_number')]
    public function number(int $max, NumberGeneratorService $service): Response
    {
        $number = $service->generate($max);

        return new Response(
            '<html><body>Luuuuuuuuucky number: ' . $number . '</body></html>'
        );
    }

}
