<?php

include '../Sistem/iniSis.php';
if (isset($_POST['cadastrar'])) {
    /* @$titulo = $_POST['titulo'];	
      @$content = $_POST['midia'];
      @$description = $_POST['descricao'];
      @$tags = $_POST['tags'];
      @$type = $_POST['opc'];
      @$iduser = $_POST['iduser'];
     */
    
    
    $t = filter_input_array(INPUT_POST);
    
    var_dump($t);
    die;
    if (empty($t['titulo']) || empty($t['descricao'])) {
        echo '<div class="msg erro">Existe algum campo obrigatório em branco</div>';
    } else {
        $datas = array(
            'user_id' => $iduser,
            'guide_name' => $titulo,
            'guide_description' => $description,
            'guide_midia' => $content,
            'guide_tags' => $tags,
            'guide_type' => $type
        );
        $DB->QRInsert('_guide', $datas);
        unset($iduser);
        unset($titulo);
        unset($description);
        unset($content);
        unset($tags);
        unset($type);
        redirect('guide.php?msg=ok');
    }
}

if (isset($_GET['msg']) AND $_GET['msg'] == 'ok') {
    echo '<div class="msg sucess">Roteiro cadastrado com sucesso</div>';
};
