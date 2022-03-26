<?php

namespace App\Controller;

use App\Entity\Abonner;
use App\Form\AbonnementType;
use App\Repository\AbonnerRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\ByteString;
use Symfony\Component\Validator\Constraints\Uuid;

class AbonnerController extends AbstractController
{
    #[Route('/abonner', name: 'app_abonner')]
    public function index(AbonnerRepository $ar, HttpFoundationRequest $request): Response
    {
        $abonner=new Abonner();
        $date=new DateTime();
        $abonner->setDateAbonnement($date);
        $abonner->setActif(true);
        
        $form=$this->createForm(AbonnementType::class, $abonner);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $code=ByteString::fromRandom(10)->toString();
            $abonner->setCode($code);
            $ar->add($abonner);
        
        }

        return $this->render('abonner/index.html.twig', [
            'controller_name' => 'AbonnerController',
            'form' => $form->createView()
        ]);
    }
}
