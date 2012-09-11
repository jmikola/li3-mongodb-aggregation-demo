<?php

namespace app\controllers;

use lithium\data\Connections;

class DemoController extends \lithium\action\Controller
{
    public function index()
    {
        return $this->render();
    }

    public function aggregate()
    {
        $mongodb = Connections::get('default')->connection;

        $page = isset($this->request->query['page'])
            ? (int) $this->request->query['page']
            : 1;
        $limit = 6;
        $skip = $page;

        $results = $mongodb->money->aggregate([
            [ '$project' => [
                'minute' => (object)[
                    '0' => [ '$year'       => '$ts' ],
                    '1' => [ '$month'      => '$ts' ],
                    '2' => [ '$dayOfMonth' => '$ts' ],
                    '3' => [ '$hour'       => '$ts' ],
                    '4' => [ '$minute'     => '$ts' ],
                ],
                'ts'  => 1,
                'bid' => 1,
                'ask' => 1,
            ]],
            [ '$sort' => [ 'ts' => 1 ] ],
            [ '$group' => [
                '_id'       => '$minute',
                'ts'        => [ '$first' => '$ts'  ],
                'bid_open'  => [ '$first' => '$bid' ],
                'bid_close' => [ '$last'  => '$bid' ],
                'bid_high'  => [ '$max'   => '$bid' ],
                'bid_low'   => [ '$min'   => '$bid' ],
                'bid_avg'   => [ '$avg'   => '$bid' ],
            ]],
            [ '$sort' => [ 'ts' => 1 ] ],
            [ '$skip' => $skip ],
            [ '$limit' => $limit ],
            [ '$project' => [
                '_id' => '$ts',
                'bid' => [
                    'open'  => '$bid_open',
                    'close' => '$bid_close',
                    'high'  => '$bid_high',
                    'low'   => '$bid_low',
                    'avg'   => '$bid_avg',
                ]
            ]],
        ]);

        // Convert MongoDate objects to ISO 8601
        foreach ($results as $i => $_) {
            $results[$i]['_id'] = date('c', $_['_id']->sec);
        }

        return $results;
    }
}
