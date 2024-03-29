<?php

namespace app\controllers;

use app\helpers\SessionHelper;

SessionHelper::run_session();

use app\helpers\UtilHelper;
use app\models\Post;
use app\Router;

/**
 * Class Dashboard controller
 * @package app\controllers
 */
class DashboardController
{
  public static function index()
  {
    if (SessionHelper::get_auth()) {
      $data = Post::getPosts();

      // UtilHelper::log($data);

      Router::render('dashboard', $data);
    } else {
      Router::redirect("/login");
    }
  }
}
