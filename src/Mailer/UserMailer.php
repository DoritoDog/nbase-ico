<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function verify($user, $verificationUrl)
    {
        $this->setTo($user->email)
            ->setProfile('default')
            ->setSubject(sprintf('Welcome %s', $user->first_name))
            ->setEmailFormat('html')
            ->setViewVars(['firstName' => $user->first_name, 'verificationUrl' => $verificationUrl]);
    }

    public function resetPassword($user, $url)
    {
        $this->setTo($user->email)
            ->setProfile('default')
            ->setSubject('Reset your CryptoToken password')
            ->setEmailFormat('html')
            ->setViewVars(['url' => $url]);
    }
}