<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\Response;

    class AdminAuthMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            if ($request->hasHeader('1a47feed85ead3706dad9d5f1724c31e') && $request->header('1a47feed85ead3706dad9d5f1724c31e') == '21232f297a57a5a743894a0e4a801fc3') {
                return $next($request);
            } else {
                return ['status' => 403, 'message' => 'you have no access to this'];
            }
        }
    }
