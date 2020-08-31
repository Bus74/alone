<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Menu;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    /**
     * Utilisation du constructeur pour récupérer le service de hashage des mots de passe via autowiring
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();

        $user
            ->setEmail('wailers@gmail.com')
            ->setPassword($this->encoder->encodePassword($user, 'Asterix1@'))
            ->setRoles(["ROLE_ADMIN"])
        ;

        $manager->persist($user);

        $menu1 = new Menu();

        $menu1
            ->setTitle('Menu Adulte')
            ->setAuthor($user)
            ->setContent('<p style="text-align:center;"><span style="font-size:24px;">3 Plats aux choix 28,50€<br />
            4 Plats aux choix 32,00€</span></p>
            
            <p style="text-align:center;"> </p>
            
            <p style="text-align:center;"><span style="font-size:24px;">Aspic d’Œufs en Meurette, Tranche de Pain Grillé à l’Ail</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou<br />
                        Rillette de Sardines à la citronnelle et gingembre, Poivrons confits</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou<br />
                        Maki de Saumon Fumé au Risotto et St Môret, sauce gravlax</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou<br />
                        Terrine de Foie Gras, Mangue, Jambon Serano, Gelée de Sauterne au Poivre de Timut</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou<br />
                        6 Escargots d’Etrigny au beurre persillé façon Cadole<br />
              * * *<br />
                        Wok de Magret de Canard au Gingembre et Coriandre fraiche, Nouilles Chinoises</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou<br />
                        Burger de Veau à l’Italienne (Steak de veau, caviar de tomates séchées, légumes grillés, roquette)</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou<br />
                        Tajine de Patates Douces, Brochette de St Jacques Rôties</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou<br />
                        Pavé de Filet de Bœuf, crème d’Epoisses, Galette de Pomme de Terre et Courgettes</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">Poisson de la pêche du Jour</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">* * *<br />
                        Fromage Blanc à la crème de Bresse</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">Assiette de Trois fromages</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">ou</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">Nougat d’Epoisses Berthaut</span></p>
            
            <p style="text-align:center;"><span style="font-size:24px;">* * *<br />
                 Desserts à consulter à l’ardoise</span></p>
            
            <p> </p>')
        ;

        $manager->persist($menu1);


        $menu2 = new Menu();

        $menu2
            ->setTitle('Autres Menus')
            ->setAuthor($user)
            ->setContent('<p style="text-align:center"><span style="font-size:22px">Menu enfant &agrave; 10 &euro;:</span></p>

            <p style="text-align:center"><span style="font-size:22px">Hamburger et frites maison</span></p>
            
            <p style="text-align:center"><span style="font-size:22px">Desserts au choix</span></p>
            
            <p style="text-align:center"><span style="font-size:22px">* * *</span></p>
            
            <p style="text-align:center"><span style="font-size:22px">Formules simples :</span></p>
            
            <p style="text-align:center"><span style="font-size:22px">Un plat du jour &agrave; 9.50&euro;</span></p>
            
            <p style="text-align:center"><span style="font-size:22px">Formule D&eacute;jeuner &agrave; 14.50&euro;</span></p>')
        ;

        $manager->persist($menu2);


        $manager->flush();
    }
}
