<?php

namespace App\DataFixtures;

use App\Entity\Article ;
use App\Entity\Category;
use App\Entity\Comment;


use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker=Faker\Factory::create('FR_fr'); 

        for($i=1;$i<=3;$i++)
        {
            $category= new Category(); 
            $category->setTitle($faker->sentence())
                     ->setDescription($faker->paragraph()); 
                     $manager->persist($article);


                     for($j=1;$j<=mt_rand(4,6);$j++){
             
                         $article= new Article() ; 
                      
                        $content= '<p>' .join($faker->paragraphs(5),'</p><p>'). '</p>';
                    

                         $article->setTitle($faker->sentence())
                                 ->setContent($content)
                                 ->setImage($faker->imageUrl())
                                 ->setCategory($category);
                               
             
                         
                         $manager->persist($article);

                         for($k=1;$k<=mt_rand(4,10);$k++){
                             $comment=new Comment();  
                             $content= '<p>' .join($faker->paragraphs(5),'</p><p>'). '</p>';
                             $now = new \DateTime()   ;
                             $comment->setAuthor($faker->name)
                                     ->setContent($content); 

                         }
             
                     }
        }


        $manager->flush();
    }
}
