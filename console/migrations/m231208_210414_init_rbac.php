<?php

use yii\db\Migration;

/**
 * Class m231208_210414_init_rbac
 */
class m231208_210414_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $auth = Yii::$app->authManager;
      
      // create permissions
      $manageTestimonials = $auth->createPermission('manageTestimonials');
      $manageTestimonials->description = 'Manage all testimonials (full access)';
      $auth->add($manageTestimonials);

      $manageProjects = $auth->createPermission('manageProjects');
      $manageProjects->description = 'Manage all projects (full access)';
      $auth->add($manageProjects);

      $manageBlog = $auth->createPermission('manageBlog');
      $manageBlog->description = 'Manage blog (full access)';
      $auth->add($manageBlog);

      $viewProject = $auth->createPermission('viewProject'); // view individual project
      $viewProject->description = 'Project actionView';
      $auth->add($viewProject);

      // create roles
      $testimonialManager = $auth->createRole('testimonialManager');
      $auth->add($testimonialManager);
      // assign permissions to role
      $auth->addChild($testimonialManager, $manageTestimonials);
      $auth->addChild($testimonialManager, $viewProject);

      // create admin role
      $admin = $auth->createRole('admin');
      $auth->add($admin);
      // assign permissions to admin role
      $auth->addChild($admin, $testimonialManager); // copy all permissions from testimonialManager to admin
      $auth->addChild($admin, $manageProjects);
      $auth->addChild($admin, $manageBlog);

      // assign admin role to the "admin" user id: 1
      $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      // remove all auth items
      $auth = Yii::$app->authManager;
      $auth->removeAll();
    }
}
