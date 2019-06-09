<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user, $dashboardUrl)
    {
        $this->setTo($user->email)
            ->setProfile('default')
            ->setSubject(sprintf('Welcome %s', $user->first_name))
            ->setEmailFormat('html')
            ->setViewVars(['firstName' => $user->first_name, 'dashboardUrl' => $dashboardUrl]);
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