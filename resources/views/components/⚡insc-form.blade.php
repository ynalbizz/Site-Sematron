<?php

use Livewire\Volt\Component;
use App\Models\Pack;
use App\Models\Event;
use Livewire\Attributes\Computed;

new class extends Component
{
    public $selectedPackId = null;
    public $requiresAccommodation = false;
    public $shirtSize = null;
    public $selectedVisitId = null;
    public $selectedMinicourseId = null;

    #[Computed]
    public function packs()
    {
        return Pack::where('sid', env('ATUAL_SID'))->get();
    }

    #[Computed]
    public function activePack()
    {
        return $this->selectedPackId ? Pack::find($this->selectedPackId) : null;
    }

    #[Computed]
    public function visits()
    {
        return Event::where('type', 'viagem')->where('sid', env('ATUAL_SID'))->get();
    }

    #[Computed]
    public function minicourses()
    {
        return Event::where('type', 'minicurso')->where('sid', env('ATUAL_SID'))->get();
    }

    #[Computed]
    public function totalPrice()
    {
        // Uso de () pois estamos chamando internamente na classe PHP
        $pack = $this->activePack(); 
        if (!$pack) return 0.00;
        
        $base = (float) str_replace(',', '.', $pack->preço);
        $addon = $this->requiresAccommodation ? 100.00 : 0.00;
        
        return $base + $addon;
    }

    public function updatedSelectedPackId()
    {
        // Uso de () pois estamos chamando internamente na classe PHP
        $pack = $this->activePack();
        if ($pack) {
            if (!$pack->visita) $this->selectedVisitId = null;
            if (!$pack->minicurso) $this->selectedMinicourseId = null;
            if (!$pack->kit) $this->shirtSize = null;
        }
    }

    public function submit()
    {
        $pack = $this->activePack();
        
        $this->validate([
            'selectedPackId' => 'required',
            'shirtSize' => ($pack && $pack->kit) ? 'required' : 'nullable',
        ], [
            'selectedPackId.required' => 'Por favor, selecione um pacote.',
            'shirtSize.required' => 'Escolha o tamanho da sua camiseta.',
        ]);

        $this->dispatch('post-registration');
    }
};
?>