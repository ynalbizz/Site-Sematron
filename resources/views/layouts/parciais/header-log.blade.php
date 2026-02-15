<header>
    <!--É literal só a listra laranja-->
    <div class="listra-laranja"></div>

    <!--Aqui estão os links, na versão desktop-->

    <div class="Parte-De-Cima">

        <div class="Centraliza"><img class="Logo-Inicio" src="{{asset('/Imagens/logo-Photoroom.png')}}" alt="Logo da Sematron"></div>
        <div class="Centraliza"><h1 class="Sematron-Inicio">SEMATRON XXII</h1></div>
                
        <div class="Links">
            <a class="Link-Do-Topo" href="/inicio">Página Inicial</a>
            <a class="Link-Do-Topo" href="/inscricao">Inscrição</a>
            <a class="Link-Do-Topo" href="/minicursos">Minicursos</a>
            <a class="Link-Do-Topo" href="/visitas">Visitas</a>
            <a class="Link-Do-Topo" href="/perfil">Perfil</a>
            <a class="Link-Do-Topo" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
</form>
            <a class="Link-Do-Topo" href="/maisSematron">Mais Sematron</a>
            <a class="Link-Do-Topo Direita" href="/contato">Contato</a>
        </div>
    </div>
</header>