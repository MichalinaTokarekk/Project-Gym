<?php

namespace App\Http\Livewire\Actions;

use App\Models\Competition;
use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class CompetitionSignAction extends Action
{
    public $title = '';
    public $icon = 'trash';


    public function __construct(?String $title = null)
    {
        parent::__construct();
        if ($title !== null) {
            $this->title = $title;
        } else {
            $this->title = __('translation.actions.destroy');
        }
    }

    protected function dialogTitle(): String 
    {
        return __('translation.dialogs.soft_delete.title');
    }

    protected function dialogDescription(Model $model): String 
    {
        return __('translation.dialogs.soft_delete.opis', [
            'model' => $model
        ]);
    }

    public function handle($model, Competition $competition, View $view)
    {
        $view->dialog()->confirm([
            'title' => $this->dialogTitle(),
            'description' => $this->dialogDescription($model),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'competitionSign',
                'params' => $model->id, $competition, 
            ],
            'reject' => [
                'label' => __('translation.no'),
            ]
        ]);
    }


    // public function renderIf($model, View $view)
    // {
    //     return request()->user()->can('delete', $model);
    // }
}
