<?php
namespace App\Filters;
use Codeigniter\HTTP\RequestInterface;
use Codeigniter\HTTP\ResponseInterface;
use Codeigniter\HTTP\FilterInterface;

/**
 *
 */
class AuthGuard implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if(!session()->get('loggedInUser')){
      return redirect()->to('signin')
    }
  }
  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {

  }
}
