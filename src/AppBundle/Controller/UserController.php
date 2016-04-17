<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16/4/16
 * Time: 上午10:06
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class UserController extends Controller
{

    /**
     * 用户列表
     * @Route("/user/list",name="user_list")
     *
     * @return Response
     */
    public function listAction(Request $request){
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository("AppBundle:User");
        $user_list = $repository->findAll();
        return $this->render("default/user_list.html.twig",['list'=>$user_list]);
    }

    /**
     * 添加新用户
     * @Route("/user/add",name="user_add")
     * @param Request $request
     *
     * @return Response
     */
    public function addAction(Request $request){
        #post提交处理数据,get请求展示页面
        if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $name = $request->get('name');
            $passwd = trim($request->get('passwd'));
            $passwd2 = $request->get('passwd2');
            $nick_name = trim($request->get('nick_name'));
            $email = trim($request->get('email'));
            $phone = trim($request->get('phone'));
            $qq = trim($request->get('qq'));
            $sex = trim($request->get('sex'));
            $db_result = true;
            try{
                $em = $this->getDoctrine()->getManager();
                $user = new User();
                $user->name = $name;
                $user->nick_name = $nick_name;
                $user->passwd = md5($passwd);
                $user->email = $email;
                $user->phone = $phone;
                $user->qq = $qq;
                $user->sex = $sex;
                $user->setIsActive(true);
                $user->add_time = new \DateTime();
                $user->update_time = new \DateTime();
                $em->persist($user);
                $em->flush();
            }catch (Exception $e){
                $db_result = false;
            }
            #重定向列表页
            return $this->redirectToRoute('user_list');
        }
        return $this->render('default/user_add.html.twig');
    }

    /**
     * 编辑用户信息
     * @Route("/user/edit/{user_id}",requirements={
     *      "user_id" : "\d+"
     *  },name="user_edit")
     * @param Request $request
     *
     * @return Response
     */
    public function editAction(Request $request){
        $user_id = intval($request->get('user_id'));
        #根据user_id获得用户数据
        $manager = $this->getDoctrine()->getManager();
        $user_info = $manager->getRepository('AppBundle:User')->find($user_id);
        if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            #获取表单数据
            $name = $request->get('name');
            $nick_name = trim($request->get('nick_name'));
            $email = trim($request->get('email'));
            $phone = trim($request->get('phone'));
            $qq = trim($request->get('qq'));
            $sex = trim($request->get('sex'));

            #根据表单内容更新对象
            if($nick_name != $user_info->nick_name) $user_info->nick_name = $nick_name;
            if($email != $user_info->email) $user_info->email = $email;
            if($phone != $user_info->phone) $user_info->phone = $phone;
            if($sex != $user_info->sex) $user_info->sex = $sex;
            if($qq != $user_info->qq) $user_info->qq = $qq;
            $user_info->update_time = new \DateTime();
            $manager->flush();

            return $this->redirectToRoute('user_list');
        }
        return $this->render("default/user_edit.html.twig",['user_info' => $user_info]);
    }
}