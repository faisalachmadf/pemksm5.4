<?php

if (! function_exists('generateAction')) {
   function generateAction($param, $id = 0)
   {
        $action = '';

        if (array_key_exists('action', $param)) {
            if (in_array('show', $param['action'])) {
                $route = route($param['url'].'.show', $id);
                $action .= ' <a href="'.$route.'" class="btn btn-xs btn-info" title="Detail"><i class="fa fa-list"></i></a>';
            }

            if (in_array('edit', $param['action'])) {
                $route = route($param['url'].'.edit', $id);
                $action .= ' <a href="'.$route.'" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>';
            }

            if (in_array('destroy', $param['action'])) {
                $route = route($param['url'].'.destroy', $id);
                $action .= ' <a href="'.$route.'" data-method="delete" data-token="'.csrf_token().'" data-confirm="Apakah anda yakin?" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a>';
            }
        }

        return $action;
   }
}

?>