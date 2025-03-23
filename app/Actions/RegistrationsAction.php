<?php
namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class RegistrationsAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Registrations';
    }

    public function getIcon()
    {
        return 'voyager-people';
    }

    public function getPolicy()
    {
        return 'browse';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    public function getRoute($key)
    {
        return route('voyager.event-registrations.index');
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'events' || $this->dataType->slug == 'event_management';
    }

    // 🔥 **Add this missing method**
    public function getDefaultRoute()
    {
        return route('voyager.event-registrations.index');
    }
}
