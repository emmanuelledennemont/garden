<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Calendar;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\AsciiSlugger;

class CalendarFixtures extends Fixture
{
    public const CALENDAR_NUMS = 13;

    public function load(ObjectManager $manager): void  
    {
        // $product = new Product();
        // $manager->persist($product);
        $fakerFactory = Factory::create();
        $slugger = new AsciiSlugger();

        for ($i = 0; $i < self::CALENDAR_NUMS; $i++) {
            $calendar = new Calendar();

            $title = $fakerFactory->realtext(255);
            $calendar->setTitle($title);
            $calendar->setText($fakerFactory->realtext(255));
            $calendar->setType($fakerFactory->numberBetween());
            $calendar->setStartAt($fakerFactory->dateTimeBetween('3 months', '4 months'));
            $calendar->setPoster('https://fakeimg.pl/350x200/?text=calendar ' . $i);
            //$calendar->setSlug($slugger->slug(strtolower($title)));//
            $manager->persist($calendar);
        }

        $manager->flush();
    }
}
