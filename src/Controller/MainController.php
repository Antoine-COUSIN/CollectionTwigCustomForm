<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request): Response
    {
        $task = new Task();

        $tag1 = new Tag();
        $tag1->setName('Tag1');
        $task->addTag($tag1);

        $tag2 = new Tag();
        $tag2->setName('Tag2');
        $task->addTag($tag2);

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            dd($form->getData());
        }


        return $this->render('main/index.html.twig', [
            'form' => $form,
        ]);
    }
}
