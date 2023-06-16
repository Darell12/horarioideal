<head>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/historial.css" rel="stylesheet">


</head>

<div class="divtotal">
    <div class="tasks-wrapper">
        <div class="task">
            <label for="item-1">
                <span class="label-text" id="descripcion"><?php foreach ($historial as $his) { ?>
                        <a value="<?php echo $his['id_historial']; ?>"><?php echo $his['descripcion']; ?></a>
                    <?php } ?>
                </span>.
            </label>
            <span class="tag approved" id="tipo"><?php foreach ($historial as $his) { ?>
                    <span value="<?php echo $his['id_historial']; ?>"><?php echo $his['tipo']; ?></span>
                <?php } ?>
            </span>
        </div>
    </div>

    <script>
            

    </script>