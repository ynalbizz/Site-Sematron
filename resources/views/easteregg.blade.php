@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')

@section('title', '📂 ACESSO RESTRITO - NÍVEL 5')

@section('content')
<style>
    .easter-egg-container {
        background-color: #0a0a0a;
        color: #00ff41; /* Verde Matrix */
        font-family: 'Courier New', Courier, monospace;
        padding: 40px;
        border-radius: 10px;
        border: 1px solid #00ff41;
        box-shadow: 0 0 20px rgba(0, 255, 65, 0.2);
        margin-top: 50px;
        text-align: center;
    }

    .glitch {
        font-size: 2.5rem;
        font-weight: bold;
        text-transform: uppercase;
        position: relative;
        text-shadow: 0.05em 0 0 #00ff41, -0.025em -0.05em 0 #ff00c1,
                     0.025em 0.05em 0 #fffc00;
        animation: glitch 1s infinite;
    }

    .quote-box {
        margin-top: 30px;
        text-align: left;
        display: inline-block;
        max-width: 600px;
        border-left: 3px solid #00ff41;
        padding-left: 20px;
    }

    .author {
        color: #888;
        font-size: 0.9rem;
        display: block;
        margin-bottom: 15px;
    }

    @keyframes glitch {
        0% { transform: translate(0); }
        20% { transform: translate(-2px, 2px); }
        40% { transform: translate(-2px, -2px); }
        60% { transform: translate(2px, 2px); }
        80% { transform: translate(2px, -2px); }
        100% { transform: translate(0); }
    }
</style>

<div class="container">
    <div class="easter-egg-container">
        <h1 class="glitch">ACESSO CONCEDIDO</h1>
        <p>Parabéns. Você encontrou o que não deveria existir.</p>
        
        <hr style="border-color: #333;">

        <div class="quote-box">
            <p>"Nah, I'd Win."</p>
            <span class="author">— **Adunas 025** (O Arquiteto / Ex-Gerente do TI)</span>

            <p>"Se te oferecerem a diretoria é muito importante que vc recuse"</p>
            <span class="author">— **CNH 023** (O Profeta / Ex-Diretor)</span>
        </div>

        <div style="margin-top: 40px; font-size: 0.8rem; opacity: 0.5;">
            <p>Sistema monitorado. Limpe seus rastros ao sair.</p>
        </div>
    </div>
</div>
@endsection