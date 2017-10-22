<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    private $avatarSize = 30;

    public function findOrCreate( ProviderUser $providerUser, $provider )
    {
        $account = LinkedSocialAccount::where( 'provider_name', $provider )
                   ->where('provider_id', $providerUser->getId())
                   ->first();

        if ( $account )
        {
            return $account->user;
        }
        else
        {
            $user = User::where( 'email', $providerUser->getEmail() )->first();

            if ( ! $user )
            {
                $file = $providerUser->getAvatar();

                // resize avatar
                if ( $provider == 'google' )
                {
                    $file = str_replace('sz=50', 'sz=' . $this->avatarSize, $file);
                }
                elseif ( $provider == 'facebook')
                {
                    $file = str_replace('type=normal', 'width=' . $this->avatarSize . '&height=' . $this->avatarSize, $file);
                }
                elseif ( $provider == 'github' )
                {
                    $file .= '&s=' . $this->avatarSize;
                }

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name'  => $providerUser->getName(),
                    'avatar' => $file,
                ]);
            }

            $user->accounts()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }
}
