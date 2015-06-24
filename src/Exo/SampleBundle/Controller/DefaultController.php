<?php

namespace Exo\SampleBundle\Controller;

use Exo\SampleBundle\Entity\Auteur;
use Exo\SampleBundle\Entity\Biographie;
use Exo\SampleBundle\Entity\Livre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/livre", name="livre")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $list = $em->getRepository('ExoSampleBundle:Livre')->findAll();

        return array('list' => $list);
    }

    /**
     * @route("/addBook", name="AddBook")
     */
    public function addBookAction(Request $request)
    {
        $book = new Livre();

        $em = $this->getDoctrine()->getEntityManager();
        $listBio = $em->getRepository('ExoSampleBundle:Biographie')->findAll();

        /*$data = array();

        foreach ($listBio as $list) {
            $data[] = $list;
        }*/

        $form = $this->createFormBuilder($book)
            ->add('bio','entity', array(
                'class' => 'Exo\SampleBundle\Entity\Biographie','property' => 'title'
            ))
            ->add('titre', 'text')
            ->add('date_paru')
            ->add('Enregistrer', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {



            $em->persist($book);
            $em->flush();

            return $this->redirect($this->generateUrl('livre'));

        } else {
            return $this->render('ExoSampleBundle:Default:new.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }

    /**
     * @route("/author", name="author")
     * @Template()
     */
    public function authorAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $listAut = $em->getRepository('ExoSampleBundle:Auteur')->findAll();

        return array('listAut' => $listAut);
    }

    /**
     * @route("/addAuthor", name="AddAuthor")
     */
    public function addAuthorAction(Request $request)
    {
        $author = new Auteur();

        $form = $this->createFormBuilder($author)
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('born', 'date')
            ->add('Enregistrer', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getEntityManager();

            $bio = new Biographie();
            $bio->setAuthor($author);

            $em->persist($bio);
            $em->persist($author);
            $em->flush();
            return $this->redirect($this->generateUrl('author'));

        } else {
            return $this->render('ExoSampleBundle:Default:new.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }

    /**
     * @Route("/removeAuthor/{id}", name="removeAuthor")
     */
    public function removeAuthorAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $author = $em->getRepository('ExoSampleBundle:Auteur')->findOneBy(array('id' => $id));

        $em->remove($author);
        $em->flush();

        return $this->redirect($this->generateUrl('author'));
    }
}
