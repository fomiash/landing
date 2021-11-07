<?php


namespace App\Logic;


class BaseActivityQuery extends ActivityApi
{
    const ACTIVITY_URL = 'http://127.0.0.1:8000/api/activity/';

    public function createActivityUrl()
    {
        return self::ACTIVITY_URL . '?_token=' . md5('key1:salt') . md5('key2:salt');
    }

    public function appealGetApi(array $options = [])
    {
        return $this->getUrlUsingCurl($this->createActivityUrl(), $this->contextGetOptions() + $options);
    }

    /**
     * POST-запрос по API
     *
     * @param string $method - метод обращения к API
     * @param int $id - контрольный идентификатор для сравнения при ответе API
     * @param array $params - данные для передачи по API
     * @param array $options - дополнительные опции запроса
     * @return bool|string
     */
    public function appealPostApi(string $method, int $id, $params = [], array $options = [])
    {
        $content = json_encode([
            'jsonrpc' => '2.0',
            'id' => $id,
            'method' => $method,
            'params' => $params
        ]);
        return $this->getUrlUsingCurl($this->createActivityUrl(), $this->contextPostOptions($content) + $options);
    }


}

