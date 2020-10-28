<?php $this->title = "Nouvel épisode"; ?>

<div class="blocpage">
    <?php include("template_header.php") ?>
    <?php include('form_episode.php'); ?>
</div>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>