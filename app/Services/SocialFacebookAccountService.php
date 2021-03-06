<?php

namespace App\Services;
use App\Models\SocialFacebookAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $email = ($providerUser->getEmail())? : $providerUser->getId();

            $user = User::whereEmail($email)->first();

            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                    'user_profile' => $providerUser->getAvatar()
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
