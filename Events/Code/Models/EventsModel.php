<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Events\Events\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Search\Indexes\Code\Classes\ContentIndexing;
use Kazist\Service\Database\Query;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class EventsModel extends BaseModel {

    public function getRecord($id = '') {

        $where_arr = array();
        $parameter_arr = array();

        $slug = $this->request->get('slug');
        $id = ($id) ? $id : $this->request->get('id');

        $query = $this->getQueryBuilder();

        if ($id) {
            $where_arr[] = $this->table_alias . '.id=:id';
            $parameter_arr['id'] = $id;
        } elseif ($slug) {
            $where_arr[] = $this->table_alias . '.slug=:slug';
            $parameter_arr['slug'] = $slug;
        } else {
            $where_arr[] = '1=-1';
        }

        $this->addWhereToQuery($query, $where_arr, $parameter_arr);

        $record = $query->loadObject();

        $document = $this->container->get('document');
        $document->record_id = $record->id;

        return json_decode(json_encode($record));
    }

}
