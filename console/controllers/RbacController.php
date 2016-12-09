<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "createProfile" permission
        $createProfile = $auth->createPermission('createProfile');
        $createProfile->description = 'Create a profile';
        $auth->add($createProfile);

        // add "updateProfile" permission
        $updateProfile = $auth->createPermission('updateProfile');
        $updateProfile->description = 'Update profile';
        $auth->add($updateProfile);

        // add "user" role and give this role the "createProfile" and "updateProfile" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $createProfile);
        $auth->addChild($user, $updateProfile);

        // add "admin" role and give this role the "updateProfile" permission
        // as well as the permissions of the "user" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateProfile);
        // $auth->addChild($admin, $user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }
}
