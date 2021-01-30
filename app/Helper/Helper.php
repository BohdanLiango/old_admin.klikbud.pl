<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;

class Helper
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
