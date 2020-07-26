<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
  public $collects = CommentResource::class;

  public function toArray($request)
  {
    return parent::toArray($request);
  }

  public function with($request)
  {
    $user = user();
    $user['admin'] = access('comment');
    return [
      'meta' => [
        'user' => $user,
      ],
    ];
  }
}
