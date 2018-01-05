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
        $img = \Image::make(file_get_contents($path.'/'.$filename))->widen(300)->stream();
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

if (! function_exists('generateUser')) {
   function generateUser($user)
   {
        if ($user) {
            return $user->username;
        }

        return '-';
   }
}

if (! function_exists('generateTag')) {
   function generateTag($tags)
   {
        $tag = '';

        foreach ($tags as $key => $value) {
            if ($key > 0) {
                $tag .= ', ';
            }

            $tag .= $value->name;
        }

        return $tag;
   }
}

if (! function_exists('generateTagToArray')) {
   function generateTagToArray($model)
   {
        return $model->tags()->pluck('name')->toArray();
   }
}

if (! function_exists('getDateFormatGeneral')) {
   function getDateFormatGeneral($dateRange, $index, $separator = '/', $delimiter = ' - ')
   {
        return dateFormatGeneral(explode($delimiter, $dateRange)[$index], $separator);
   }
}

if (! function_exists('generateExpiredClass')) {
   function generateExpiredClass($date, $warning = 0)
   {
        $class = '';
        $now = \Carbon\Carbon::now();
        $then = $now->copy()->addDays($warning)->endOfDay();
        $date = \Carbon\Carbon::parse($date)->endOfDay();

        if ($date->lt($now)) {
            $class = 'danger';
        }

        if ($date->between($now->endOfDay(), $then)) {
            $class = 'warning';
        }

        return $class;
   }
}

if (! function_exists('generateRemainingDays')) {
   function generateRemainingDays($date)
   {
        $date = \Carbon\Carbon::parse($date)->endOfDay();
        $remain = \Carbon\Carbon::now()->endOfDay()->diffInDays($date, false);

        if ($remain <= 0) {
            return 'Waktu Habis';
        }

        return $remain.' hari';
   }
}

if (! function_exists('getDataKanan')) {
   function getDataKanan()
   {
        $kanan = [
            'publikasis' => \App\Models\Publikasi::getDataByKat([], 5, true)->get(),
            'populars' => \App\Models\Berita::getPopular(5)->get(),
            'populars2' => \App\Models\Publikasi::getPopular(5)->get(),
            'ppids' => '',
            'layanans' => \App\Models\Layanan::with(['katbagian', 'user'])->take(3)->get()
        ];

        return $kanan;
   }
}

if (! function_exists('generateBtnClass')) {
   function generateBtnClass($key)
   {
        $class = [
            'btn-danger',
            'btn-warning',
            'btn-success',
            'btn-primary',
            'btn-info',
            'btn-default',
        ];

        return $class[$key % 6];
   }
}

?>