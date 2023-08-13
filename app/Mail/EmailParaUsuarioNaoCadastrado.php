<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailParaUsuarioNaoCadastrado extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeUsuarioPai;

    public $nomeTrabalho;

    public $nomeFuncao;

    public $nomeEvento;

    public $senhaTemporaria;

    public $email;

    public $coord;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nomeUsuarioPai, string $nomeTrabalho,
        string $nomeFuncao, string $nomeEvento, string $senhaTemporaria, string $email, $coord)
    {
        $this->nomeUsuarioPai = $nomeUsuarioPai;
        $this->nomeTrabalho = $nomeTrabalho;
        $this->nomeFuncao = $nomeFuncao;
        $this->nomeEvento = $nomeEvento;
        $this->senhaTemporaria = $senhaTemporaria;
        $this->email = $email;
        $this->coord = $coord;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Ative sua conta')
            ->markdown('emails.usuarioNaoCadastrado')
            ->with([
                'user' => $this->nomeUsuarioPai,
                'evento' => $this->nomeEvento,
                'funcao' => $this->nomeFuncao,
                'senha' => $this->senhaTemporaria,
                'coord' => $this->coord,
                'email' => $this->email,
            ]);

        // return $this->view('emails.usuarioNaoCadastrado');
    }
}
