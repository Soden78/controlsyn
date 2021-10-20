<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarnetAdresseController extends AbstractController
{
    /**
     * @Route("/", name="carnet_adresse")
     */
    public function index(ContactRepository $repo): Response
    {
        $contacts = $repo->findAll();
        return $this->render('carnet_adresse/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }


    
    /**
     * permet de créer une annonce
     * 
     *@Route("/contact/new", name="contact_create")
     * 
     * @return Response
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $manager = $this->$this->getDoctrine()->getManager();
            foreach ($contact->getCategorie() as $cat) {
                $cat->setAd($contact);
                $manager->persist($cat);
            }



            $manager->persist($contact);
            $manager->flush();

            $this->addFlash(
                'success',
                "Votre contact appellé <strong>{$contact->getNom()}</strong> a bien été enregistrée."
            );



            return $this->redirectToRoute('contact', [
                'id' => $contact->getId()
            ]);
        }
        return $this->render('carnet_adresse/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

   /**
     * Permet d'afficher une seule annonce
     * 
     * @Route("/contact/{id}", name="contact")
     * 
     * @return Response
     * 
     */
    public function show(Contact $cont){
        return $this->render('carnet_adresse/show.html.twig',[
            'cont'=>$cont
        ]);
    }
}
