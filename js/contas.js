$(document).ready(function(){
    var banco = $('#banco').DataTable({
        'responsive': true,
        'lengthMenu': [ [-1, 10, 25, 50, 100, 200, 500, 1000], ['Todos', 10, 25, 50, 100, 200, 500, 1000] ],
        'dom': 'Blrftip',
        'buttons': {
            'dom': {
                'button': {
                    'tag': 'button',
                    'className': 'btn'
                }
            },
            'buttons': [
                {
                    'extend': 'pdfHtml5',
                    'text': '<i class="fas fa-file-pdf"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para PDF'
                },{
                    'extend': 'excelHtml5',
                    'text': '<i class="fas fa-file-excel"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para Excel'
                },{
                    'extend': 'csvHtml5',
                    'text': '<i class="fas fa-file-csv"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para CSV'
                },{
                    'extend': 'copyHtml5',
                    'text': '<i class="fas fa-copy"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Copiar'
                }
            ]
        },
        'columns': [
            { 'type': 'num' },
            { 'type': 'num' },
            null,
            null,
            null,
            null
        ],
        'ordering': true
    });
    $('#bancos-btn-show-all-children').on('click', function(){
        banco.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });
    $('#bancos-btn-hide-all-children').on('click', function(){
        banco.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });
    filtrosTabela(banco);

    var agencia = $('#agencia').DataTable({
        'responsive': true,
        'lengthMenu': [ [-1, 10, 25, 50, 100, 200, 500, 1000], ['Todos', 10, 25, 50, 100, 200, 500, 1000] ],
        'dom': 'Blrftip',
        'buttons': {
            'dom': {
                'button': {
                    'tag': 'button',
                    'className': 'btn'
                }
            },
            'buttons': [
                {
                    'extend': 'pdfHtml5',
                    'text': '<i class="fas fa-file-pdf"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para PDF'
                },{
                    'extend': 'excelHtml5',
                    'text': '<i class="fas fa-file-excel"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para Excel'
                },{
                    'extend': 'csvHtml5',
                    'text': '<i class="fas fa-file-csv"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para CSV'
                },{
                    'extend': 'copyHtml5',
                    'text': '<i class="fas fa-copy"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Copiar'
                }
            ]
        },
        'columns': [
            { 'type': 'num' },
            { 'type': 'num' },
            null,
            null,
            null
        ],
        'ordering': true
    });
    $('#agencias-btn-show-all-children').on('click', function(){
        agencia.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });
    $('#agencias-btn-hide-all-children').on('click', function(){
        agencia.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });
    filtrosTabela(agencia);

    var conta = $('#conta').DataTable({
        'responsive': true,
        'lengthMenu': [ [-1, 10, 25, 50, 100, 200, 500, 1000], ['Todos', 10, 25, 50, 100, 200, 500, 1000] ],
        'dom': 'Blrftip',
        'buttons': {
            'dom': {
                'button': {
                    'tag': 'button',
                    'className': 'btn'
                }
            },
            'buttons': [
                {
                    'extend': 'pdfHtml5',
                    'text': '<i class="fas fa-file-pdf"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para PDF'
                },{
                    'extend': 'excelHtml5',
                    'text': '<i class="fas fa-file-excel"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para Excel'
                },{
                    'extend': 'csvHtml5',
                    'text': '<i class="fas fa-file-csv"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para CSV'
                },{
                    'extend': 'copyHtml5',
                    'text': '<i class="fas fa-copy"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Copiar'
                }
            ]
        },
        'columns': [
            { 'type': 'num' },
            { 'type': 'num' },
            null,
            { 'type': 'num' },
            null,
            { 'type': 'num' },
            null,
            null,
            null
        ],
        'ordering': true
    });
    $('#contas-btn-show-all-children').on('click', function(){
        conta.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });
    $('#contas-btn-hide-all-children').on('click', function(){
        conta.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });
    filtrosTabela(conta);

    var titular = $('#titular').DataTable({
        'responsive': true,
        'lengthMenu': [ [-1, 10, 25, 50, 100, 200, 500, 1000], ['Todos', 10, 25, 50, 100, 200, 500, 1000] ],
        'dom': 'Blrftip',
        'buttons': {
            'dom': {
                'button': {
                    'tag': 'button',
                    'className': 'btn'
                }
            },
            'buttons': [
                {
                    'extend': 'pdfHtml5',
                    'text': '<i class="fas fa-file-pdf"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para PDF'
                },{
                    'extend': 'excelHtml5',
                    'text': '<i class="fas fa-file-excel"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para Excel'
                },{
                    'extend': 'csvHtml5',
                    'text': '<i class="fas fa-file-csv"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para CSV'
                },{
                    'extend': 'copyHtml5',
                    'text': '<i class="fas fa-copy"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Copiar'
                }
            ]
        },
        'columns': [
            { 'type': 'num' },
            null,
            null,
            null,
            null,
            null
        ],
        'ordering': true
    });
    $('#titulares-btn-show-all-children').on('click', function(){
        titular.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });
    $('#titulares-btn-hide-all-children').on('click', function(){
        titular.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });
    filtrosTabela(titular);

    var movimento = $('#movimento').DataTable({
        'responsive': true,
        'lengthMenu': [ [-1, 10, 25, 50, 100, 200, 500, 1000], ['Todos', 10, 25, 50, 100, 200, 500, 1000] ],
        'dom': 'Blrftip',
        'buttons': {
            'dom': {
                'button': {
                    'tag': 'button',
                    'className': 'btn'
                }
            },
            'buttons': [
                {
                    'extend': 'pdfHtml5',
                    'text': '<i class="fas fa-file-pdf"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para PDF'
                },{
                    'extend': 'excelHtml5',
                    'text': '<i class="fas fa-file-excel"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para Excel'
                },{
                    'extend': 'csvHtml5',
                    'text': '<i class="fas fa-file-csv"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para CSV'
                },{
                    'extend': 'copyHtml5',
                    'text': '<i class="fas fa-copy"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Copiar'
                }
            ]
        }
    });
    $('#movimentos-btn-show-all-children').on('click', function(){
        movimento.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });
    $('#movimentos-btn-hide-all-children').on('click', function(){
        movimento.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });
    filtrosTabela(movimento);

    var movimentacao_front = $('#movimentacao_front').DataTable({
        'responsive': true,
        'lengthMenu': [ [-1, 10, 25, 50, 100, 200, 500, 1000], ['Todos', 10, 25, 50, 100, 200, 500, 1000] ],
        'dom': 'Blrftip',
        'buttons': {
            'dom': {
                'button': {
                    'tag': 'button',
                    'className': 'btn'
                }
            },
            'buttons': [
                {
                    'extend': 'pdfHtml5',
                    'text': '<i class="fas fa-file-pdf"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para PDF'
                },{
                    'extend': 'excelHtml5',
                    'text': '<i class="fas fa-file-excel"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para Excel'
                },{
                    'extend': 'csvHtml5',
                    'text': '<i class="fas fa-file-csv"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Exportar para CSV'
                },{
                    'extend': 'copyHtml5',
                    'text': '<i class="fas fa-copy"></i>',
                    'className': 'btn-sm btn-outline-secondary float-right',
                    'titleAttr': 'Copiar'
                }
            ]
        }
    });
    //movimentacao_front.buttons().container().appendTo('#my-table-buttons');
    $('#movimentacao_front-btn-show-all-children').on('click', function(){
        movimentacao_front.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });
    $('#movimentacao_front-btn-hide-all-children').on('click', function(){
        movimentacao_front.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });
    filtrosTabela(movimentacao_front);

    var movimentacao = $('#movimentacao').DataTable({
        'responsive': true,
        //'lengthMenu': [ [10, 25, 50, 100, 200, 500, 1000, -1], [10, 25, 50, 100, 200, 500, 1000, 'Todos'] ],
        'lengthMenu': [ [-1], ['Todos'] ],
        'lengthChange': false,
        'dom': 'Brt',
        'buttons': {
            'dom': {
                'button': {
                    'tag': 'button',
                    'className': 'btn'
                }
            },
            'buttons': [
                {
                    'extend': 'pdfHtml5',
                    'text': '<i class="fas fa-file-pdf"></i>&nbspExportar para PDF',
                    'className': 'btn-sm btn-outline-secondary',
                    'titleAttr': 'Exportar para PDF'
                },{
                    'extend': 'excelHtml5',
                    'text': '<i class="fas fa-file-excel"></i>&nbspExportar para Excel',
                    'className': 'btn-sm btn-outline-secondary',
                    'titleAttr': 'Exportar para Excel'
                },{
                    'extend': 'csvHtml5',
                    'text': '<i class="fas fa-file-csv"></i>&nbspExportar para CSV',
                    'className': 'btn-sm btn-outline-secondary',
                    'titleAttr': 'Exportar para CSV'
                },{
                    'extend': 'copyHtml5',
                    'text': '<i class="fas fa-copy"></i>&nbspCopiar',
                    'className': 'btn-sm btn-outline-secondary',
                    'titleAttr': 'Copiar'
                }
            ]
        },
        'columns': [
            null,
            null,
            null,
            { 'type': 'date-eu' },
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            { 'type': 'num' },
            null,
            { 'type': 'num' },
            { 'type': 'num' },
            null,
            null
        ],
        'ordering': false
    });

    movimentacao.buttons().container().appendTo( $('#table-export-buttons') );

    movimentacao.order( [ [ 3 , 'asc' ], [ 1 , 'asc' ], [ 9, 'asc' ], [ 11, 'desc' ], [ 13, 'desc' ] ] ).draw();

    $('#movimentacao-btn-show-all-children').on('click', function(){
        movimentacao.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
    });
    $('#movimentacao-btn-hide-all-children').on('click', function(){
        movimentacao.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
    });

    $('#movimentacao_form').on('submit', function() {
        $('#escolha_movimentacao_anexa').prop('disabled', false);
    });

    movimentacao.columns(15).every( function ( colIdx ) {
        var select = $('#movimentacoes_conta')
            .on( 'change', function () {
                movimentacao
                    .column( colIdx )
                    .search( $(this).val() )
                    .draw();
            } );
        select.append( $('<option value="">Todas</option>') );
        movimentacao
            .column( colIdx )
            .cache( 'search' )
            .unique()
            .each( function ( d ) {
                select.append( $('<option value="'+d+'">'+d+'</option>') );
            } );
    } );

    movimentacao.columns(2).every( function ( colIdx ) {
        var select = $('#movimentacoes_mes')
            .on( 'change', function () {
                movimentacao
                    .column( colIdx )
                    .search( $(this).val() )
                    .draw();
            } );
        select.append( $('<option value="">Todos</option>') );
        movimentacao
            .column( colIdx )
            .cache( 'search' )
            .unique()
            .each( function ( d ) {
                select.append( $('<option value="'+d+'">'+d+'</option>') );
            } );
    } );

    $('#movimentacoes_mov').on( 'keyup change clear', function(){
        var column = movimentacao.column(8);
        if(column.search() !== this.value) {
            column.search(this.value).draw();
        }
    } );

    movimentacao.columns(9).every( function ( colIdx ) {
        var select = $('#movimentacoes_tipo')
            .on( 'change', function () {
                movimentacao
                    .column( colIdx )
                    .search( $(this).val() )
                    .draw();
            } );
        select.append( $('<option value="">Todos</option>') );
        movimentacao
            .column( colIdx )
            .cache( 'search' )
            .unique()
            .each( function ( d ) {
                select.append( $('<option value="'+d+'">'+d+'</option>') );
            } );
    } );
    filtrosTabela(movimentacao);

    $('#movimentacao_anexa').hide();
    $('#div_vincular_outra_conta_tipo').hide();
    $('#div_vincular_outra_conta_criada').hide();
    $('#div_vincular_outra_conta').hide();
    $('#escolha_movimento').on('change',function(){
        var dataValorVinculado = 0;
        var valor = $(this).val();
        $('#escolha_movimento option:selected').each(function(){
            if(valor == $(this).val()){
                dataValorVinculado = $(this).data('valor-vinculado');
            }
        });
        if(dataValorVinculado == 0){
            $('#movimentacao_anexa').hide();
        } else {
            $('#movimentacao_anexa').show();
            $('#escolha_movimento_anexa option').each(function(){
                if($(this).val() != dataValorVinculado){
                    $(this).attr('disabled',true);
                } else {
                    $(this).attr('disabled',false);
                }
            });
            $('#escolha_movimento_anexa').val(dataValorVinculado);
            atualizaSelectEscolhaContaAnexa();
            $('#div_vincular_outra_conta').hide();
            $('#div_vincular_outra_conta_criada').show();
        }
    });
    
    $('#select_vincular_outra_conta').on('change',function(){
        if($(this).val() == 0){
            $('#div_vincular_outra_conta_tipo').hide();
        } else {
            $('#div_vincular_outra_conta_tipo').show();
        }
    });

    $('#opcao_criada').on('change',function(){
        if($(this).val() == 1){
            $('#div_vincular_outra_conta').hide();
            $('#div_vincular_outra_conta_criada').show();
        } else {
            $('#div_vincular_outra_conta_criada').hide();
            $('#div_vincular_outra_conta').show();
        }
    });

    $('#opcao_nova').on('change',function(){
        if($(this).val() == 2){
            $('#div_vincular_outra_conta_criada').hide();
            $('#div_vincular_outra_conta').show();
        } else {
            $('#div_vincular_outra_conta').hide();
            $('#div_vincular_outra_conta_criada').show();
        }
    });

    $('#movimentacao_data').on('change',function(){
        $('#movimentacao_anexa_data').attr('value', $(this).val());
    });

    $('#escolha_conta').on('change',function(){
        atualizaSelectEscolhaContaAnexa();
    });

    $('#movimentacao_valor').on('change',function(){
        $('#movimentacao_anexa_valor').val($(this).val());
    });

    $('#movimentacoes_mes option').each( function(){
        const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
        var novaData = new Date();
        var dataFormatada = (meses[novaData.getMonth()]+'/'+novaData.getFullYear());
        if($(this).val() == dataFormatada){
            $(this).prop('selected', true);
            movimentacao.column(2).search($(this).val()).draw();
        }
    });

    function atualizaSelectEscolhaContaAnexa(){
        var mySelected = 0;
        $('#escolha_conta_anexa option').each(function(){
            if($(this).val() == $('#escolha_conta').val()){
                $(this).attr('disabled',true);
            } else {
                $(this).attr('disabled',false);
                if(mySelected == 0){
                    mySelected = $(this).val();
                }
            }
        });
        $('#escolha_conta_anexa').val(mySelected);
    }
});

function inputEditavel(id_do_campo){
    $(id_do_campo).prop('readonly', false);
}

function inputSomenteLeitura(id_do_campo){
    $(id_do_campo).prop('readonly', true);
}

function selectEditavel(id_do_campo){
    $(id_do_campo).prop('disabled', false);
}

function selectSomenteLeitura(id_do_campo){
    $(id_do_campo).prop('disabled', true);
}

function filtrosTabela(tabela){
    var filtros = [];
    tabela.columns().every( function () {
        var column = this;
        var col_id = column.index();
        var cabeca = $(column.header());
        var rodape = $(column.footer());
        var filtro = cabeca.data('filter');
        var filtrando = cabeca.data('filtering');
        if(filtro == 'yes'){
            if(filtrando == 'select'){
                var select = $('<select class="form-control form-control-sm"><option value="">Todos</option></select>')
                .appendTo(rodape.empty())
                .on('change', function(){
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                    } );
                column.data().unique().sort().each(function(d, j){
                    select.append('<option value="'+d+'">'+d+'</option>')
                } );
            } else if(filtrando == 'input'){
                var title = cabeca.text();
                var tipo = cabeca.data('type');
                var input_id1 = 'col_' + col_id + '_1_' + tipo;
                var input_id2 = 'col_' + col_id + '_2_' + tipo;
                if(tipo == 'text'){
                    rodape.html('<input class="form-control form-control-sm" type="' + tipo + '" placeholder="Procurar ' + title + '">');
                    $('input', rodape).on( 'keyup change clear', function(){
                        if(column.search() !== this.value) {
                            column
                                .search(this.value)
                                .draw();
                        }
                    } );
                } /*else if(tipo == 'number' || tipo == 'datetime-local'){
                    rodape.html('<div class="display d-inline"><input class="form-control form-control-sm float-left w-50" id="' + input_id1 + '" type="' + tipo + '" placeholder=">=" maxlength="4"><input class="form-control form-control-sm float-right w-50" id="' + input_id2 + '" type="' + tipo + '" placeholder="<=" maxlength="4"></div>');
                    $('#' + input_id1, rodape).on('keyup change clear', function(){
                        col_id_filtering = column.index();
                        input_id1_filtering = '#' + input_id1;
                        input_id2_filtering = '#' + input_id2;
                        tipo_filtering = tipo;
                        tabela.draw();
                    } );
                    $('#' + input_id2, rodape).on('keyup change clear', function(){
                        col_id_filtering = column.index();
                        input_id1_filtering = '#' + input_id1;
                        input_id2_filtering = '#' + input_id2;
                        tipo_filtering = tipo;
                        tabela.draw();
                    } );
                }*/
            }
        }
    } );
}