<?php
include 'header.php';
$iduser = IDUSER;
$condition = "WHERE user_id = {$iduser} ORDER BY id DESC";
$selectGuide = $DB->QRSelect('_guide', $condition);
?>
<section id="content" class="guide">
    <div class="wrap clearfix">
        <?php require '../fnt/CadastraGuide.php'; ?>
        <div class="header-box">
            Meus Roteiros <i class="icon-paperclip"></i>
            <span class="tab">
                <a href="#tab1" class="tab select">Meus Roteiros</a>
                <a href="#tab2" class="tab">Criar novo Roreiro</a>
            </span>
        </div>
        <div class="body-box clearfix">
            <table class="table-box" cellspacing="0" cellpadding="0" id="#tab1">
                <thead>
                    <tr>
                        <td class="no-width"><b>#</b></td>
                        <td><b>ROTEIRO</b></td>
                        <td><b>DESCRIÇÃO</b></td>
                        <td><b>CRIADO EM</b></td>
                        <td><b>TAGS</b></td>
                        <td><b>AÇÃO</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($selectGuide) {
                        foreach ($selectGuide as $key) {
                            $d = date_transform($key['guide_date']);
                            $dia = $d['dia'];
                            $mes = $d['mes'];
                            $ano = $d['ano'];
                            $mes = substr($mes, 0, 3);
                            $dta = $dia . '/' . $mes . '/' . $ano;

                            $tags = $key['guide_tags'];
                            $idguide = $key['id'];
                            $tags = explode(',', $tags);

                            /* Links desse Roteiro */
                            $iduser = $_SESSION['idUser'];
                            $condition = "WHERE id_guide = {$idguide} AND id_user = {$iduser}";
                            $selectLinksGuide = $DB->QRSelect('_relation_guide', $condition);
                            if ($selectLinksGuide) {
                                $gqnt = count($selectLinksGuide);
                            }
                            ?>
                            <tr>
                                <td class="no-width"><?php if (isset($gqnt)) {
                                echo $gqnt;
                            } else {
                                echo '--';
                            } ?></td>
                                <td><a href="#<?= $key['id'] ?>"><?= $key['guide_name'] ?></a></td>
                                <td><?= $key['guide_description'] ?></td>
                                <td><?= $dta ?></td>
                                <td><?php foreach ($tags as $stags) {
                                echo '<a href="?tag=' . $stags . '">[' . $stags . ']</a>';
                            } ?></td>
                                <td>
                                    <i class="icon-pencil"></i>
                                    <i class="icon-trash3"></i>
                                    <i class="icon-share"></i>
                                </td>
                            </tr>
    <?php }
} else {
    ?>
                        <tr>
                            <td class="no-width">--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>
                                <i class="icon-pencil"></i>
                                <i class="icon-trash3"></i>
                                <i class="icon-share"></i>
                            </td>
                        </tr>
<?php } ?>						
                </tbody>
            </table>
<?php include 'new-guide.php' ?>
        </div>	
    </div>
</section>
<?php include 'footer.php'; ?>	