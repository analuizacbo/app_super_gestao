<h3> Contato renderizado por view</h3>

<!-- Sera aplicado o nome das rotas definidos no arquivo web.php dentro da pasta routes -->
<ul>
    <li>
        <a href="{{ route('site.index') }}">Principal</a>
    </li>
    <li>
        <a href="{{ route('site.sobrenos') }}">Sobre Nós</a>
    </li>
    <li>
        <a href="{{ route('site.contato') }}">Contato</a>
    </li>
</ul>