<?php

namespace Botble\RealEstate\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\RealEstate\Forms\Fields\FontawesomeSelectField;
use Botble\RealEstate\Http\Requests\NotificationRequest;
use Botble\RealEstate\Models\Notification;
use Throwable;

class NotificationForm extends FormAbstract
{

    /**
     *
     * * @return mixed|void
     * @throws Throwable
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Notification)
            ->setValidatorClass(NotificationRequest::class)
            ->addCustomField('fontawesomeSelect', FontawesomeSelectField::class)
            ->add('message', 'text', [
                'label'      => trans('plugins/real-estate::notification.form.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('plugins/real-estate::notification.form.name'),
                    'data-counter' => 120,
                ],
            ])
            ->add('icon', 'fontawesomeSelect', [
                'label'         => trans('plugins/real-estate::notification.form.icon'),
                'label_attr'    => ['class' => 'control-label'],
                'attr'          => [
                    'placeholder'  => trans('plugins/real-estate::notification.form.icon'),
                    'data-counter' => 60,
                ],
                'default_value' => 'fas fa-check',
            ]);
    }
}
