<?php

namespace App\DataFixtures;

use App\Entity\Culture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\AsciiSlugger;

class CultureFixtures extends Fixture
{
    public const CULTURE_NUMS = 30;

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $fakerFactory = Factory::create();
        $slugger = new AsciiSlugger();
        for ($i = 0; $i < self::CULTURE_NUMS; $i++) {
            $culture = new Culture();

            $title = $fakerFactory->realtext(15);
            $culture->setTitle($title);
            $culture->setText($fakerFactory->realtext(255));
            $culture->setFamily($fakerFactory->realtext(255));
            $culture->setCycle($fakerFactory->realtext(255));
            $culture->setExposition($fakerFactory->realtext(255));
            $culture->setGround($fakerFactory->realtext(255));
            $culture->setPoster('https://fakeimg.pl/350x200/?text=culture' . $i);
            $culture->setSlug($slugger->slug(strtolower($title)));
            $manager->persist($culture);
        }
            $manager->flush();
    }

}
