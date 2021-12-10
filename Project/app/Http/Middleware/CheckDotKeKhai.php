<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin\DotKeKhai;
use Session;

class CheckDotKeKhai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(count(DotKeKhai::where('Enable', 1)->get()) == 0){
            Session::flash('error', 'Phải mở đợt kê khai mới để thực hiện chức năng');
            return redirect()->route('mo-dot-ke-khai');
        }
        return $next($request);
    }
}
