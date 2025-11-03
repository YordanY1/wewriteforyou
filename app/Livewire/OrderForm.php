<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\PriceCalculator;
use App\Models\{
    Addon,
    Order,
    AssignmentType,
    Service,
    AcademicLevel,
    Subject,
    Language,
    Style
};
use Illuminate\Support\Facades\Auth;

class OrderForm extends Component
{
    use WithFileUploads;

    public $email, $subject, $instructions, $files = [];
    public $finalPrice = 0;
    public $words = '';
    public int $wordsInt = 0;
    public array $selectedAddons = [];
    public string $deadline_option = '7d';

    public $assignment_type_id, $sub_assignment_type_id, $service_id, $academic_level_id, $subject_id, $language_id = 1, $style_id;
    public $topic;

    public $pricing_type = 'writing';

    public function updatedWords($value)
    {
        $this->words = $value;

        $this->wordsInt = (int) preg_replace('/\D/', '', $value);

        $this->calculatePrice();
    }



    public function updatedDeadlineOption()
    {
        $this->calculatePrice();
    }

    public function updatedSelectedAddons()
    {
        $this->calculatePrice();
    }

    public function mount()
    {
        if (Auth::check() && !$this->email) {
            $this->email = Auth::user()->email;
        }
    }


    public function updatedServiceId($value)
    {
        $service = Service::find($value);

        if ($service) {
            if (in_array(strtolower($service->slug), ['editing', 'proofreading'])) {
                $this->pricing_type = 'editing';
            } else {
                $this->pricing_type = 'writing';
            }
        }

        $this->calculatePrice();
    }


    public function calculatePrice()
    {
        if (!$this->wordsInt || !$this->service_id) {
            $this->finalPrice = 0;
            return;
        }

        $calculator = new PriceCalculator();

        $this->finalPrice = $calculator->calculate(
            $this->wordsInt,
            $this->deadline_option,
            $this->selectedAddons,
            $this->pricing_type
        );
    }


    public function submitOrder()
    {
        $this->validate([
            'assignment_type_id' => 'required|exists:assignment_types,id',
            'service_id'         => 'required|exists:services,id',
            'academic_level_id'  => 'required|exists:academic_levels,id',
            'subject_id'         => 'required|exists:subjects,id',
            'language_id'        => 'required|exists:languages,id',
            'style_id'           => 'required|exists:styles,id',
            'topic'              => 'required|string|max:255',
            'wordsInt'           => 'required|integer|min:275',
            'deadline_option'    => 'required|string',
            'instructions'       => 'required|string|min:10',
            'files'              => 'required|array|min:1',
            'files.*'            => 'file|max:153600',
        ] + (Auth::check() ? [] : ['email' => 'required|email']));

        $calculator = new PriceCalculator();
        $priceData = $calculator->calculate(
            $this->wordsInt,
            $this->deadline_option,
            $this->selectedAddons,
            $this->pricing_type,
            detailed: true
        );

        $order = Order::create([
            'user_id'           => Auth::id(),
            'email'             => Auth::check() ? Auth::user()->email : $this->email,
            'assignment_type_id' => $this->assignment_type_id,
            'service_id'        => $this->service_id,
            'academic_level_id' => $this->academic_level_id,
            'subject_id'        => $this->subject_id,
            'topic'             => $this->topic,
            'language_id'       => $this->language_id,
            'style_id'          => $this->style_id,
            'words'             => $this->wordsInt,
            'deadline_option'   => $this->deadline_option,
            'instructions'      => $this->instructions,
            'base_price'        => $priceData['base'],
            'final_price'       => $priceData['total'],
            'currency_id'       => 1,
            'reference_code'    => strtoupper(uniqid('ORD-')),
        ]);

        foreach ($priceData['addons'] as $addon) {
            $order->addons()->create([
                'addon_id' => $addon['id'],
                'price'    => $addon['price'],
            ]);
        }

        foreach ($this->files as $file) {
            $path = $file->store("orders/{$order->id}", 'public');
            $order->files()->create([
                'path'          => $path,
                'original_name' => $file->getClientOriginalName(),
                'mime_type'     => $file->getMimeType(),
                'size'          => $file->getSize(),
            ]);
        }

        $session = \App\Http\Controllers\PaymentController::createCheckoutSession($order);
        $this->dispatch('redirect-to-stripe', url: $session->url);
    }

    public function render()
    {
        return view('livewire.order-form', [
            'addons'          => Addon::all(),
            'assignmentTypes' => AssignmentType::all(),
            'services'        => Service::all(),
            'levels'          => AcademicLevel::all(),
            'subjects'        => Subject::all(),
            'languages'       => Language::all(),
            'styles'          => Style::all(),
        ]);
    }
}
