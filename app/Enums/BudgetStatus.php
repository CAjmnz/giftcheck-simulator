<?php

namespace App\Enums;

class BudgetStatus
{
    public const DRAFT = 'draft';

    public const PENDING = 'pending';

    public const APPROVED = 'approved';

    public const ALLOCATED = 'allocated';

    public const RELEASED = 'released';

    public const VERIFIED = 'verified';

    public const COMPLETED = 'completed';

    public const CANCELLED = 'cancelled';
}
