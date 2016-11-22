<div class="wrap" style="padding-top: 10px;">
    <div id="remetric-admin">
        <p>Loading Remetric...</p>
    </div>
</div>

<script type="text/javascript">
    (function(a, d, m, i, n) {
        n = document.createElement('script'); n.type = 'text/javascript'; n.async = true;
        n.setAttribute('data-public-key', a);
        n.setAttribute('data-access-token', d);
        n.setAttribute('data-css', '<?php echo str_replace('.js', '.css', $remetricAdminUrl); ?>');
        n.setAttribute('data-base-url', '<?php echo $remetricApiUrl; ?>');
        n.src = '<?php echo $remetricAdminUrl; ?>';
        i = document.getElementsByTagName('script')[0];
        i.parentNode.insertBefore(n, i);
    })('dbb', 'b311a4b3b8b753d1f638ee1fbbb654c9', jQuery);
</script>
