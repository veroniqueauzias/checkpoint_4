<?php


namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ArticleFixtues extends Fixture implements DependentFixtureInterface
{
    const ARTICLES = [
        'Skier à la Praille' => [
            'content' => 'C\'est super fun et y\'a pas grand monde en période non covidesque',
            'picture' => 'https://cf.bstatic.com/images/hotel/max1024x768/279/279183021.jpg',
            //'category' => 'categorie_1',
            'category' => 'Activités',
        ],
        'Nager à Virieu' => [
            'content' => 'On se croit en vacances même quand on y est pas',
            'picture' => 'http://www.bugeyvelo.com/wp-content/uploads/sites/2/noesit/medias/5356774/lac-de-virieu-le-grand-ot-bugey-sud-grand-colombier.jpg',
            //'category' => 'categorie_1',
            'category' => 'Activités',
        ],
        'Ramequin' => [
            'content' => 'Allez à la fromagerie de St Rambert en Bugey, achetez du ramequin, faites-en une fondue et crachez vos tripes',
            'picture' => 'https://lh3.googleusercontent.com/proxy/3DveVQh7bKsOpxZPRWiMtW8WXwHFFOr8_7balHh8TMlUNYZsvz3YVBJI6tddiadVvOkla8-IEzA_8w0RcfDVphA2YApUtGauDjEk8sy8kg9VACadNnY',
            //'category' => 'categorie_2',
            'category' => 'Spécialités',
        ],
        'Galette' => [
            'content' => 'On melange le lait les oeux, le sucre, la levure et la farine avec du beurre et on fait cuire. Sinon, on l\'achète à Perouges',
            'picture' => 'http://1.bp.blogspot.com/-fAzM87OL5w4/TfeQfoIX-8I/AAAAAAAAAIw/DtYehwnxEw0/s1600/Galette+sucre+bugey+amb%25C3%25A9rieu.jpg',
            //'category' => 'categorie_2',
            'category' => 'Spécialités',
        ],
        'Office du tourisme Bugey Sud' => [
            'content' => 'On y est bien accueuillis',
            'picture' => 'https://bugeysud-tourisme.fr/wp-content/uploads/2014/06/accueil-information-office-de-tourisme-redim.jpg',
            //'category' => 'categorie_3',
            'category' => 'Structures à contacter',
        ],
        'Hotel à Evosges' => [
            'content' => 'c\'est super beau',
            'picture' => 'https://lh3.googleusercontent.com/proxy/r8GJ0ZHtNpd7Iu_U48Aa7aDAGET6NhLNon9IAyIPTis9geL_iDigOaNzimgimxF3BijJu6KLGZOOfeDiIKBcTg0uxgjZ3_3WHXNcmQstuyYao9lfMXUCKyu_q2Kz8XB7YT-xGOtGn4JUAMW1JA',
            //'category' => 'categorie_3',
            'category' => 'Structures à contacter'
        ],
    ];

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $i=0;
        foreach (self::ARTICLES as $title => $data) {
            $article = new Article();
            $article->setTitle($title);
            $article->setContent($data ['content']);
            $article->setPicture($data['picture']);
            $article->setCategory($this ->getReference('category_' . $data['category']));
            $manager->persist($article);
            $i ++;
        }

        $manager->flush();
    }

}