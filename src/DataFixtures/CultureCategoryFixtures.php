<?php

namespace App\DataFixtures;

use App\Entity\CultureCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CultureCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $cultureCategory = new CultureCategory();
        $cultureCategory->setName('Légumes');
        $this->addReference('cultureCategory_1', $cultureCategory);
        $cultureCategory->setName('Fruits');
        $this->addReference('cultureCategory_2', $cultureCategory);
        $cultureCategory->setName('Fleurs');
        $this->addReference('cultureCategory_3', $cultureCategory);
       

        $manager->flush();
    }
}
