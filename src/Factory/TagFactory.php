<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 09/03/18
 * Time: 09:27
 */

namespace App\Factory;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Doctrine\Common\Persistence\ObjectManager;

class TagFactory
{
    /**
     * @param string $name
     * @param ObjectManager $manager
     * @return Tag
     */
    static public function create(string $name, ObjectManager $manager) : Tag {
        /**
         * @var TagRepository
         */
        $tagRepository = $manager->getRepository(Tag::class);

        $results = $tagRepository->findBy(array('name' => $name));
        if(count($results) === 0) {
            $tag = new Tag;

            $tag->setName($name);

            $manager->persist($tag);
            $manager->flush();
        } else {
            $tag = current($results);
        }
        return $tag;
    }
}