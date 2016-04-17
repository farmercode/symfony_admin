<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 * @ORM\Table(name="admin_user")
 *
 * @property int    $id
 * @property string $name
 * @property string $nick_name
 * @property string $passwd
 * @property string $email
 * @property string $sex
 * @property string $phone
 * @property string $qq
 * @property string $add_time
 * @property string $update_time
 */
class User implements UserInterface,\Serializable
{
    /**
     * @var int $id
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var
     * @ORM\Column(type="string",length=100)
     */
    public $name;

    /**
     * @var
     * @ORM\Column(type="string",length=50)
     */
    public $nick_name;

    /**
     * @var string $passwd
     * @ORM\Column(type="string",length=32)
     */
    public $passwd;

    /**
     * @var
     * @ORM\Column(type="string",length=100)
     */
    public $email;

    /**
     * @var
     * @ORM\Column(type="string",columnDefinition="ENUM('男','女','保密')"),length=10)
     */
    public $sex;

    /**
     * @var
     * @ORM\Column(type="string",length=20)
     */
    public $phone;

    /**
     * @var
     * @ORM\Column(type="string",length=20)
     */
    public $qq;

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    public $add_time;

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    public $update_time;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __call($name, $arguments)
    {

    }

    /**
     * 获得用户账号信息
     * @return string
     */
    public function getUsername(){
        return $this->name;
    }

    /**
     * 获得salt值
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * 获得用户密码加密字符串
     * @return string
     */
    public function getPassword(){
        return $this->passwd;
    }

    /**
     * 获得用户角色
     * @return array
     */
    public function getRoles(){
        return ['ROLE_USER','ROLE_ADMIN'];
    }

    public function eraseCredentials(){

    }

    /**
     * 获得用户数组序列化信息
     * @return string
     */
    public function serialize(){
        return serialize([
            $this->id,
            $this->name,
            $this->passwd
                         ]);
    }

    public function unserialize($serialized){
        list (
            $this->id,
            $this->name,
            $this->passwd
            ) = unserialize($serialized);
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nickName
     *
     * @param string $nickName
     *
     * @return User
     */
    public function setNickName($nickName)
    {
        $this->nick_name = $nickName;

        return $this;
    }

    /**
     * Get nickName
     *
     * @return string
     */
    public function getNickName()
    {
        return $this->nick_name;
    }

    /**
     * Set passwd
     *
     * @param string $passwd
     *
     * @return User
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get passwd
     *
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set qq
     *
     * @param string $qq
     *
     * @return User
     */
    public function setQq($qq)
    {
        $this->qq = $qq;

        return $this;
    }

    /**
     * Get qq
     *
     * @return string
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * Set addTime
     *
     * @param \DateTime $addTime
     *
     * @return User
     */
    public function setAddTime($addTime)
    {
        $this->add_time = $addTime;

        return $this;
    }

    /**
     * Get addTime
     *
     * @return \DateTime
     */
    public function getAddTime()
    {
        return $this->add_time;
    }

    /**
     * Set updateTime
     *
     * @param \DateTime $updateTime
     *
     * @return User
     */
    public function setUpdateTime($updateTime)
    {
        $this->update_time = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}
