<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16/4/17
 * Time: 上午2:23
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

class UserRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username){
        return $this->createQueryBuilder('u')
            ->where('u.name = :username OR u.email = :email')
            ->setParameter('username',$username)
            ->setParameter('email',$username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}