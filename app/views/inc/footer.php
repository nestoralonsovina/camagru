
<?php if (isset($js_files)): ?>
    <?php foreach ($js_files as $file): ?>
        <script src="/js/<?php echo $file ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
