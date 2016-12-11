<script type="text/javascript">
    (function(m, a, r, k, e, t, i, n, g) {
        g = document.createElement('script'); g.type = 'text/javascript'; g.async = true;
        g.setAttribute('data-remetric', m);
        g.setAttribute('data-css', '<?php echo str_replace('.js', '.css', $marketing_url); ?>');
        g.setAttribute('data-base-url', '<?php echo $remetric_api_url; ?>');
        g.src = '<?php echo $marketing_url; ?>';
        n = document.getElementsByTagName('script')[0];
        n.parentNode.insertBefore(g, n);
    })('<?php echo $marketing_publishable_key; ?>');
</script>
