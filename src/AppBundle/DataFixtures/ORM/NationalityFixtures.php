<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Nationality;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class NationalityFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $entity = new Nationality();
        $entity->setName('France');
        $this->setReference("nat_fr",$entity);
        $manager->persist($entity);

        $entity = new Nationality();
        $entity->setName('Espagne');
        $this->setReference("nat_es",$entity);
        $manager->persist($entity);


        $entity = new Nationality();
        $entity->setName('Belgique');
        $this->setReference("nat_be",$entity);
        $manager->persist($entity);

        // Persistence
        $manager->flush();
    }
        public function getOrder(){
            return 1;
    }


}