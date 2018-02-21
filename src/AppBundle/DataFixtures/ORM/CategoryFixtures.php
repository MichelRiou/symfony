<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 21/02/2018
 * Time: 14:44
 */

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Category;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $entity= new Category();
        $entity->setName("Science");
        $manager->persist($entity);
        $this->setReference("category_1",$entity);

        $entity= new Category();
        $entity->setName("Informatique");
        $manager->persist($entity);
        $this->setReference("category_2",$entity);

        $entity= new Category();
        $entity->setName("Musique");
        $manager->persist($entity);
        $this->setReference("category_3",$entity);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 15;
    }
}