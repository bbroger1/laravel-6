{{-- <div class="alert">
<!-- com ?? você está fazendo um verificação se a variavel existe e tem contéudo e, caso negativo pode passar um valor default  -->
<p>Alert - {{ $content ?? 'valor default' }}</p>
</div> --}}

@if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <ul>
                <li>
                    {{ $error }}
                </li>
            </ul>
        @endforeach
    </div>
@endif
