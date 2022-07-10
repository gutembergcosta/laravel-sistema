<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



class Proposta extends Model
{

    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'nome',
        'ref',
        'teste',
        'email',
        'data_nascimento',
        'data_expedicao',
        'estado_civil',
        'status',
        'tel01',
        'tel02',
        'tel03',
        'rg',
        'cpf',
        'nome_pai',
        'endereco_residencial',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'profissao',
        'renda_mensal',
        'renda_complementar',
        'tempo_trabalho',
        'tipo_conta',
        'banco',
        'agencia',
        'conta',
        'nome_mae',
        'user_id',
        'tipo_proposta',
        'texto',
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'insc_estadual',
        'capital_social',
        'empresa_tipo',
        'atividade',
        'faturamento_medio',
        'participacao',
        'prazo_grupo',
        'prazo_cota',
        'qte_participantes',
        'valor_credito',
        'indice_correcao',
        'fundo_reserva',
        'seguro',
        'taxa_administrativa',
        'tipo_item',
        'antecipacao_taxa_administrativa',
        'codigo_tabela',
        'valor_primeira_parcela',
        'info_primeira_parcela',
        'cidade_contrato',
        'genero',
        'orgao_emissor',
        'valor_por_extenso'
    ];

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'ref', 'ref'); //'foreign_key', 'local_key'
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
