<?php

namespace App\Observers;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ResumeObserver
{
    public function saved(Resume $resume): void
    {
        if ($resume->isDirty('resume') && !is_null($resume->getOriginal('resume'))) {
            Storage::disk('public')->delete($resume->getOriginal('resume'));
        }
    }

    public function deleted(Resume $resume): void
    {
        if (! is_null($resume->resume)) {
            Storage::disk('public')->delete($resume->resume);
        }
    }
}
