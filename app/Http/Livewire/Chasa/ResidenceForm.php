<?php

namespace App\Http\Livewire\Chasa;

use App\Mail\Chasa\ResidencePriceList;
use App\Services\Users\Attention;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ResidenceForm extends Component
{
    /**
     * @var string
     */
    public $attention;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $city;

    /**
     * @var bool
     */
    public $hasBeenSubmitted = false;

    /**
     * @var string[]
     */
    protected $listeners = ['assignLocationResidenceForm'];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('templates.chasa.livewire.residence-form');
    }


    public function handleSubmit()
    {
        $this->hasBeenSubmitted = true;
        $this->validate();

        Mail::to($this->email)
            ->send(new ResidencePriceList($this));

        flash(__('components.residenceForm.successSend'), 'success');

        $this->reset('attention', 'firstName', 'lastName', 'email', 'hasBeenSubmitted');
    }

    /**
     * @param string $propertyName
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated(string $propertyName)
    {
        if ($this->hasBeenSubmitted) {
            $this->validateOnly($propertyName);
        }
    }

    /**
     * @return array
     */
    protected function rules(): array
    {
        return  [
            'attention' => ['required', Rule::in(Attention::toArray())],
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'email' => 'required|email',
            'country' => 'required|min:2',
            'city' => 'required|min:2',
        ];
    }

    /**
     * @param array $location
     */
    public function assignLocationResidenceForm(array $location){
        $this->city = $location['city'] ?? null;
        $this->country = $location['country'] ?? null;
    }
}
