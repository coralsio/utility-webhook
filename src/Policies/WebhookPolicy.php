<?php

namespace Corals\Utility\Webhook\Policies;

use Corals\Foundation\Policies\BasePolicy;
use Corals\Utility\Webhook\Models\Webhook;
use Corals\User\Models\User;

class WebhookPolicy extends BasePolicy
{
    protected $administrationPermission = 'Administrations::admin.utility';

    protected $skippedAbilities = [
        'process', 'create',
    ];

    public function view(User $user)
    {
        return $user->can('Utility::webhook.view');
    }

    /**
     * @param User $user
     * @param Webhook $webhook
     * @return bool
     */
    public function process(User $user, Webhook $webhook)
    {
        if (in_array($webhook->status, ['pending', 'failed']) && $user->can('Utility::webhook.process')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @param Webhook $webhook
     * @return bool
     */
    public function destroy(User $user, Webhook $webhook)
    {
        return $user->can('Utility::webhook.delete');
    }
}
