<?php
/**
 * Fixture de carga de dados de decks.
 */

namespace ApiBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use ApiBundle\Entity\Deck;

class LoadDeckData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $mi_gw = new Deck();
        $mi_gw->setName('Missões I')
            ->setDescription('Deck de missões de nível I')
            ->setProject($this->getReference('gw'));
        $manager->persist($mi_gw);
        $manager->flush();

        $mii_gw = new Deck();
        $mii_gw->setName('Missões II')
            ->setDescription('Deck de missões de nível II')
            ->setProject($this->getReference('gw'));
        $manager->persist($mii_gw);
        $manager->flush();

        $m_zk = new Deck();
        $m_zk->setName('Mercado')
            ->setDescription('Deck de itens disponíveis no mercado do jogo')
            ->setProject($this->getReference('zk'));
        $manager->persist($m_zk);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
