<?php

namespace App\Validation;

use App\Models\userModel;

class userRules
{
    // Méthode qui vérifie si les données d'un utilisateur envoyé par formualaire correspondondent aux données en BDD 
    public function validateUser(string $str, string $fields, array $data)
    {
        // On compare l'email envoyé par formulaire avec les emails en BDD
        $dbUser = new userModel();
        $user = $dbUser->where('email_user', $data['email'])
                        ->first();
        // Si pas d'email correspondant retourne faux
        if(!$user)
            return false;
            // Sinon on compare le mot de passe envoyé via formulaire (data) avec le mot de passe en BDD (user)
            return password_verify($data['password'], $user['password_user']);

    }
}