<?php
# Autor: Sebastian Łyszkowski
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;

class UserManagementController extends AbstractController
{

    public function index()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $count = $entity_manager->getRepository(User::class)->count(array(1));
        $users = $entity_manager->getRepository(User::class)->findAllFrom(0);
        $count = 1;
        $pages = 1;
        return $this->render('user_list_page/userlist.html.twig',
            array('users' => $users, 'count' => $count, 'pages' => $pages));
    }

    public function changePage()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $pagenumber = $_POST['pagenumber'];
        $count = $entity_manager->getRepository(User::class)->count(array(1));
        $pages = ceil($count/10);
        if($pagenumber == 1)
            $users = $entity_manager->getRepository(User::class)->findAllFrom(0);
        else
            $users = $entity_manager->getRepository(User::class)->findAllFrom($pagenumber*10-10);

        return $this->render('user_list_page/userlist.html.twig',
            array('users' => $users, 'count' => $count, 'pages' => $pages));
    }

    public function delete()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $userid = $_POST['id'];
        $user = $entity_manager->getRepository(User::class)->findOneBy(array('id' => $userid));
        $entity_manager->remove($user);
        $entity_manager->flush();
        return $this->render('user_list_page/deleteusersuccesful.html.twig', array('user' => $user));
    }

    public function search()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $name = $_POST['name'];
        $count = $entity_manager->getRepository(User::class)->countName(array($name));
        $pages = ceil($count/10);
        $users = $entity_manager->getRepository(User::class)->findByName(array($name),0);

        return $this->render('user_list_page/searchuserresults.html.twig',
            array('users' => $users, 'count' => $count, 'pages' => $pages, 'name' => $name));
    }

    public function changePageUser()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $pagenumber = $_POST['pagenumber'];
        $name = $_POST['name'];
        $count = $entity_manager->getRepository(User::class)->countName(array($name));
        $pages = ceil($count/10);
        if($pagenumber == 1)
            $users = $entity_manager->getRepository(User::class)->findByName(array($name), 0);
        else
            $users = $entity_manager->getRepository(User::class)->findByName(array($name), $pagenumber*10-10);

        return $this->render('user_list_page/searchuserresults.html.twig',
            array('users' => $users, 'count' => $count, 'pages' => $pages, 'name' => $name));
    }
}
