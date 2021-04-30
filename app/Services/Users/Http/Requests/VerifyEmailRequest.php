<?php

namespace App\Services\Users\Http\Requests;

use App\Models\User;
use App\Services\Users\Exceptions\AlreadyVerifiedException;
use App\Services\Users\Exceptions\AuthorizeSignatureExpiredException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class VerifyEmailRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if(!hash_equals((string)$this->route('hash'), sha1($this->user->getEmailForVerification()))) {
            return false;
        }

        if(!$this->hasValidSignature()) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    protected function failedAuthorization()
    {
        if($this->user &&
            $this->user->hasVerifiedEmail() &&
            $this->user->hasChangedPassword()
        ) {
            throw App::make(AlreadyVerifiedException::class)
                ->redirectTo('login');
        }

        if(!$this->hasValidSignature()) {
            Auth::login($this->user);
            throw App::make(AuthorizeSignatureExpiredException::class)
                ->redirectTo("verification.notice");
        }
        parent::failedAuthorization();
    }

}
