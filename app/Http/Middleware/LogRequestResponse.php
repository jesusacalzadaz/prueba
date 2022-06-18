<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class LogRequestResponse 
{
    protected $start = 0;
    protected $end = 0;

    public function handle($request, Closure $next){
        $this->start = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response){
        $this->end = microtime(true);
        $this->log($request, $response);
    }

    protected function log($request, $response){

        $duration = $this->end - $this->start;
        $url = $request->fullUrl();
        $method = $request->getMethod();
        $ip = $request->getClientIp();
        $status = $response->status(); 
        if($request->path() == "api/login"){
            $requestContent = "";
        }else{
            $requestContent = json_encode($request->all());
        }
        if(config("app.debug")){
            $responseContent = json_encode($response->getOriginalContent());
        }else{
            $responseContent = "";
        }
        $date = date("Y-m-d H:i:s");
        $log = "{$date} {$ip}: [{$status}] {$method}@{$url} - {$duration}ms {$requestContent} {$responseContent}";
        Log::info($log);
    }


}
