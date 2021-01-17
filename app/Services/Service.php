<?php

namespace App\Services;

class Service
{
    protected const MODERATE_BEFORE_DELETING = 1; // Перед видаленням
    protected const MODERATE_MODERATED = 2; // Змодеровано
    protected const MODERATE_TO_MODERATION = 3; // До модерації
    protected const MODERATE_OTHER = 4; // Інше
}
