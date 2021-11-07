<?php


namespace App\Logic;


class Pagination
{
      public function getData(array $data, int $page = 1, int $limit = 50)
      {
          foreach($data as $d) {
              $data[$d]['url'] = rtrim($data[$d]['url'], ' /');
          }
          return [
              'previous_page' => $page > 1 ? $this->generatePageURL($page - 1) : false,
              'next_page' => count($data) >= $limit ? $this->generatePageURL($page + 1) : false,
              'data' => $data,
              'page' => $page
          ];

      }

      public function generatePageURL(int $number) {
          return '/admin/admin/?page=' . $number;
      }
}

