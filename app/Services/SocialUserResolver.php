<?php
namespace App\Services;
use Exception;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Facades\Socialite;
class SocialUserResolver implements SocialUserResolverInterface
{
    /**
     * Resolve user by provider credentials.
     *
     * @param string $provider
     * @param string $accessToken
     *
     * @return Authenticatable|null
     */
    public function resolveUserByProviderCredentials(string $provider, string $accessToken): ?Authenticatable
    {
        $providerUser = null;

        try {
        } catch (Exception $exception) {}
        $providerUser = Socialite::driver($provider)->userFromToken($accessToken);

        if ($providerUser) {
            return (new SocialService())->findOrCreate($providerUser, $provider);
        }
        return null;
    }
}
