<?php

namespace App\Logic;

class ActivityLoader extends BaseActivityQuery
{
     public function get(int $page = 1, int $limit = 50): array
     {
         $id = rand(10000, 10000000);

         $result = $this->appealPostApi('get', $id, ['page'=> $page, 'limit' => $limit]);

         if(is_string($result) && trim($result[0]) === '{') {
             $result = json_decode($result, true);
         }

         if(!is_array($result)) {
             throw new \Exception('Wrong API response. Data format error.');
         }

         if(!isset($result['id']) || $result['id'] !== (int)$id) {
             throw new \Exception('Wrong API response. The `id` parameter is missing.');
         }

         return $result;
     }
}

