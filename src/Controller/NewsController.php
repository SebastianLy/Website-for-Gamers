<?php

namespace App\Controller;

use App\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{

    public function index()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $count = $entity_manager->getRepository(News::class)->count(array(1));
        $pages = ceil($count/10);
        $news = $entity_manager->getRepository(News::class)->findAllFrom(0);
        return $this->render('news/news.html.twig',
            array('news' => $news, 'pages' => $pages));
    }

    public function changePage()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $pagenumber = $_POST['pagenumber'];
        $count = $entity_manager->getRepository(News::class)->count(array(1));
        $pages = ceil($count/10);
        if($pagenumber == 1)
            $news = $entity_manager->getRepository(News::class)->findAllFrom(0);
        else
            $news = $entity_manager->getRepository(News::class)->findAllFrom($pagenumber*10-9);

        return $this->render('news/news.html.twig',
            array('news' => $news, 'pages' => $pages));
    }

    public function delete()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $newsid = $_POST['id'];
        $news = $entity_manager->getRepository(News::class)->findOneBy(array('id' => $newsid));
        $entity_manager->remove($news);
        $entity_manager->flush();
        return $this->render('news/deletesuccesful.html.twig', array('news' => $news));
    }

    public function search()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $title = $_POST['title'];
        $count = $entity_manager->getRepository(News::class)->countName(array($title));
        $pages = ceil($count/10);
        $news = $entity_manager->getRepository(News::class)->findByName(array($title),0);

        return $this->render('news/searchresults.html.twig',
            array('news' => $news, 'count' => $count, 'pages' => $pages,
                'title' => $title));
    }

    public function changePagePost()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $pagenumber = $_POST['pagenumber'];
        $title = $_POST['title'];
        $count = $entity_manager->getRepository(User::class)->countName(array($title));
        $pages = ceil($count/10);
        if($pagenumber == 1)
            $news = $entity_manager->getRepository(User::class)->findByName(array($title), 0);
        else
            $news = $entity_manager->getRepository(User::class)->findByName(array($title), $pagenumber*10-9);

        return $this->render('user_list_page/searchuserresults.html.twig',
            array('news' => $news, 'count' => $count, 'pages' => $pages,
                'title' => $title));
    }
}
