<?php

namespace App\Extensions;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

//Classe para herdar de EloquentUserProvider, de modo a autenticar usando sha256 com salt

class EloquentUserProvider_salt_sha256 extends EloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $plainPassword = $credentials['password'];
        
        // Retrieve the salt from the user model (adjust column name as needed)
        $salt = $user->salt; 

        // Replicate your legacy hashing logic
        // Example: sha256(password + salt)
        $hash = hash('sha256', $plainPassword . $salt);

        return hash_equals($user->getAuthPassword(), $hash);
    }
}