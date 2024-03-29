<?php

namespace Corals\Utility\Webhook\Http\Requests;

use Corals\Foundation\Http\Requests\BaseRequest;
use Corals\Utility\Webhook\Models\Webhook;

class WebhookRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->setModel(Webhook::class);

        return $this->isAuthorized();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
