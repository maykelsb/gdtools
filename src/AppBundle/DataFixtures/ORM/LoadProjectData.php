<?php
/**
 * Fixture de carga de dados de projetos.
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ProjectBundle\Entity\Project;

class LoadProjectData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project = new Project();
        $project->setName('Guild Wars')
            ->setDescription('Um jogo de cartinhas para descobrir quem é o melhor gestor de guildas');

        $manager->persist($project);
        $manager->flush();
        unset($project);

        $project = new Project();
        $project->setName('Zankar')
            ->setDescription('Um tower defense de tabuleiro com uma mecânica bizarra de movimentação');

        $manager->persist($project);
        $manager->flush();
        unset($project);


        $project = new Project();
        $project->setName('Dragonautas')
            ->setDescription('E então, você é o melhor piloto de dragão?');

        $manager->persist($project);
        $manager->flush();
    }
}
