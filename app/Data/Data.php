<?php

namespace App\Data;

use Illuminate\Support\Facades\Auth;

class Data
{
    /**
     * Check authorize
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }
}
