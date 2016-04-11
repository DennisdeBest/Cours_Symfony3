<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Product;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadProductData implements FixtureInterface, ContainerAwareInterface {

        /**
         * @var ContainerInterface
         */
        private $container;

        public function setContainer(ContainerInterface $container = null) {
            $this->container = $container;
        }

        public function load(ObjectManager $manager)
        {
            $titles = array("RedBull", "Wine", "Food", "Product", "something");
            $loremipsum = $this->container->get('apoutchika.lorem_ipsum');
            for($i=0; $i < 10; $i++)
            {
                $product = new Product();
                $product->setName($titles[$i%5]." ".$i);
                $product->setDescription($loremipsum->getSentences(1));
                $product->setPrice(rand(1000, 10000)/100);
                $manager->persist($product);
            }
            $manager->flush();
        }
}