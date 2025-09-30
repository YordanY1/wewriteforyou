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

class OrderForm extends Component
{
    use WithFileUploads;


    public $email, $subject, $words, $deadline_option = '7d', $instructions, $files = [];
    public $selectedAddons = [];
    public $finalPrice = 0;

    public $assignment_type_id, $sub_assignment_type_id, $service_id, $academic_level_id, $subject_id, $language_id = 1, $style_id;


    public function updatedWords()
    {
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


    public function updated($propertyName)
    {
        $this->calculatePrice();
    }

    public function calculatePrice()
    {
        if (!$this->words) {
            $this->finalPrice = 0;
            return;
        }

        $calculator = new PriceCalculator();
        $this->finalPrice = $calculator->calculate(
            $this->words,
            $this->deadline_option,
            $this->selectedAddons
        );
    }


    public function submitOrder()
    {
        $this->validate([
            'email'             => 'required|email',
            'assignment_type_id' => 'required|exists:assignment_types,id',
            'service_id'        => 'required|exists:services,id',
            'academic_level_id' => 'required|exists:academic_levels,id',
            'subject_id'        => 'required|exists:subjects,id',
            'language_id'       => 'required|exists:languages,id',
            'style_id'          => 'nullable|exists:styles,id',
            'subject'           => 'required|string|max:255',
            'words'             => 'required|integer|min:275',
            'deadline_option'   => 'required',
        ]);

        $calculator = new PriceCalculator();
        $priceData = $calculator->calculate(
            $this->words,
            $this->deadline_option,
            $this->selectedAddons,
            detailed: true
        );

        $order = Order::create([
            'email'              => $this->email,
            'subject'            => $this->subject,
            'assignment_type_id' => $this->assignment_type_id,
            'service_id'         => $this->service_id,
            'academic_level_id'  => $this->academic_level_id,
            'subject_id'         => $this->subject_id,
            'language_id'        => $this->language_id,
            'style_id'           => $this->style_id,
            'words'              => $this->words,
            'deadline_option'    => $this->deadline_option,
            'instructions'       => $this->instructions,
            'base_price'         => $priceData['base'],
            'final_price'        => $priceData['total'],
            'currency_id'        => 1, // GBP по default
            'reference_code'     => strtoupper(uniqid('ORD-')),
            'status' => 'awaiting_payment',
        ]);

        // Add-ons
        foreach ($priceData['addons'] as $addon) {
            $order->addons()->create([
                'addon_id' => $addon['id'],
                'price'    => $addon['price'],
            ]);
        }

        // Files
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
