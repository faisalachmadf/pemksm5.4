<?php

if (! function_exists('generateAction')) {
   function generateAction($param, $slug = 0)
   {
        $action = '';

        if (array_key_exists('action', $param)) {
            if (in_array('show', $param['action'])) {
                $route = route($param['url'].'.show', $slug);
                $action .= ' <a href="'.$route.'" class="btn btn-xs btn-info" title="Detail"><i class="fa fa-list"></i></a>';
            }

            if (in_array('edit', $param['action'])) {
                $route = route($param['url'].'.edit', $slug);
                $action .= ' <a href="'.$route.'" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>';
            }

            if (in_array('destroy', $param['action'])) {
                $route = route($param['url'].'.destroy', $slug);
                $action .= ' <a href="'.$route.'" data-method="delete" data-token="'.csrf_token().'" data-confirm="Apakah anda yakin?" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a>';
            }
        }

        return $action;
   }
}

if (! function_exists('generateImagePath')) {
   function generateImagePath($folder, $image, $title = '')
   {
        $path = 'image/';

        return '<a href="javascript:void(0)" class="thumbnail" data-src="'.asset($path.$folder.'/'.$image).'" data-title="'.$title.'"><img src="'.asset($path.$folder.'/thumbnail/'.$image).'" class="img-responsive" alt="'.$title.'"></a>';
   }
}

if (! function_exists('generateThumbnail')) {
   function generateThumbnail($path, $filename)
   {
        ini_set('memory_limit', '256M');
        $img = \Image::make(asset($path.'/'.$filename))->widen(300)->stream();
        \Storage::put($path.'/thumbnail/'.$filename, $img);
   }
}

if (! function_exists('deleteImageThumbnail')) {
   function deleteImageThumbnail($path, $filename)
   {
        $image = $path.'/'.$filename;
        $thumbnail = $path.'/thumbnail/'.$filename;

        if (\Storage::exists($image)) {
            \Storage::delete($image);
        }

        if (\Storage::exists($thumbnail)) {
            \Storage::delete($thumbnail);
        }
   }
}

if (! function_exists('dateFormatGeneral')) {
   function dateFormatGeneral($date, $separator = '/')
   {
        return implode('-', array_reverse(explode($separator, $date)));
   }
}

if (! function_exists('dateFormatIndo')) {
   function dateFormatIndo($date, $separator = '/')
   {
        return implode($separator, array_reverse(explode('-', $date)));
   }
}

if (! function_exists('generateFileDownload')) {
   function generateFileDownload($url, $file, $title = '')
   {
        return '<a href="'.$url.'" title="'.$title.'">'.$file.'</a>';
   }
}

?>