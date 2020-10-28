<?php

namespace Isaac\Core\Helpers;

class Controller{

    /**
     * model
     *Lets us load model from the controllers
     * @param  string $model
     *
     * @return object
     */
    public function model(string $model) : object
    {
        $model = "Isaac\\App\\Models\\$model";

        return new $model();
    }
}