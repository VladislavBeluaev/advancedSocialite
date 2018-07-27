<?php

namespace App\Policies;

use App\{User,News};
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(User $user)
    {
        //dd($user->email=='beluaev.vladislav@mail.ru');
        return $user->email!='beluaev.vladislav@mail.ru'?TRUE:FALSE;
    }
    public function show(User $user)
    {
        return true;
    }

    public function edit(User $user, News $news)
    {
        return $user->owns($news);
    }
}
