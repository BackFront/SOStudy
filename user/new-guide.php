<form action="" method="post" class="hidden" id="#tab2">
    <label>
        Titulo do Roteiro: <br>
        <input type="text" name="titulo" autocomplete="off" class="medium" value="<?= (isset($titulo)) ? $titulo : ''; ?>"/>
    </label>

    <label>
        Links: <br>
        <ol class="listLinks">
            <li>
                <input type="text" name="titulo" autocomplete="off" class="small" placeholder="Título" value="<?= (isset($titulo)) ? $titulo : ''; ?>"/>                
                <input type="text" name="titulo" autocomplete="off" class="small" placeholder="Link" value="<?= (isset($titulo)) ? $titulo : ''; ?>"/>
                <label class="small">
                    <select name="midia">
                        <option disabled="disabled" selected="selected">Nivel</option>
                        <option value="">Iniciante</option>
                        <option value="">Intermediario</option>
                        <option value="">Avançado</option>
                    </select>
                </label>
            </li>
        </ol>
        <p>
            <a id="addLink_" href="#"><i class="icon-add"></i> Adicionar mais links</a>
        </p>
    </label>

    <div class="clearfix"></div>
    <!--<label class="small pull-left">Tipo de Roteiro<br><input type="radio" checked="checked" name="opc" value="public"/><p>Aberto</p></label>
    <label class="small pull-left"><br><input type="radio" name="opc" value="private"/><p>Privado</p></label>-->
    <!--<div class="clearfix"></div>
    <label class="small">
        Categoria<br>
        <select name="midia">
            <option disabled="disabled" selected="selected">Selecione uma Categoria</option>
            <option value="Conteúdo Online">Conteúdo Online</option>
            <option value="Video">Video</option>
            <option value="PDF">PDF</option>
            <option value="Livro Digital">Livro Digital</option>
            <option value="OUTRO">OUTRO</option>
            <option value="MIX">MIX</option>
        </select>
    </label>-->
    <label>
        Descrição:<br>
        <textarea class="medium" name="descricao"><?= (isset($descricao)) ? $descricao : ''; ?></textarea>
    </label>
    <label>
        Tags <span style="font-size: 12px;color:#999;">separadas por ","</span><br>
        <textarea class="medium" name="tags"><?= (isset($descricao)) ? $descricao : ''; ?></textarea>
    </label>
    <label>
        <input type="submit" name="cadastrar" value="Cadastrar" class="button"/>
    </label>
    <input type="hidden" value="<?= IDUSER ?>" name="iduser" />
</form>