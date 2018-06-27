<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      if ($request->header('Authorization')) {

          $key = explode(' ',$request->header('Authorization'));

          if(isset($key[1])){
              $user = User::where('token', $key[1])->first();
              if(!empty($user)){
                  $request->request->add([
                      'userId' => $user->id,
                      'userPerfil' => $user->perfil
                  ]);
                  return $next($request);
              }
          }
      }
      return response('Não autorizado.', 401);
    }
}
