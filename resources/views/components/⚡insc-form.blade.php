<?php

use Livewire\Volt\Component;
use App\Models\Pack;
use App\Models\Event;

new class extends Component
{
    // Estado do Formulário (Sincronizado com os selects da sua view)
    public $selectedPackId = null;
    public $requiresAccommodation = false;
    public $shirtSize = null;
    public $selectedVisitId = null;
    public $selectedMinicourseId = null;

    public function getPacksProperty()
    {
        return Pack::where('sid', env('ATUAL_SID'))->get();
    }

    public function getActivePackProperty()
    {
        return Pack::find($this->selectedPackId);
    }

    public function getVisitsProperty()
    {
        return Event::where('type', 'viagem')->where('sid', env('ATUAL_SID'))->get();
    }

    public function getMinicoursesProperty()
    {
        return Event::where('type', 'minicurso')->where('sid', env('ATUAL_SID'))->get();
    }

    public function getTotalPriceProperty()
    {
        if (!$this->activePack) return 0.00;
        $base = (float) $this->activePack->preço;
        $addon = $this->requiresAccommodation ? 100.00 : 0.00;
        return $base + $addon;
    }

    public function updatedSelectedPackId()
    {
        if ($this->activePack) {
            if (!$this->activePack->visita) $this->selectedVisitId = null;
            if (!$this->activePack->minicurso) $this->selectedMinicourseId = null;
            if (!$this->activePack->kit) $this->shirtSize = null;
        }
    }

    public function submit()
    {
        // Esta função será chamada pelo botão final
        // Aqui você pode adicionar validação: $this->validate();
        
        // Exemplo de redirecionamento para o controller que você já tem
        return redirect()->route('inscricao.store', [
            'pack_id' => $this->selectedPackId,
            'visita' => [$this->selectedVisitId],
            'minicurso' => [$this->selectedMinicourseId],
            'camiseta' => $this->shirtSize,
            'alojamento' => $this->requiresAccommodation,
            'total' => $this->totalPrice
        ]);
    }
};
?>
