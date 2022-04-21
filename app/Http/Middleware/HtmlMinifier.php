<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HtmlMinifier
{

    public function minifyHTML($htmlString)
    {
//        $replace = [
//            '<!--(.*?)-->' => '', //remove comments
//            "/<\?php/" => '<?php ',
//            "/\n([\S])/" => '$1',
//            "/\r/" => '', // remove carriage return
//            "/\n/" => '', // remove new lines
//            "/\t/" => '', // remove tab
//            "/\s+/" => ' ', // remove spaces
//        ];
        $search = [
            '/\>\s+/s',
            '/\s+</s',
        ];

        $replace = [
            '> ',
            ' <',
        ];
        return preg_replace($search, $replace, $htmlString);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        $response = $next($request);

        $contentType = $response->headers->get('Content-Type');
        if (strpos($contentType, 'text/html') !== false) {
            $response->setContent($this->minifyHTML($response->getContent()));
        }

        return $response;

    }
}
