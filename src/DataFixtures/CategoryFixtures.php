<?php


namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'Activités' => [
            'summary' => 'Ce qu\'on peut faire dans le Bugey',
            'picture' => 'https://media.istockphoto.com/photos/two-boys-enjoying-kayaking-on-lake-picture-id1188850437?s=612x612'
        ],
        'Spécialités' => [
            'summary' => 'Ce qu\'on aime manger dans le Bugey',
            'picture' => 'https://www.laiterielacotiere.fr/photos/20180409_ramequin-du-bugey-2.jpg.jpg'
        ],
        'Structures à contacter' => [
            'summary' => 'Vers qui s\'adresser',
            'picture' => 'https://bugeysud-tourisme.fr/wp-content/uploads/2014/06/accueil-information-office-de-tourisme-redim.jpg'
        ],
    ];


    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $title => $data) {
            $category = new Category();
            $category->setTitle($title);
            $category->setSummary($data ['summary']);
            $category->setPicture($data['picture']);
            $manager->persist($category);
            $this->addReference('category_' .  $title, $category);
        }

        $manager->flush();
    }
}
