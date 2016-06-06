<?php
/**
 * Fixture de carga de dados de projetos.
 */

namespace ApiBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use ApiBundle\Entity\Project;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $gw = new Project();
        $gw->setName('Guild Wars')
            ->setDescription('Um jogo de cartinhas para descobrir quem é o melhor gestor de guildas');
        $manager->persist($gw);
        $manager->flush();
        $this->addReference('gw', $gw);

        $zk = new Project();
        $zk->setName('Zankar')
            ->setDescription('Um tower defense de tabuleiro com uma mecânica bizarra de movimentação');
        $manager->persist($zk);
        $manager->flush();
        $this->addReference('zk', $zk);

        $dn = new Project();
        $dn->setName('Dragonautas')
            ->setDescription('E então, você é o melhor piloto de dragão?');
        $manager->persist($dn);
        $manager->flush();
        $this->addReference('dn', $dn);
    }

    public function getOrder()
    {
        return 1;
    }
}
