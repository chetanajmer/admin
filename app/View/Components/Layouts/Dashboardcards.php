<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dashboardcards extends Component
{
    public $title;
    public  $total;
    public $description;
    public $icon,$colorclass;
    /**
     * Create a new component instance.
     */
    public function __construct($title,$total,$description,$icon,$colorclass)
    {
        $this->title=$title;
        $this->total=$total;
        $this->description=$description;
        $this->icon=$icon;
        $this->colorclass=$colorclass;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.dashboardcards');
    }
}
