<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\Response;

    class ClientAuthMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param \Closure(Request): (Response) $next
         */
        public function handle(Request $request, Closure $next): array
        {
            if ($request->hasHeader('1a47feed85ead3706dad9d5f1724c31e') && $request->header('1a47feed85ead3706dad9d5f1724c31e') == '62608e08adc29a8d6dbc9754e659f125') {
                return $next($request);
            } else {
                return ['status'=>403,'message'=>'you have no access to this'];
            }
        }
    }
