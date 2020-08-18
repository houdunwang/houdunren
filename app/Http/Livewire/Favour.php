<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Edu\Entities\Topic;
use Route;

class Favour extends Component
{
    public $model;

    protected $listeners = ['change' => 'change'];

    public function mount($model)
    {
        $this->model = $model;
    }

    public function change()
    {
        if (!auth()->check()) {
            request()
                ->session()
                ->push('url.intended', $this->model->link());
            return $this->redirect(route('auth.login'));
        }

        $this->model->favour();
    }

    public function getFieldProperty()
    {
        return $this->model->find($this->model->id);
    }

    public function render()
    {
        return view('livewire.favour');
    }
}
