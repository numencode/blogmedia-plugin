<?php namespace NumenCode\BlogMedia\Classes;

use RainLab\Blog\Models\Post;

class ExtendBlogPostModel
{
    public function init()
    {
        Post::extend(function ($model) {
            $model->jsonable([
                'gallery',
                'files',
            ]);

            $model->addDynamicMethod('hasGallery', function () use ($model) {
                return $model->gallery !== null && $model->gallery !== "";
            });

            $model->addDynamicMethod('hasFiles', function () use ($model) {
                return $model->files !== null && $model->files !== "";
            });

            $model->addDynamicMethod('gallery', function () use ($model) {
                $files = [];

                if ($model->gallery != null) {
                    foreach ($model->gallery as $id => $file) {
                        $files[] = ['name' => basename($file['picture']), 'path' => $file['picture']];
                    }
                }

                return $files;
            });

            $model->addDynamicMethod('files', function () use ($model) {
                $files = [];

                if ($model->files != null) {
                    foreach ($model->files as $id => $file) {
                        $files[] = ['name' => basename($file['file']), 'path' => $file['file']];
                    }
                }

                return $files;
            });
        });
    }
}
