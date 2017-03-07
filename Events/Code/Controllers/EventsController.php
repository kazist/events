<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

/**
 * Description of EventsController
 *
 * @author sbc
 */

namespace Events\Events\Code\Controllers;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Controller\BaseController;

class EventsController extends BaseController {

    public function detailAction($id = '', $slug = '') {

        $this->data_arr['item'] = $this->model->getRecord();
     
        return parent::detailAction($id, $slug);
    }

}
