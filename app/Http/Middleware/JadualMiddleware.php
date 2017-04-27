<?php

namespace App\Http\Middleware;

use Closure;

class JadualMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if ($request->user()->role == 'penganjur' || $request->user()->role == 'pengguna' || $request->user()->role == 'pentadbir') {
          return $next($request);
      }

      session()->flash('message', 'You dont have permission!');

      return back();
  }
    }
