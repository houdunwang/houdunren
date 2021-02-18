<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use odules\Edu\Transformers\CommentResource;

class MessageResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'model' => $this->resource()
        ];
    }

    /**
     * 站内消息的具体模型
     * @return object
     */
    protected function resource()
    {
        $modelClass = 'Modules\Edu\Entities\\' . $this->data['model'];
        $resourceClass = 'Modules\Edu\Transformers\\' . $this->data['model'] . 'Resource';
        return new $resourceClass($modelClass::find($this->data['id']));
    }
}
