<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 11/8/2016 AD
 * Time: 20:43
 */
namespace frontend\rbac;

use yii\rbac\Rule;

/**
 * Checks if authorID matches user passed via params
 */
class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return (\Yii::$app->authManager-> getAssignment('admin',$user) || \Yii::$app->authManager-> getAssignment('supperadmin',$user)) ? true : (isset($params['content']) ? $params['content']->user_id == $user : false);
    }
}