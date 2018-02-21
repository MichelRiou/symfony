<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 21/02/2018
 * Time: 14:56
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Tags;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
       $entity= new Tags();
       $entity->setName("PHP");
       $manager->persist($entity);
       $this->setReference("tag_1",$entity);

        $entity= new Tags();
        $entity->setName("JavaScript");
        $manager->persist($entity);
        $this->setReference("tag_2",$entity);

        $entity= new Tags();
        $entity->setName("C#");
        $manager->persist($entity);
        $this->setReference("tag_3",$entity);

        $entity= new Tags();
        $entity->setName("Robin S");
        $manager->persist($entity);
        $this->setReference("tag_4",$entity);

        $entity= new Tags();
        $entity->setName("Nicolas S");
        $manager->persist($entity);
        $this->setReference("tag_5",$entity);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
      return 20;
    }
}