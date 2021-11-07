<?php


namespace App\Logic;


class ActivityApi
{
    private $postHeaders = ['Content-Type:' => 'application/x-www-form-urlencoded'];

    private $getHeaders = ['Content-Type:' => 'application/rss+xml'];

    /**
     * Возвращает сформированные заголовки для GET-запроса
     * @return array
     */
    protected function contextGetOptions()
    {
        return [
            'method' => 'GET',
            'ignore_errors' => true,
            'header' => $this->postHeaders
        ];
    }

    /**
     * Возвращает сформированные заголовки для POST-запроса c телом сообщения
     * @param string $content
     * @return array
     */
    protected function contextPostOptions(string $content = '')
    {
        return [
            'method' => 'POST',
            'ignore_errors' => true,
            'header' => $this->getHeaders,
            'content' => $content
        ];
    }

    /**
     * Возвращает результат взаимодействия с API по всем запросам через cURL
     * @param string $url - на какой  url отправлять запрос
     * @param array $data - может использовать как массив, так и строку с параметрами
     * @return bool|string
     */
    protected function getUrlUsingCurl($url, $data)
    {
        if (!function_exists("curl_init")) {
            return false;
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $data['method']);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $data['header']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($data['method'] == 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
        }
        if (isset($data['content'])) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data['content']);
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
}

