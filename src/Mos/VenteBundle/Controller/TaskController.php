<?php
// src/AppBundle/Controller/TaskController.php
namespace Mos\VenteBundle\Controller;

use Mos\VenteBundle\Entity\Tag;
use Mos\VenteBundle\Entity\Task;
use Mos\VenteBundle\Form\TagType;
use Mos\VenteBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * tag controller.
 *
 * @Route("/tagss")
 */

class TaskController extends Controller
{

    /**
     * Lists all Service entities.
     *
     * @Route("/", name="nn")
     * @Method("GET")
     */
    public function newAction(Request $request)
    {
        $task = new Task();

        $tag1 = new Tag();
        $tag1->setName('tag1');
        $task->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->setName('tag2');
        $task->getTags()->add($tag2);


        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('tag/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}