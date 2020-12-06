<?php

use App\Http\Controllers\Admin\TesteController;
use Illuminate\Support\Facades\Route;

//função callback que retorna uma view
Route::get('/', function () {
    return view('welcome');
});

//no retorno pode passar o caminho com / ou .
Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/empresa', function () {
    return 'empresa';
});

Route::post('/register', function () {
    return '';
});

//a rota do tipo any aceita todos os verbos HTTP, é necessário cuidado para utilizar esse tipo
Route::any('/any', function () {
    return 'Rota Any';
});

//a rota do tipo match é necessário indicar o verbo HTTP a ser utilizado
Route::match(['get', 'post'], '/match', function () {
    return 'Rota Match';
});

//passando parametros na rota
Route::get('categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

//posts seria um prefixo
Route::get('categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

//parametros opcionais inclui o ? na rota e determina um valor default para a variável
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) do tipo: {$idProduct}";
});

//redirecionamento de rotas
/*Route::get('/redirect1', function () {
    return redirect('/redirect2');
});*/
//outra forma de redirecionar
Route::redirect('/redirect1', '/redirect2', 301);

Route::get('/redirect2', function () {
    return "Redirect 02";
});

//redirecionamento para view, quando a view será estatica
Route::view('/view', 'welcome');

//rotas nomeadas, facilita a manutenção do código.
Route::get('/nome-url', function () {
    return 'Olá mundo';
})->name('url.name');

Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

//grupo de rotas
//as três rotas abaixo tem muito em comum e podem ser unificadas em um grupo de rotas
//middlewares são filtros para autenticação
/*Route::get('/admin/dashboard', function () {
    return 'Home Admin';
})->middleware('auth');

Route::get('/admin/financeiro', function () {
    return 'Financeiro Admin';
})->middleware('auth');

Route::get('/admin/produtos', function () {
    return 'Produtos Admin';
})->middleware('auth');*/

/*
//rotas agrupadas gerando eficiência
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'Home Admin';
        });

        Route::get('/financeiro', function () {
            return 'Financeiro Admin';
        });

        Route::get('/produtos', function () {
            return 'Produtos Admin';
        });

        Route::get('/', function () {
            return 'Admin';
        });
    });
});

Route::get('/login', function () {
    return 'Aqui será a view de login';
})->name('login');
*/
/*
//deixando os códigos de rotas mais enxutos
Route::middleware([])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

                Route::get('/produtos', 'TesteController@teste')->name('produtos');

                //Route::get('/', 'TesteController@teste')->name('home');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});
*/
//outra opção de cadastramento de grupo de rotas
Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function () {
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    //Route::get('/', 'TesteController@teste')->name('home');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('home');
});


Route::get('/login', function () {
    return 'Aqui será a view de login';
})->name('login');
