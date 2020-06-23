
<div class="modal fade" id="novoProjetoMocal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"></h4>
            </div>
            <div class="container theme-showcase" role="main">
                
            <h3 class="title has-text-grey">Criar Novo Projeto</h3>

                <div class="box">
                    <form action="../objetos/novoProjeto.php" method="POST">
                        <div class="field">
                            <div class="control">
                                <input name="nome" class="input is-large" placeholder="Novo Projeto" autofocus="" type="text">
                            </div>
                        </div>

                        <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
