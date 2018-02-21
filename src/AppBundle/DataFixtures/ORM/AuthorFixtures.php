<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Author;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class AuthorFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $author = new Author();
        $author->setFirstName("Alfred")
                ->setName("de Musset")
                ->setNationality($this->getReference("nat_fr"));
        $manager->persist($author);
        $this->setReference("author_1",$author);

        $author = new Author();
        $author->setFirstName("Victor")
            ->setName("Hugo")
            ->setNationality($this->getReference("nat_be"));
        $manager->persist($author);
        $this->setReference("author_2",$author);

        $author = new Author();
        $author->setFirstName("Jean-claude")
            ->setName("VanDamme")
            ->setNationality($this->getReference("nat_es"));
        $manager->persist($author);
        $this->setReference("author_3",$author);

        // Persistence
        $manager->flush();
    }
    public function getOrder(){
        return 5;
    }


}