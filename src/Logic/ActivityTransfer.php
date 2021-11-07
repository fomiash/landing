<?php


namespace App\Logic;


class ActivityTransfer extends BaseActivityQuery
{
    public function get(string $url, \DateTimeInterface $date): array
    {
        $id = rand(10000, 10000000);

        $result = $this->appealPostApi('save', $id, ['url'=> $url, 'visit_at' => $date->format('Y-m-d H:i:s')]);

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

