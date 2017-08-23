<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $name = explode(" ",$providerUser->getName());

                $user = User::create([
                    'Fullname' => $providerUser->getName(),
                ]);
                PersonalInfo::create([
                    'User_id' => $user->User_id,
                    'Firstname' => $name[0],
                    'Lastname' => ($name[1]) ? $name[1] : '',
                    'Picture' => $providerUser->getAvatar(),
                    'Nickname' => $providerUser->getNickname(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}