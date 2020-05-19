<?php

namespace App\Http\Controllers;

use Illuminate\Cache\FileStore;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
/*use Illuminate\Cache\CacheManager;*/
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Illuminate\Contracts\Cache\Factory;

class ProxyController extends BaseController
{
    public function pdfDownload(Request $request)
    {
        if (!$id = Input::get("id")) {
            throw new BadRequestHttpException("Missing ID parameter");
        }

        $cache = Cache::getFacadeRoot();

        if (!$cache->has($id)) {
            $arrContextOptions = [
                "ssl" => [
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ],
            ];

            $content = file_get_contents(\config('constants.UrlWebService') . "api/Site/GetElencoImmagini?idSezione={$id}", false, stream_context_create($arrContextOptions));
            $content = json_decode($content,true);

            foreach($content["data"] as $key => $value)
            {
                if($value["idSezione"] == $id){
                    $expiresAt = new \DateTime();
                    $cache->put($id, $value["id"], $expiresAt->modify("+24 hours"));

                }
            }
        }

        return $cache->get($id);
    }
    
    
    
    
    
    
    public function pdfDownloadMultipleData(Request $request)
    {
        if (!$id = Input::get("id")) {
            throw new BadRequestHttpException("Missing ID parameter");
        }

        $cache = Cache::getFacadeRoot();

        if (!$cache->has($id)) {
            $arrContextOptions = [
                "ssl" => [
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ],
            ];

            $content = file_get_contents(\config('constants.UrlWebService') . "api/Site/GetElencoImmagini?idSezione={$id}", false, stream_context_create($arrContextOptions));
            $content = json_decode($content,true);

            foreach($content["data"] as $key => $value)
            {
                if($value["idSezione"] == $id){
                    $expiresAt = new \DateTime();
                    $cache->put($id,
                    [
                        "id" => $value["id"],
                        "name" => $value["name"]
                    ], 
                    $expiresAt->modify("+24 hours"));

                }
            }
        }

        return $cache->get($id);
    }
}