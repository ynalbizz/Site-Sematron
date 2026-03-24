<div x-data="{ 
    submitForm() {
        this.$nextTick(() => { this.$refs.postForm.submit(); });
    } 
}" 
@post-registration.window="submitForm()">

    {{-- BLOCO 1: TOPO ORIGINAL --}}
    <section class="Parte-De-Cima-Insc">
        <div class="texto-Insc">
            <h1 class="Tit-Insc">Inscrição</h1>
            <h1 class="Sub-Insc">Faça a sua inscrição.</h1>
        </div>

        <div class="Imagem-Insc"></div>

        <div class="borda-cadastro deu-toque">
            <h1 class="Champions-do-Forms">Escolha o Pacote</h1>
            <div class="input-group">
                <label>Pacote</label>
                <select wire:model.live="selectedPackId" id="PACOTAO" required>
                    <option value="">Selecione...</option>
                    @foreach($this->packs as $pack)
                        <option value="{{ $pack->id }}" style=>{{ $pack->nome }} - R$ {{ number_format($pack->preço, 2, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>

    @if($this->activePack)
        {{-- BLOCO 2: AS TRÊS COLUNAS --}}
        <section class="tres-colunas-insc box is-visible" style="display: grid !important;">
            <div class="col-wrapper">
                @if($this->activePack->visita)
                    <div class="borda-insc box is-visible" wire:key="v-{{ $selectedPackId }}">
                        <h1 class="Champions-do-Forms">Escolha a Visita</h1>
                        <div class="input-group">
                            <label>Visita</label>
                            <select wire:model="selectedVisitId">
                                <option value="">Selecione...</option>
                                @foreach($this->visits as $visit)
                                    <option value="{{ $visit->eid }}">{{ $visit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-wrapper">
                @if($this->activePack->minicurso)
                    <div class="borda-insc box is-visible" wire:key="m-{{ $selectedPackId }}">
                        <h1 class="Champions-do-Forms">Escolha o Minicurso</h1>
                        <div class="input-group">
                            <label>Minicurso</label>
                            <select wire:model="selectedMinicourseId">
                                <option value="">Selecione...</option>
                                @foreach($this->minicourses as $mini)
                                    <option value="{{ $mini->eid }}">{{ $mini->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-wrapper">
                @if($this->activePack->kit)
                    <div class="borda-insc box is-visible" wire:key="k-{{ $selectedPackId }}">
                        <h1 class="Champions-do-Forms">Escolha o Tamanho</h1>
                        <div class="input-group">
                            <label>Tamanho da Camiseta</label>
                            <select wire:model="shirtSize">
                                <option value="">Selecione...</option>
                                <option value="p">P</option>
                                <option value="m">M</option>
                                <option value="g">G</option>
                                <option value="gg">GG</option>
                            </select>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        {{-- BLOCO 3: ALOJAMENTO E PAGAMENTO --}}
        <section class="campo-botao box is-visible">
             <div class="borda-insc" style="display: flex; flex-direction: row; gap: 15px; align-items: center; justify-content: center; width: 100%; max-width: 500px;">
                <input type="checkbox" wire:model.live="requiresAccommodation" id="alojamento_check" style="width: 25px; height: 25px; cursor: pointer;">
                <label for="alojamento_check" style="margin: 0; color: white; cursor: pointer;" class="Champions-do-Forms">Incluir Alojamento (+ R$ 100,00)</label>
             </div>

            <div style="margin-top: 10px; margin-bottom: 10px; font-size: 2rem; font-weight: bold; color: var(--laranja);" class="Champions-do-Forms">
                Total: R$ {{ number_format($this->totalPrice, 2, ',', '.') }}
            </div>

            <button type="button" wire:click="submit" class="submit-btn-insc">
                <span wire:loading.remove>IR PARA PAGAMENTO</span>
                <span wire:loading>PROCESSANDO...</span>
            </button>
        </section>
    @endif

    {{-- FORMULÁRIO OCULTO --}}
    <form x-ref="postForm" action="{{ route('inscricao.store') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="pack_id" value="{{ $selectedPackId }}">
        <input type="hidden" name="visita" value="{{ $selectedVisitId ?? '' }}">
        <input type="hidden" name="minicurso" value="{{ $selectedMinicourseId ?? '' }}">
        <input type="hidden" name="camiseta" value="{{ $shirtSize ?? '' }}">
        <input type="hidden" name="alojamento" value="{{ $requiresAccommodation ? 1 : 0 }}">
        <input type="hidden" name="price" value="{{ $this->totalPrice }}">
    </form>
</div>