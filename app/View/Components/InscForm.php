<?php

namespace App\Livewire;

use App\Models\Package;
use App\Models\Activity;
use App\Models\Registration;
use Livewire\Component;
use Illuminate\Support\Collection;

class InscForm extends Component
{
 // Propriedades de Catálogo (Somente Leitura)
    public Collection $packages;
    public Collection $visits;
    public Collection $minicourses;
    
    // Estado Mutável do Formulário
    public $selectedPackageId = null;
    public $visitId = null;
    public $minicourseId = null;
    public $shirtSize = null;
    public $requiresAccommodation = false;
    
    // Propriedades Computadas e Estado Condicional
    public $totalPrice = 0.00;
    public?Package $activePackage = null;

    public function mount()
    {
        // Hidratação inicial dos domínios de seleção
        $this->packages = Package::all();
        $this->visits = Activity::where('type', 'visit')->get();
        $this->minicourses = Activity::where('type', 'minicourse')->get();
    }

    public function updatedSelectedPackageId($value)
    {
        // Recupera o pacote selecionado pelo ID recebido do front-end
        $this->activePackage = Package::find($value);
        
        // Estratégia de purga de estado fantasma
        if ($this->activePackage) {
            if (!$this->activePackage->has_visit) {
                $this->visitId = null;
            }
            if (!$this->activePackage->has_minicourse) {
                $this->minicourseId = null;
            }
            if (!$this->activePackage->has_shirt) {
                $this->shirtSize = null;
            }
        }

        // Delegação do recálculo financeiro
        $this->calculateTotal();
    }

    public function updatedRequiresAccommodation($value)
    {
        // Qualquer alteração no checkbox de alojamento dispara o recálculo
        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        if (!$this->activePackage) {
            $this->totalPrice = 0.00;
            return;
        }

        $base = (float) $this->activePackage->base_price;
        $accommodationAddon = $this->requiresAccommodation? 100.00 : 0.00;
        
        $this->totalPrice = $base + $accommodationAddon;
    }
}
