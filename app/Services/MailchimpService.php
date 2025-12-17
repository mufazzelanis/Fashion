<?php

namespace App\Services;

use DrewM\MailChimp\MailChimp;

class MailchimpService
{
    protected MailChimp $mailchimp;

    protected string $listId;

    public function __construct()
    {
        $this->mailchimp = new MailChimp(config('services.mailchimp.key'));
        $this->listId = config('services.mailchimp.list_id');
    }

    public function subscribe(
        string $email,
        ?string $firstName = null,
        ?string $lastName = null
    ): array {
        $emailHash = md5(strtolower($email));

        return $this->mailchimp->put(
            "lists/{$this->listId}/members/{$emailHash}",
            [
                'email_address' => $email,
                'status_if_new' => 'subscribed',
                'status' => 'subscribed',
                'merge_fields' => [
                    'FNAME' => $firstName ?? '',
                    'LNAME' => $lastName ?? '',
                ],
            ]
        );
    }

    public function contact(
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $phone = null
    ): array {
        $emailHash = md5(strtolower($email));

        return $this->mailchimp->put(
            "lists/{$this->listId}/members/{$emailHash}",
            [
                'email_address' => $email,
                'status_if_new' => 'subscribed',
                'status' => 'subscribed',
                'merge_fields' => [
                    'FNAME' => $firstName ?? '',
                    'LNAME' => $lastName ?? '',
                    'PHONE' => $phone ?? '',
                ],
                'tags' => ['ContactUs'],
            ]
        );
    }

    /**
     * Unsubscribe a user
     */
    public function unsubscribe(string $email): array
    {
        $emailHash = md5(strtolower($email));

        return $this->mailchimp->patch(
            "lists/{$this->listId}/members/{$emailHash}",
            [
                'status' => 'unsubscribed',
            ]
        );
    }

    /**
     * Add Tag to subscriber
     */
    public function addTag(string $email, string $tag): array
    {
        $emailHash = md5(strtolower($email));

        return $this->mailchimp->post(
            "lists/{$this->listId}/members/{$emailHash}/tags",
            [
                'tags' => [
                    [
                        'name' => $tag,
                        'status' => 'active',
                    ],
                ],
            ]
        );
    }

    /**
     * Check Mailchimp last error (debug)
     */
    public function lastError(): ?string
    {
        return $this->mailchimp->getLastError();
    }
}
