<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethod('GET') && ! $request->is('admin*') && ! $request->is('images*') && ! $request->is('css*') && ! $request->is('js*')) {
            Visit::create([
                'user_id' => $request->user()?->id,
                'path' => '/' . ltrim($request->path(), '/'),
                'ip' => $request->ip(),
                'user_agent' => substr((string) $request->userAgent(), 0, 255),
            ]);
        }

        return $response;
    }
}
