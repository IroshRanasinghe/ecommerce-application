<?php

namespace App\Traits;


/**
 * Trait FlashMessages
 * @package App\Traits
 */
trait FlashMessages
{

    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @var array
     */
    protected $infoMessage = [];

    /**
     * @var array
     */
    protected $successMessages = [];

    /**
     * @var array
     */
    protected $warningMessages = [];


    /**
     * running the switch statement on $type and setting the right property based on type.
     * Then we are checking if the $message is in array format if yes,
     * then we are pushing all values from the array to our array property.
     * If it is a single message then simply pushing the message to our property.
     *
     *
     * @param $message
     * @param $type
     */
    protected function setFlashMessage($message, $type)
    {
        $model = 'infoMessages';

        switch ($type) {
            case 'info':
                {
                    $model = 'infoMessages';
                }
                break;

            case 'error':
                {
                    $model = 'errorMessages';
                }
                break;
            case 'success':
                {
                    $model = 'successMessages';
                }
                break;
            case 'warning':
                {
                    $model = 'warningMessages';
                }
                break;
        }

        if (is_array($message)) {
            foreach ($message as $key => $value) {
                array_push($this->$model, $value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }

    /**
     * return an array of all flash messages properties like above. Pretty simple.
     *
     * @return array
     */
    protected function getFlashMessage()
    {
        return [
            'info' => $this->infoMessage,
            'error' => $this->errorMessages,
            'success' => $this->successMessages,
            'warning' => $this->warningMessages
        ];
    }

    /**
     * Flushing flash message to session
     */
    protected function showFlashMessages()
    {
        session()->flash('info', $this->infoMessage);
        session()->flash('error', $this->errorMessages);
        session()->flash('success', $this->successMessages);
        session()->flash('warning', $this->warningMessages);
    }

}
