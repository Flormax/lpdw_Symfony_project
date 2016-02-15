<?php

namespace BlogBundle\CookieMessage;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class CookieListener
{
  private $_cookieFlag;

  public function processCookie(FilterResponseEvent $event)
  {
    $request = $event->getRequest();
    $response = $event->getResponse();
    $content = $response->getContent();
    $cookies = $request->cookies;

    if (!($cookies->has('CookieWarning'))){
      $cookie_warning = array(
        'name' => 'CookieWarning',
        'value' => 'unchecked',
        'time' => time() + 3600 * 24 * 7 * 52 * 5
      );
      $this->_cookieFlag = true;
      $cookie = new Cookie($cookie_warning['name'], $cookie_warning['value'], $cookie_warning['time']);
      $response->headers->setCookie($cookie);
      $event->setResponse($response);
    }

    if ($cookies->has('CookieWarning') || $this->_cookieFlag){
      if($cookies->get('CookieWarning') == "unchecked" || $this->_cookieFlag) {
        $html = '<span style="color: white;background-color:red;"> This website uses cookies. By using this website, you agree with his cookies policy</span>';
        $html = $html.'<form action="cookies"><input type="submit" value="OK"></form>';
        $content = preg_replace(
          '#<div>(.*?)</div>#iU',
          '<div>$1'.$html.'</div>',
          $content,
          1
        );
        $response->setContent($content);
        $event->setResponse($response);
      }
    }
  }
}
