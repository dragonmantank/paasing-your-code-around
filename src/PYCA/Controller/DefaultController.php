<?php

namespace PYCA\Controller;

use PYCA\Entity\DrunkText;
use PYCA\Form\DrunkTextForm;
use PYCA\Mapper\DrunkTextMapper;
use Silex\ControllerProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class DefaultController implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', array($this, 'index'))->bind('homepage');
        $controllers->get('/', array($this, 'index'))->bind('best');
        $controllers->get('/', array($this, 'index'))->bind('worst');
        $controllers->get('/', array($this, 'index'))->bind('random');
        $controllers->match('/submit', array($this, 'submit'))->bind('submit')->method('POST|GET');

        return $controllers;
    }

    public function index(Application $app)
    {
        $dtm = new DrunkTextMapper($app['db']);
        $texts = $dtm->findAllBy('approved', 1);

        return $app['twig']->render('Default/index.html.twig', compact('texts'));
    }

    public function submit(Request $request, Application $app)
    {
        $form = new DrunkTextForm($app['form.factory']);
        $drunkTextForm = $form->build();
        $message = '';

        if($request->isMethod('POST')) {
            $drunkTextForm->bind($request);
            if($drunkTextForm->isValid()) {
                $drunkText = new DrunkText($drunkTextForm->getData());
                $drunkText->dateadded = new \DateTime();

                $dtm = new DrunkTextMapper($app['db']);
                $dtm->save($drunkText);
                $message = 'Your text has been submitted';
            }
        }

        return $app['twig']->render('Default/submit.html.twig', array(
            'form' => $drunkTextForm->createView(),
            'message' => $message,
        ));
    }
}
