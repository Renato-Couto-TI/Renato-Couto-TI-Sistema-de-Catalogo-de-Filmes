<?php

namespace App\Http\Controllers;

use App\Models\modelFilme;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // Método de exibição do catálogo (listo os filmes)
    public function index(Request $request)
    {
        // Aqui crio a consulta base que chama o modelFilme que criei
        $query = modelFilme::query();

        //Filtros de busca
        // Filtro de nome do filme
        if ($request->filled('nome_filme')) {
            $query->where('nome_filme', 'like', '%' . $request->nome_filme . '%');
        }

        // Filtro de categoria
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // Filtro de ano de lançamento
        if ($request->filled('ano_lancamento')) {
            $query->where('ano_lancamento', $request->ano_lancamento);
        }

        // Aqui implemento a Paginação (método 'paginate()') dos resultados (9 filmes por página, porque no frontend defini o grid-template-columns que mostra 3 elementos por linha)
        $filmes = $query->paginate(9);

        // Retorno a view com os filmes corespondentes ao filtro selecionado pelo usuário
        return view('home', compact('filmes'));
    }
    
    // Método que retorna o fomulário para inserção dos dados de edição do novo filme
    public function novoFilme()
    {
        return view('filmes.cadastrarNovo');
    }

    // Método para cadastro de um novo filme
    public function cadastrarFilme(Request $request)
    {
        // Validação dos dados do formulário, antes de enviá-los ao Banco de Dados
        $request->validate([
            'nome_filme' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'ano_lancamento' => 'required|digits:4',
            'descricao' => 'required|string',
            'imagem' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Aqui verifico se a imagem foi enviada corretamente pelo usuário e a armazeno no diretório correto que criei no meu projeto
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Pego o arquivo de imagem e o armazeno na variável '$imagem'
            $imagem = $request->file('imagem');

            // Pego a extensão da imagem - para que eu consiga depois gerar o nome completo da imagem (p. ex: nome.jpg) e possa o inserir depois na coluna imagem do Banco de Dados
            $extensao = $imagem->getClientOriginalExtension();

            // Gero o nome completo da imagem (iniciando com a hora em milisegundos, seguido pelo nome que o usuário deu à imagem, e terminando com a extensão do arquivo)
            $imagemNomeCompleto = time() . '_' . str_replace(' ', '_', pathinfo($imagem->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $extensao;

            // Movo a imagem para o diretório correto do meu projeto(public/assets/images/filmesUpload)
            $imagem->move(public_path('assets/images/filmesUpload'), $imagemNomeCompleto);

            // Salvo na variável '$imagemCaminho' o caminho completo da imagem com o seu nome/extensão adicionado(que é o que será enviado logo após via 'create' para a coluna imagem do Banco de Dados)
            $imagemCaminho = 'assets/images/filmesUpload/' . $imagemNomeCompleto;

            // Crio o registro do filme no Banco de Dados
            modelFilme::create([
                'nome_filme' => $request->nome_filme,
                'ano_lancamento' => $request->ano_lancamento,
                'categoria' => $request->categoria,                
                'descricao' => $request->descricao,
                'imagem' => $imagemCaminho, // Aqui salvo o caminho da imagem junto com o seu nome/extensão no Banco de Dados
            ]);

            //Após o registro bem sucedido do novo filme no Banco de Dados, redireciono para a minha 'home' com uma mensagem de sucesso sendo mostrada na tela
            return redirect()->route('home')->with('success', 'Filme cadastrado com sucesso!');
        } else {
            return back()->withErrors(['imagem' => 'Erro no upload da imagem.']);
        }
    }

    // Método que retorna o fomulário de edição das informações dos filmes buscando as informações atuais dele via model (modelFilme) para que já sejam exibidas no fomulário
    public function editarFilme($id)
    {
        $filme = modelFilme::findOrFail($id);
        return view('filmes.editar', compact('filme'));
    }

    // Método para atualizar um filme existente
    public function atualizarFilme(Request $request, $id)
    {
        $filme = modelFilme::findOrFail($id);

        // Validação dos dados do formulário de edição de filmes antes de enviá-los ao Banco de Dados
        $request->validate([
            'nome_filme' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'ano_lancamento' => 'required|digits:4',
            'descricao' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Imagem não é obrigatória
        ]);

        // Verifico se uma nova imagem foi carregada (enviada pelo usuário)
        if ($request->hasFile('imagem')) {
            // Apago a imagem antiga se existir
            if ($filme->imagem && file_exists(public_path($filme->imagem))) {
                unlink(public_path($filme->imagem));
            }

            // Gero o nome da nova imagem e a armazeno na pasta public/assets/images/filmesUpload
            $imagemNome = time() . '_' . str_replace(' ', '_', $request->file('imagem')->getClientOriginalName());
            $request->file('imagem')->move(public_path('assets/images/filmesUpload'), $imagemNome);

            // Atualizo no Banco de Dados o caminho da nova imagem (coluna 'imagem' da tabela filmes)
            $filme->imagem = 'assets/images/filmesUpload/' . $imagemNome;
        }

        // Atualizo os demais dados do filme
        $filme->update([
            'nome_filme' => $request->nome_filme,
            'categoria' => $request->categoria,
            'ano_lancamento' => $request->ano_lancamento,
            'descricao' => $request->descricao,
        ]);

        //Após a edição bem sucedida do filme no Banco de Dados, redireciono para a minha 'home' com uma mensagem de sucesso sendo mostrada na tela
        return redirect()->route('home')->with('success', 'Filme atualizado com sucesso!');
    }

    // Método para excluir um filme
    public function excluirFilme($id)
    {
        $filme = modelFilme::findOrFail($id);
        $filme->delete();
        //Após a exclusão bem sucedida do filme no Banco de Dados, redireciono para a minha 'home' com uma mensagem de sucesso sendo mostrada na tela
        return redirect()->route('home')->with('success', 'Filme excluído com sucesso!');
    }
}
