<?php

$routes = [];

if (!function_exists('route_get')) {
  function route_get($segment, $view = null)
  {
    global $routes;
    $routes['GET'][] = [
      'view' => $view,
      'segment' => '/project/' . ltrim($segment, '/'),
    ];
  }
}

if (!function_exists('route_post')) {
  function route_post($segment, $view = null)
  {
    global $routes;
    $routes['POST'][] = [
      'view' => $view,
      'segment' => '/project/' . ltrim($segment, '/'),
    ];
  }
}


if (!function_exists('route_init')) {
  function route_init()
  {
      global $routes;

      $GET_ROUTES = isset($routes['GET']) ? $routes['GET'] : [];
      $POST_ROUTES = isset($routes['POST']) ? $routes['POST'] : [];

      foreach ($GET_ROUTES as $rget) {
          if (segment() == $rget['segment']) {
              view($rget['view']);
          }
      }

      if (isset($_POST) && isset($_POST['_method']) && count($_POST) > 0 && strtolower($_POST['_method']) == 'post') {


          foreach ($POST_ROUTES as $rpost) {
              if (segment() == $rpost['segment']) {
                  view($rpost['view']);
              }
          }

          if (!is_null(segment()) && !in_array(segment(), array_column($POST_ROUTES, 'segment'))) {
              view('404');
              exit();
          }
      }
  }
}

if(!function_exists('redirect')){
  function redirect($path){
    header('Location: '.url($path));
    exit();
  }
}

if (!function_exists('url')) {
  function url($segment)
  {
    $url = '';
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
      $url = 'https://';
    } else {
      $url = 'http://';
    }
    $url .= $_SERVER['HTTP_HOST'];
    //echo $url.'</br>';
    return $url . '/' .'project'.'/'. ltrim($segment, '/');
  }
}

if (!function_exists('segment')) {
  function segment()
  {
    $segment = '/' . ltrim($_SERVER['REQUEST_URI'], '/');
    $removeQueryParam = explode('?', $segment)[0];
    //var_dump($removeQueryParam);
    return $removeQueryParam;
  }
}
//echo url('users');
// var_dump(value: 'https://'.$_SERVER['HTTP_HOST']);