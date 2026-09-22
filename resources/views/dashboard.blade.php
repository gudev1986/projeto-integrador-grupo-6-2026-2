<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <section class="bg-white shadow-sm sm:rounded-lg p-6" aria-labelledby="boas-vindas">
                <h3 id="boas-vindas" class="text-lg font-semibold text-gray-900">
                    Olá, {{ Auth::user()->name }}
                </h3>
                <p class="mt-1 text-gray-600">
                    Este é o sistema de geração de notas fiscais do
                    <strong>{{ config('app.name') }}</strong>.
                    Use os módulos abaixo para cadastrar o cardápio, lançar os pedidos
                    e emitir as notas.
                </p>
            </section>

            <section aria-labelledby="modulos">
                <h3 id="modulos" class="text-base font-semibold text-gray-900 mb-3">
                    Módulos
                </h3>

                <ul role="list" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        ['titulo' => 'Cardápio', 'descricao' => 'Cadastro dos produtos vendidos, com categoria e preço.'],
                        ['titulo' => 'Novo pedido', 'descricao' => 'Montagem da comanda com os itens consumidos e o total.'],
                        ['titulo' => 'Notas emitidas', 'descricao' => 'Histórico dos pedidos e das notas fiscais geradas.'],
                    ] as $modulo)
                        <li class="bg-white shadow-sm sm:rounded-lg p-5 border border-gray-100">
                            <div class="flex items-start justify-between gap-3">
                                <h4 class="font-semibold text-gray-900">{{ $modulo['titulo'] }}</h4>
                                <span class="shrink-0 text-xs font-medium text-gray-600 bg-gray-100 rounded-full px-2 py-1">
                                    Em desenvolvimento
                                </span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">{{ $modulo['descricao'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </section>

        </div>
    </div>
</x-app-layout>
