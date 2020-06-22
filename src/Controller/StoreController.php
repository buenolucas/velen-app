<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/")
 */
class StoreController extends AbstractController
{
    /**
     * @Route("/", name="store")
     * @Route("/{class}", name="store_class")
     */
    public function index($class=null): Response
    {
        $categories = [
            11=>'Druid', 4=>'Rogue', 3=> 'Hunter', 7=> 'Shaman', 8=> 'Mage', 9=> 'Warlock', 2=> 'Paladin', 1=> 'Warrior', 5=> 'Priest',
        ];
       
        $itemsRepo = $this->getDoctrine()
            ->getRepository(Item::class);
        if($class) {
            $items = $itemsRepo ->findByClass($class);
        } else {
            $items = $itemsRepo ->allItems();
        }
        
        return $this->render('store/index.html.twig', [
            'categories' =>$categories,
            'items' => $items
        ]); 
    }
}

