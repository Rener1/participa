<?php

namespace App\Models\Submissao;

use Illuminate\Database\Eloquent\Model;

class FormSubmTraba extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'etiquetatitulotrabalho', 'etiquetaautortrabalho', 'etiquetacoautortrabalho', 'etiquetaresumotrabalho',
        'etiquetaareatrabalho', 'etiquetauploadtrabalho', 'indicedecampos', 'etiquetacampoextra1',
        'etiquetacampoextra2', 'etiquetacampoextra3', 'etiquetacampoextra4', 'etiquetacampoextra5', 'tipocampo1', 'tipocampo2',
        'tipocampo3', 'tipocampo4', 'tipocampo5', 'checkcampoextra1', 'checkcampoextra2',
        'checkcampoextra3', 'checkcampoextra4', 'checkcampoextra5', 'ordemCampos', 'eventoId',
    ];

    public function evento()
    {
        return $this->belongsTo('App\Models\Submissao\Evento', 'eventoId');
    }

    protected static function booted(): void
    {
        static::creating(function (FormSubmTraba $form) {
            $form->helperOrdemCampos();
        });

        static::saving(function (FormSubmTraba $form) {
            $form->helperOrdemCampos();
        });
    }

    public function helperOrdemCampos()
    {
        if ($this->ordemCampos == null) $this->ordemCampos = 'etiquetatitulotrabalho,etiquetaautortrabalho,etiquetacoautortrabalho,etiquetaresumotrabalho,etiquetaareatrabalho,etiquetauploadtrabalho,checkcampoextra1,etiquetacampoextra1,select_campo1,checkcampoextra2,etiquetacampoextra2,select_campo2,checkcampoextra3,etiquetacampoextra3,select_campo3,checkcampoextra4,etiquetacampoextra4,select_campo4,checkcampoextra5,etiquetacampoextra5,select_campo5';
    }
}
